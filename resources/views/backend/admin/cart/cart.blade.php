@extends('backend.admin.layouts.master')

@section('content')
    <style>
        /* radio button css start */
        a {
            text-decoration: none;
        }

        ul {
            list-style-type: none;
        }



        .radio-section {
            float: right;
            padding: 0 !important;
        }

        .radio-item [type="radio"] {
            display: none;
        }

        .radio-item+.radio-item {
            margin-top: 15px;
        }

        .radio-item label {
            display: block;
            padding: 10px 60px;
            background: #dce9e8;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 300;
            min-width: 250px;
            white-space: nowrap;
            position: relative;
            transition: 0.8s ease-in-out 0s;
        }

        .radio-item label:after,
        .radio-item label:before {
            content: "";
            position: absolute;
            border-radius: 50%;
        }

        .radio-item label:after {
            height: 19px;
            width: 19px;
            border: 1px solid #027e8f;
            left: 19px;
            top: calc(50% - 10px);
        }

        .radio-item label:before {
            background: #027e8f;
            height: 20px;
            width: 20px;
            left: 18px;
            top: calc(50%-5px);
            transform: scale(5);
            opacity: 0;
            visibility: hidden;
            transition: 0.4s ease-in-out 0s;
        }

        .radio-item [type="radio"]:checked~label::before {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
        }

        /* radio button css close */
    </style>

    <section class="ftco-section; h-100">

        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-4">
                <h2 class="heading-section">Cart</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <div class="table-wrap">
                    <table class="table">
                        <thead style="background:#027e8f; color:white" class="thead-primary">
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Details</th>
                                <th>Date</th>
                                <th>Cost</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form id="cartForm" action="{{ route('admin.cart.invoice.show') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf


                            @php
                                $total = 0;
                            @endphp

                            @foreach ($invoices as $item)

                            @if ($item->type == 'Lead')
                            @php
                            $image_obj = $item->lead->inventory->local_img_url ?? ''; // Use null coalescing operator
                            $image_splice = explode(',', $image_obj);
                            $image = str_replace(['[', "'"], '', $image_splice[0]);
                            $price = $item->price ?? '0';
                            $total += $price;
                            @endphp

                            <input type="hidden" name="ids[]" value="{{$item->id}}">
                            <input type="hidden" name="inventory_ids[]" value="{{$item->lead->inventory->id}}">
                            <input type="hidden" name="dealer-info"
                                value="{{$item->user_id}}">
                            <tr style="background:white;" class="alert" role="alert">
                            <td>
                                {{-- <label class="checkbox-wrap checkbox-primary">
                                    <input class="mt-4" type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label> --}}
                            </td>

                            <td>
                                <img src="{{ asset('frontend/') }}/{{ $image }}" alt="img"
                                    width="100px" height="70px">
                            </td>
                            <td>
                                <div class="email mt-4">
                                    <h6>{{ $item->lead->inventory->title ?? 'No title available' }} </h6>
                                </div>
                            </td>
                            <td>
                                <p class="mt-4">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </p>

                            </td>


                            <td>
                                <p class="mt-4">{{ $price ?? 'N/A' }}</p>
                                <input type="hidden" id="cost" name="cost" value="{{ $price }}">
                            </td>

                            <td class="quantity">
                                <div class="input-group mt-3">
                                    <input style="width:30px; margin-right:100px" type="counter" name="quantity"
                                        class="quantity form-control input-number" value="1" min="1"
                                        max="100" readonly>
                                </div>
                            </td>

                            <td>
                                <input class="amount-cart mt-3" type="text" style="border:none"
                                    value="{{ $price }}" readonly>
                            </td>
                            <td>
                                <button class="deleteCartItem mt-3" type="button" data-invoice_id ="{{$item->id}}" data-type="{{$item->type}}">
                                    <span><i class="fa fa-close"></i></span>
                                </button>
                            </td>
                        </tr>

                        @elseif ($item->type == 'Listing')
                        <input type="hidden" name="ids[]" value="{{$item->id}}">
                        @foreach ($item->inventories as $inventory)
                        @php
                        $image_obj = $inventory->local_img_url ?? ''; // Use null coalescing operator
                        $image_splice = explode(',', $image_obj);
                        $image = str_replace(['[', "'"], '', $image_splice[0]);
                        $price = $item->price ?? '0';
                        $total += $price;
                        @endphp
                        <input type="hidden" name="inventory_ids[]" value="{{$inventory->id}}">
                        <input type="hidden" name="dealer-info"
                            value="{{$item->user_id}}">
                        <tr style="background:white;" class="alert" role="alert">
                        <td>
                            {{-- <label class="checkbox-wrap checkbox-primary">
                                <input class="mt-4" type="checkbox" checked>
                                <span class="checkmark"></span>
                            </label> --}}
                        </td>

                        <td>
                            <img src="{{ asset('frontend/') }}/{{ $image }}" alt="img"
                                width="100px" height="70px">
                        </td>
                        <td>
                            <div class="email mt-4">
                                <h6>{{ $inventory->title ?? 'No title available' }} </h6>
                            </div>
                        </td>
                        <td>
                            <p class="mt-4">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </p>

                        </td>


                        <td>
                            <p class="mt-4">{{ $price ?? 'N/A' }}</p>
                            <input type="hidden" id="cost" name="cost" value="{{ $price }}">
                        </td>

                        <td class="quantity">
                            <div class="input-group mt-3">
                                <input style="width:30px; margin-right:100px" type="counter" name="quantity"
                                    class="quantity form-control input-number" value="1" min="1"
                                    max="100" readonly>
                            </div>
                        </td>

                        <td>
                            <input class="amount-cart mt-3" type="text" style="border:none"
                                value="{{ $price }}" readonly>
                        </td>
                        <td>
                            <button class="deleteCartItem mt-3" type="button" data-inventory_id="{{ $inventory->id }}" data-invoice_id ="{{$item->id}}" data-type="{{$item->type}}">
                                <span><i class="fa fa-close"></i></span>
                            </button>
                        </td>
                        </tr>

                        @endforeach

                        @else
                        @php

                        $price = $item->price ?? '0';
                        $total += $price;
                        @endphp

                        <input type="hidden" name="ids[]" value="{{$item->id}}">
                        <input type="hidden" name="dealer-info"
                            value="{{$item->user_id}}">


                    <tr style="background:white;" class="alert" role="alert">
                        <td>
                            {{-- <label class="checkbox-wrap checkbox-primary">
                                <input class="mt-4" type="checkbox" checked>
                                <span class="checkmark"></span>
                            </label> --}}
                        </td>

                        <td>
                            {{-- <img src="{{ asset('frontend/') }}/{{ $image }}" alt="img"
                                width="100px" height="70px"> --}}
                        </td>
                        <td>
                            <div class="email mt-4">
                                {{ $item->membership->name }} Membership
                                <br>
                                <p style="font-size:9px; margin-top:-5px; color:darkcyan">Previous membership - ({{  $item->dealer->membership->name}}) </p>

                            </div>
                        </td>
                        <td>
                            <p class="mt-4">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </p>

                        </td>


                        <td>
                            <p class="mt-4">{{ $price ?? 'N/A' }}</p>
                            <input type="hidden" id="cost" name="cost" value="{{ $price }}">
                        </td>

                        <td class="quantity">
                            <div class="input-group mt-3">
                                <input style="width:30px; margin-right:100px" type="counter" name="quantity"
                                    class="quantity form-control input-number" value="1" min="1"
                                    max="100" readonly>
                            </div>
                        </td>

                        <td>
                            <input class="amount-cart mt-3" type="text" style="border:none"
                                value="{{ $total ?? '0' }}" readonly>
                        </td>
                        <td>
                            <button class="deleteCartItem mt-3" type="button" data-invoice_id ="{{$item->id}}" data-type="{{$item->type}}">
                                <span><i class="fa fa-close"></i></span>
                            </button>
                        </td>
                    </tr>
                            @endif

                            @endforeach

                        </form>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </section>

    <section style=" width: 23%; float:rigth" class="radio-section">
        <div style="border:1px solid rgb(224, 223, 223); padding:20px; border-radius:10px " class="radio-list">
            <div class="d-flex justify-content-between mb-2">
                <h6 style="font-weight:700">Subtotal :</h6>
                <input style="border:none; background:none; text-align:end" type="text" id="subtotal"
                    value="${{ $total }}" readonly>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <h6 style="font-weight:700">Discount :</h6>
                <input style="border:none; background:none; font-weight:500; text-align:end" type="text" value="0" readonly>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <h6 style="font-weight:700">Tax :</h6>
                <input style="border:none; background:none; font-weight:500; text-align:end" type="text" value="0" readonly>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <h6 style="font-weight:700">Total :</h6>
                <input style="border:none; background:none; font-weight:700; text-align:end" type="text" id="total_price"
                    value="${{ $total }}" readonly>
            </div>
        </div>

    </section>
    <section style=" width: 23%; float:rigth;  margin-right:-374px !important; margin-top:185px;" class="radio-section">
        <div class="radio-list">
            <p style="margin-top:35px; margin-bottom:15px; font-size:18px; margin-left:5px">What payment method
                do you prefer to use?</p>
            <div class="radio-item">
                <input value="card" name="radio" id="radio1" type="radio" checked>
                <label for="radio1">Card</label>
            </div>
            <div class="radio-item"><input name="radio" id="radio2" type="radio"><label for="radio2">Cash</label>
            </div>
            <div class="radio-item"><input name="radio" id="radio3" type="radio"><label for="radio3">Check</label>
            </div>
            <button id="cartSubmit" type="submit"
                style="background:#027e8f; margin-bottom:8px; border-radius:8px; color:white; font-weight:600; padding: 8px 0;" class="w-100">Next to Proceed</button>
        </div>

    </section>
