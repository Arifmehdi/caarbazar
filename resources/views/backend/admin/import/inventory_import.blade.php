@php
use Illuminate\Support\Facades\Session;
@endphp
@extends('backend.admin.layouts.master')

@section('content')

<style>
    .admin-inventory-image{
        height: 300px;
    }
</style>
<style>
.btn-loading {
    position: relative;
    pointer-events: none;
    opacity: 0.6;
}

.btn-loading::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 1em;
    height: 1em;
    border: 2px solid transparent;
    border-top-color: white;
    border-radius: 50%;
    -webkit-animation: spinner 0.6s linear infinite;
    animation: spinner 0.6s linear infinite;
    transform: translate(-50%, -50%);
}

@-webkit-keyframes spinner {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@keyframes spinner {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>

<div class="row">
    <div class="col-md-12">
        <!-- Main content -->
        <section class="content row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Vehicle Make</h3><br>
                        <hr>
                        <form action="{{route('admin.inventory.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="form-group">
                                    <label for="make">User </label>
                                    <select name="user" id="user" class="form-control" required>
                                        <option value="" selected >-- Choose User--</option>
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-message" id="import_file-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="make">Import File</label>
                                    <input type="file" class="form-control" name="import_file" id="import_file"
                                        placeholder="Enter Your File">
                                    <span class="text-danger error-message" id="import_file-error"></span>
                                </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="uploadButton">Upload File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Import Details </h3>
                        {{--<a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#vehicleModal"> <i class="fas fa-plus-circle"></i> Add Make</a>--}}
                    </div>
                    <div class="card">
                        {{--<div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>--}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h2>Inventory Import Summary (Stock)</h2>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <h5>Add Inventory Stock</h5>
                                    <hr>
                                    <span id="addInventory">Not Available</span><span id="totalAdd" class="text-info"></span>
                                </div>
                                <div class="col-6">
                                    <h5>Sold Inventory Stock</h5>
                                    <hr>
                                    <span id="soldInventory">Not Available</span><span id="totalSold" class="text-info"></span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card -->
            <div class="clearfix d-md-none"></div>
            <div class="card w-100">
               <div class="row p-4">
                @foreach ($inventories as $inventory )


                <div class="col-lg-3 col-md-4 col-xl-3 col-sm-12">
                    <div  class="card overflow-hidden">
                        <div style="margin-top:-1px !important" class="item-card9-img">
                            @php
                                $image_obj =  $inventory->local_img_url;
                                $image_splice = explode(',',$image_obj);
                                $image = str_replace(["[", "'"], "", $image_splice[0]);

                                $vin_string_replace = str_replace(' ','',$inventory->vin);
                                $route_string = str_replace(' ','',$inventory->year.'-'.$inventory->make.'-'.$inventory->model.'-in-'.$inventory->dealer_city.'-'.$inventory->dealer_state)
                            @endphp




                            <div  class="item-card9-imgs">

                                <a class="link" href="javascript:void(0)"></a>
                                @if($image_obj !='' && $image_obj !='[]')
                                <img src="{{ asset('frontend/') }}/{{$image}}"alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer_city }},{{ $inventory->dealer_state }}, dealer name is {{ $inventory->dealer_name }} Dream Best Car image"   class="lazyload admin-inventory-image" loading="lazy" onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';">

                                @elseif($image_obj =='[]')
                                <img width="100%" src="{{ asset('frontend/uploads/NotFound.png') }}" alt="Used cars for sale coming soon image dream best" class="">
                                @else
                                <img width="100%" src="{{ asset('frontend/uploads/NotFound.png') }}" alt="Used cars for sale coming soon image dream best" class="">
                                @endif
                            </div>

                            @php
                                $countWishList = 0;
                                if (session()->has('favourite')) {
                                    $favourites = session('favourite');
                                    foreach ($favourites as $favorite) {
                                        if ($favorite['id'] == $inventory->id) {
                                            $countWishList = 1;
                                            break; // No need to continue the loop if found
                                        }
                                    }
                                }
                            @endphp


                        </div>
                        <div style="background: rgb(255, 255, 255);
                            background: linear-gradient(0deg, rgb(232, 245, 243) 0%, rgb(255, 255, 255) 100%);" class=" mb-0">
                            <div style="padding:12px !important" class="card-body ">
                                <div class="item-card9">
                                    @php
                                        $title = Str::substr($inventory->title, 0, 27)
                                    @endphp
                                    <a href="{{route('admin.inventory.edit.page',$inventory->id )}}" class="text-dark"><h6 style="color:black !important; font-weight:600; opacity:90%" class="font-weight-semibold mt-1"> {{$title}}</h6></a>

                                    <div class="item-card9-desc mb-2">
                                    @php
                                    // Safely check for the existence of transmission
                                    $transmissionValue = $inventory->transmission  ?? null;
                                    $transmission = strtolower($transmissionValue);

                                    if (strpos($transmission, 'automatic') !== false) {
                                        $transmission = 'Automatic';
                                    } elseif (strpos($transmission, 'variable') !== false) {
                                        $transmission = 'Variable';
                                    } else {
                                        $transmission = 'Manual'; // or any default value
                                    }

                                    // Limit transmission string to 25 characters if needed
                                    $transmission = substr($transmission, 0, 25);
                                    @endphp

                                        <p style="margin:0" class="me-4 d-inline-block"><span class=""> {{$transmission}}</span></p>
                                        <p style="margin:0">Used</p>

                                    </div>
                                    <div style="height: 25px" class="d-flex">
                                        <h5 class="me-3" style="font-weight:600">{{ $inventory->price_formate}}</h5>
                                        <p style="color:black; font-weight:600; font-size:14px; margin-top:5px; margin-left:12px">${{ $inventory->payment_price}}/mo*</p>
                                    </div>


                                </div>
                                <div class="item-card9-footer d-sm-flex">
                                    <p  class="w-50 mt-2 mb-1 float-start" title="Mileage"><i class="fa fa-road text-muted me-1 "></i> {{ number_format($inventory->miles ).' miles' }}</p>
                                </div>
                                </div>
                                <div  class="card-footer">
                                    <div style="float:right;" class="item-card9-footer d-sm-flex">
                                        <a href="{{route('admin.inventory.edit.page',$inventory->id )}}" class="btn btn-info">Edit Inventory</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- pagination --}}

                <div class="custom-pagination me-2" style="display: flex;justify-content: flex-end;">
                    <ul style="float:right" class="pagination">
                        @if ($inventories->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $inventories->previousPageUrl() }}">Previous</a></li>
                        @endif

                        @php
                            $start = max($inventories->currentPage() - 2, 1);
                            $end = min($start + 4, $inventories->lastPage());
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $inventories->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $inventories->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endfor

                        @if ($end < $inventories->lastPage())
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            <li class="page-item"><a class="page-link" href="{{ $inventories->url($inventories->lastPage() - 2) }}">{{ $inventories->lastPage() - 2 }}</a></li>
                            <li class="page-item"><a class="page-link" href="{{ $inventories->url($inventories->lastPage() - 1) }}">{{ $inventories->lastPage() - 1 }}</a></li>
                            <li class="page-item"><a class="page-link" href="{{ $inventories->url($inventories->lastPage()) }}">{{ $inventories->lastPage() }}</a></li>
                        @endif

                        @if ($inventories->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $inventories->nextPageUrl() }}">Next</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </div>
               </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
</div>


@endsection
@push('js')
<script>
$(document).ready(function() {
    $('#uploadButton').on('click', function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("import_file", $("#import_file")[0].files[0]);
        formData.append("user", $("#user").val());
        // var formData = new FormData($("#import_file")[0].files[0]);

        // alert(formData);
        $(this).addClass('btn-loading');
        $.ajax({
          url: "{{ route('admin.inventory.store')}}",
          type: "POST",
          data: formData,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          processData: false,
          contentType: false,
          success: function(response) {
            // Handle the success response
            $('#addInventory').text(response.add)
            $('#totalAdd').text(' = Total add '+response.total_add + ' inventories')
            $('#soldInventory').text(response.sold)
            $('#totalSold').text(' = Total sold '+response.total_sold + ' inventories')
            if(response.add == []){
                console.log('empty')
            }else{

                console.log(response.add)
                console.log(response);
            }
            $('#uploadButton').removeClass('btn-loading');
          },
          error: function(xhr, status, error) {
            // Handle the error response
            console.error(xhr.responseText);
            $('#uploadButton').removeClass('btn-loading');
          }
        });
    });
});
</script>
@endpush
