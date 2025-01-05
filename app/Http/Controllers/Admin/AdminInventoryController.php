<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interface\InventoryServiceInterface;
use App\Models\Inventory;
use App\Models\Invoice;
use App\Models\Membership;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AdminInventoryController extends Controller
{

    public function __construct(private InventoryServiceInterface $inventoryService){}

    public function index(Request $request)
    {

        // $data = $this->inventoryService->all();
        $authUser = Auth::user();
        $inventory = Inventory::query();
        if($authUser->hasAllaccess())
        {
            $data['inventory_make'] = $inventory->distinct('make')->pluck('id','make')->toArray();
            $users = User::whereHas('roles', function($query) {
                $query->where('name', 'dealer');
            })
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->whereNotNull('state')
            ->where('state', '!=', '')
            ->get(['id', 'name', 'city', 'state']);
            $data['inventory_dealer_name'] = $users->pluck('id', 'name')->toArray();
            $data['inventory_dealer_city'] = $users->pluck('id', 'city')->toArray();
            $data['inventory_dealer_state'] = $users->pluck('id', 'state')->toArray();
        }else
        {
            $data['inventory_make'] = $inventory->where('deal_id',$authUser->id)->distinct('make')->pluck('id','make')->toArray();
            $data['inventory_dealer_name'] = User::where('id',$authUser->id)->pluck('id','name')->toArray();
            $data['inventory_dealer_city'] = User::where('id',$authUser->id)->whereNotNull('city')
            ->where('city', '!=', '')->pluck('id','city')->toArray();
            $data['inventory_dealer_state'] = User::where('id',$authUser->id)->whereNotNull('state')
            ->where('state', '!=', '')->pluck('id','state')->toArray();
        }

        ksort($data['inventory_make']);
        ksort($data['inventory_dealer_name']);
        ksort($data['inventory_dealer_city']);
        ksort($data['inventory_dealer_state']);


        $info = [];
        $rowCount = 0;
        $trashedCount = 0;

        if ($request->showTrashed == 'true') {
            if($authUser->hasAllaccess())
            {

                $info = $this->inventoryService->getTrashedItem();
                $rowCount = $this->inventoryService->getRowCount();
            }else
            {
                $info = $this->inventoryService->getTrashedItem($authUser->id);
                $rowCount = $this->inventoryService->getRowCount($authUser->id);
            }


        } else {
            if($authUser->hasAllaccess())
            {



                $info = $this->inventoryService->getItemByFilter($request);
                $rowCount = $this->inventoryService->getRowCount();
                $trashedCount = $this->inventoryService->getTrashedCount();
            }else
            {

                $info = $this->inventoryService->getItemByFilter($request,$authUser->id);
                $rowCount = $this->inventoryService->getRowCount($authUser->id);
                $trashedCount = $this->inventoryService->getTrashedCount($authUser->id);

            }

        }



        // return view('backend.admin.inventory.index');
        // dd('index', $data->get()[0], $info, $rowCount, $trashedCount);

        if($request->ajax()){
            return DataTables::of($info)->addIndexColumn()
            ->addColumn('check', function ($row) {
                $html = '<div class=" text-center">
                            <input type="checkbox" name="admin_inventory_id[]" value="' . $row->id . '" class="mt-2 check1">
                        </div>';
                return $html;
            })
            ->addColumn('DT_RowIndex', function ($row) {
                return $row->id;
            })
            ->addColumn('stock', function($row){
                return $row->stock ?? 'No stock';
            })
            ->addColumn('title', function($row){
                return $row->year.$row->make.$row->model ?? 'No title';
            })
            ->addColumn('make', function($row){
                return $row->make ?? 'No make';
            })
            ->addColumn('dealer_name', function($row){
                return $row->dealer->name ?? 'No Dealer Name';
            })
            ->addColumn('state', function($row){
                return $row->dealer->state ?? 'No State';
            })
            ->addColumn('city', function($row){
                return $row->dealer->city ?? 'No City';
            })
            // <th>Visibility</th>
            ->addColumn('listing_start', function($row){
                return  $row->created_at ? Carbon::parse($row->created_at)->format('m-d-Y') : 'null';
            })->addColumn('active_start', function($row){
                return  $row->active_till ? Carbon::parse($row->active_till)->format('m-d-Y') : 'null';
            })
            ->addColumn('active_end', function($row){
                return  $row->featured_till ? Carbon::parse($row->featured_till)->format('m-d-Y') : 'null';
            })
            ->addColumn('paid', function($row){
                return $row->is_feature == '1' ? 'Feature' : 'Free';
            })
            ->addColumn('visibility', function($row){
                $today = Carbon::now();
                $isActive = true;

                if ($row->active_till) {
                    if (Carbon::parse($row->active_till)->diffInMonths($today) >= 1) {
                        $isActive = false;
                    }
                } else {
                    if ($row->created_at && Carbon::parse($row->created_at)->diffInMonths($today) >= 1) {
                        $isActive = false;
                    }
                }
                $status = $isActive ? 'Active' : 'Inactive';
                $colorClass = $isActive ? 'btn badge badge-success' : 'btn badge badge-danger';
                return "<span class='{$colorClass}'>{$status}</span>";
            })
            ->addColumn('action', function($row) {
                if ($row->trashed()) {
                    $html = '<a href="'.route('admin.inventory.restore', $row->id).'" class="btn btn-info btn-sm restore" data-id="' . $row->id . '"><i class="fa fa-recycle"></i></a> '.
                            '<a href="'.route('admin.inventory.permanent.delete', $row->id).'" class="btn btn-danger btn-sm c-delete" data-id="' . $row->id . '"><i class="fa fa-exclamation-triangle"></i></a>';
                }else{


                    $html = '';
                            // if(Auth::user()->hasAllaccess())
                            // {
                            //     $html = ' <a href="javascript:void(0);" class="btn btn-warning btn-sm send-mail" data-id="' . $row->id . '"><i class="fa fa-paper-plane"></i></a>';
                            // }
                            $html .= ' <a href="' . route('admin.inventory.edit.page', $row->id) . '" style="margin-right: 6px !important" class="btn btn-success btn-sm lead_view"><i class="fa fa-eye"></i></a>' .
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm inventory_delete" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>';
                }
                return $html;
            })
            ->rawColumns(['visibility','action', 'status', 'check'])
            ->with([
                'allRow' => $rowCount,
                'trashedRow' => $trashedCount,
            ])
            ->smart(true)
            ->make(true);
        }
        return view('backend.admin.inventory.index', $data);
    }

    public function editPage($id)
    {
        $inventory = Inventory::find($id);
        $all_images = explode(',', $inventory->local_img_url);
        return view('backend.admin.inventory.inventory-edit', compact('inventory','all_images'));
    }

    public function edit(Request $request)
    {

        // log inventory complete
        $inventory = Inventory::find($request->inventory_id);
         $inventory->mpg_city = $request->mpg_city;
         $inventory->mpg_highway = $request->mpg_hwy;
         $inventory->miles = $request->miles;
         $inventory->stock = $request->stock;
         $inventory->price = $request->price;
         $inventory->make = $request->make;
         $inventory->model = $request->model;
         $inventory->year = $request->year;
         $inventory->type = $request->condition;
         $inventory->trim = $request->trim;
         $inventory->body_formated = $request->body_formated;
         $inventory->transmission = $request->transmission;
         $inventory->drive_info = $request->drive_info;
         $inventory->fuel = $request->fuel;
         $inventory->purchase_price = $request->purchase_price;
         $inventory->stock_date_formated = $request->purchase_date;
         $inventory->interior_color = $request->interior_color;
         $inventory->interior_description = $request->interior_description;
         $inventory->exterior_color = $request->exterior_color;
         $inventory->exterior_description = $request->exterior_description;
         $inventory->vehicle_feature_description = $request->description;
         $inventory->save();

        return response()->json([
            'status'=>'success',
            'message'=>'Inventory update successfully'
        ]);
    }

    public function destroy(Request $request)
    {
        $this->inventoryService->trash($request);
        return response()->json([
            'status'=>'success',
            'message'=>"Inventory Delete Successfully"
        ]);
    }

    public function restore($id)
    {
        $inventory = $this->inventoryService->restore($id);
        return response()->json('Inventory restored successfully');
    }

    public function permanentDelete($id)
    {
        $inventory = $this->inventoryService->permanentDelete($id);

        return response()->json('Inventory is permanently deleted successfully');
    }

    public function bulkAction(Request $request)
    {
        // dd($request->admin_inventory_id, $request->action_type);
        if (isset($request->admin_inventory_id)) {
            if ($request->action_type == 'move_to_trash') {
                $attendance = $this->inventoryService->bulkTrash($request->admin_inventory_id);
                return response()->json('Attendance are deleted successfully');
            } elseif ($request->action_type == 'restore_from_trash') {
                $attendance = $this->inventoryService->bulkRestore($request->admin_inventory_id);

                return response()->json('Attendance are restored successfully');
            } elseif ($request->action_type == 'active') {
                $this->inventoryService->bulkActive($request->admin_inventory_id);
                return response()->json('Attendance are Active successfully');
            } elseif ($request->action_type == 'inactive') {
                $this->inventoryService->bulkInactive($request->admin_inventory_id);
                return response()->json('Attendance are Inactive successfully');
            }
             elseif ($request->action_type == 'delete_permanently') {
                $attendance = $this->inventoryService->bulkPermanentDelete($request->admin_inventory_id);

                return response()->json('Attendance are permanently deleted successfully');
            }
            elseif($request->action_type == 'listingInvoice')
            {
                $selectedData = $request->admin_inventory_id;
                $existingInvoices = Inventory::with('dealer')->whereIn('id', $selectedData)->get();
                // Track the dealers for the leads
                $dealers = [];
                foreach ($existingInvoices as $invoice) {
                    $dealerId = $invoice->dealer->id;
                    if (!in_array($dealerId, $dealers)) {
                        $dealers[] = $dealerId;
                    }


                    // If more than one unique dealer is found, return an error message
                    if (count($dealers) > 1) {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Only one dealer lead can be added at a time.'
                        ]);
                    }
                }

                $invoice = Invoice::where('is_cart','0')->where('type','Listing')->first();
                if($invoice)
                {
                    if($invoice->user_id != $dealers[0])
                    {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Only one dealer lead can be added at a time.'
                        ]);
                    }
                }
                $membership = Membership::where('type','listing')->first();

                $invoice  = new Invoice();
                $invoice->price = $membership->membership_price;
                $invoice->user_id = $dealers[0];
                $invoice->type = 'Listing';
                $invoice->save();

                if (!empty($selectedData)) {
                    $invoice->inventories()->syncWithoutDetaching($selectedData);
                }

                // $existingInvoices = Invoice::whereIn("lead_id", $selectedData)->get();
                // $existingDataIds = $existingInvoices->pluck("lead_id")->toArray();
                // $newData = array_diff($selectedData, $existingDataIds);
                // if (!empty($newData)) {
                //     $invoicesToInsert = [];

                //     foreach ($newData as $id) {
                //         $invoicesToInsert[] = [
                //             'lead_id' => $id,
                //             'price' => '4.99',
                //             'user_id' => $dealers[0],
                //             'type' => 'Lead',
                //             'created_at' => now(),
                //             'updated_at' => now(),
                //         ];
                //     }

                    // Invoice::insert($invoicesToInsert);
                    return response()->json(['status' => 'success', 'message' => 'Added to cart successfully!']);

            }else {
                return response()->json('Action is not specified.');
            }
        } else {
            return response()->json(['message' => 'No Item is Selected.'], 401);
        }
    }
}