@endsection

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $(document).on('click', '#cartSubmit', function(e) {
                e.preventDefault();

                var selectedValue = $('input[name="radio"]:checked').val();

                if (selectedValue === 'card') {
                    window.location.href = "{{ route('admin.card.payment') }}";
                }else{
                    $('#cartForm').submit();

                }

            });
            $(document).on('click', '.deleteCartItem', function(e) {
                e.preventDefault();
                var clickedButton = $(this);
                var invoice_id = $(this).data('invoice_id');
                var id = $(this).data('inventory_id');
                var type = $(this).data('type');
                var price = parseFloat(clickedButton.closest('tr').find('.amount-cart').val());
                $.confirm({
                    title: 'Delete Confirmation',
                    content: 'Are you sure?',
                    buttons: {
                        cancel: {
                            text: 'No',
                            btnClass: 'btn-primary',
                            action: function() {

                            }
                        },
                        confirm: {
                            text: 'Yes',
                            btnClass: 'btn-danger',
                            action: function() {

                                $.ajax({
                                    url: "{{ route('admin.cart.data.delete') }}",
                                    method: "post",
                                    data: {
                                        id: id,
                                        invoice_id:invoice_id,
                                        type:type

                                    },
                                    success: function(res) {
                                        if (res.status == 'success') {

                                            toastr.success(res.message, {
                                                timeOut: 1000
                                            });
                                            clickedButton.closest('tr').remove();
                                            updateCartTotal(-price);

                                        }
                                    }


                                });
                            }
                        }
                    }
                });

            });


            function updateCartTotal(priceChange) {
            // Get current subtotal and total values
            var subtotal = parseFloat($('#subtotal').val().replace('$', ''));
            var total = parseFloat($('#total_price').val().replace('$', ''));

            // Update subtotal and total
            subtotal += priceChange;
            total += priceChange;

            // Update the fields in the UI
            $('#subtotal').val('$' + subtotal.toFixed(2));
            $('#total_price').val('$' + total.toFixed(2));
             }



        });
    </script>
@endpush
