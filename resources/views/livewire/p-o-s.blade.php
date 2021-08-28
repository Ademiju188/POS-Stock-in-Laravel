<div  wire:ignore.self>
    {{-- @include('inc.msg') --}}

        <div class="modal " id="printMode" tabindex="-1" aria-hidden="true">
            @include('receipt.receipt')
        </div>
        <div class="row">
            <div class="col-md-8">
                 <div class="card">
                    <div class="card-header">
                        <div class=" d-flex justify-content-between">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="header-title">
                                        <h4 class="card-title">Point Of Sale</h4>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="text-right">
                                        <select  wire:model="byCategory"  class="form-control-sm">
                                            <option value="">All</option>
                                            @foreach ($categories as $data)
                                                <option  value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" placeholder="Search Product" class="form-control-sm" wire:model.debounce.350ms="search">
                                        <select wire:model="perPage" class="form-control-sm">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                         <select wire:model="sortBy" class="form-control-sm">
                                            <option value="asc">ASC</option>
                                            <option value="desc">DESC</option>
                                        </select>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div  wire:ignore.self class="table-responsive rounded mb-3">
                            <table  wire:ignore.self class=" table mb-0 tbl-server-info table-bordered text-center">
                                <thead class="bg-white text-uppercase">
                                    <tr class="light light-data">
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if(!empty($products))
                                <tbody class="light-body">
                                @forelse ($products as $key => $product)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('/public/storage/product/' . $product->product_img) }}"
                                                        class="img-fluid rounded avatar-50 mr-2">
                                                    <div>
                                                        {{ $product->product_name }}
                                                        <p class="mb-0"><small></small></p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                @if (empty($product->category->name))
                                                    No Category Selected
                                                @else
                                                    {{ $product->category->name }}
                                                @endif
                                            </td>
                                            <td>
                                            @if (empty($product->price))
                                            Undefined
                                            @else
                                            # {{ number_format($product->price), 2 }}</td>
                                            @endif
                                            <td>
                                                @if ($product->quantity <= 20)
                                                    <span class="badge badge-danger">{{ $product->quantity }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-success">{{ $product->quantity }}</span>
                                                @endif
                                            </td>
                                            <td>

                                                <div class="d-flex align-items-center list-action">
                                                        <a class="badge bg-success mr-2" data-toggle="modal" data-placement="top"
                                                        title="View Product" data-original-title="Edit"
                                                        data-target="#showproduct{{ $product->id }}" href="#"><i
                                                            class="fa fa-eye mr-0"></i>
                                                        </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7">
                                                <div class="text-center">
                                                    No Items Found!
                                                </div>
                                            </td>
                                        </tr>
                                @endforelse

                                    </tbody>
                                    @endif
                            </table>
                        </div>
                        {{$products->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title text-center">
                                Total Price:
                                <span class="text-secondary">
                                    # {{number_format($carts->sum('price')), 2}}
                                </span>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <button type="button" class="btn btn-success mr-2" data-toggle="modal" data-placement="top" title="Update Product" data-original-title="Edit" data-target="#invoice" >
                                <i class="fa fa-save"></i>
                                Create Invoice
                            </button>
                            <button  onclick="ReceiptContent('printMode')"  class="btn btn-secondary mr-2"  title="Print" data-target="#printMode">
                                <i class="fa fa-print"></i> Print
                            </button>
                        </div>

                        <div class="table-responsive rounded mb-3 pt-3 text-center">
                            <table class=" table mb-0 tbl-server-info table-bordered ">
                                <thead class="bg-white text-uppercase">
                                <tr class="light light-data">
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach ($carts as $key => $cart)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{ $cart->name }}</td>
                                    <td>{{ $cart->quantity }}</td>

                                    <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a wire:click="DeleteCart({{$cart->id}})" class="btn btn-danger btn-sm mr-2" title="" href="#"><i class="fa fa-trash mr-0"></i>
                                                </a>
                                    </div>
                                    </td>

                                </tr>
                            @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @foreach ($products as $key => $data)
        <form action="{{ route('cart.store', $data->id) }}" method="POST">
        @csrf

        <!-- Modal Edit -->

            <div wire:ignore.self class="modal fade" id="showproduct{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="popup text-left">
                                @include('inc.msg')
                                <div class="media align-items-top justify-content-between">
                                    <h3 class="">Product</h3>
                                    <div class="btn-cancel p-0" data-dismiss="modal"><i class="fa fa-times"></i></div>
                                </div>
                                <div class="content edit-notes">
                                    <div class="card card-transparent card-block card-stretch event-note mb-0">
                                        <div class="card-body px-0 bukmark">
                                            <div
                                                class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
                                                <div class="quill-tool">
                                                </div>
                                            </div>
                                            <div  id="quill-toolbar1">
                                                <input type="hidden" value="{{$data->id}}" name="product_id" id="">
                                                <div class="row">
                                                    <div wire:ignore class="col-md-6 mt-3 text-center">
                                                        <h4 class="mb-3 ">{{ $data->product_name }}</h4>
                                                        <img wire:ignore  src="{{ asset('/public/storage/product/' . $data->product_img) }}"
                                                              width="60%" class="img-fluid rounded-normal" alt="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control"
                                                                   placeholder="Enter Product Name" name="name"
                                                                   data-errors="Please Product Name."
                                                                   value="{{ $data->product_name }}" required="">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Total Quantity *</label>
                                                            <input type="number"
                                                                   value="{{ $data->quantity }}" name="qty" class="form-control" required=""
                                                                   readonly>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Item Sold *</label>
                                                            <div class="input-group input-spinner">
                                                                <a href="#" class="btn btn-danger " id=""
                                                                   wire:click="DecrementQty({{ $data->id }})">
                                                                    −
                                                                </a>
                                                                <input type="text" class="form-control" name="quantity" value="{{$count}}"
                                                                       id="inc" readonly>
                                                                <a href="#" class="btn btn-success " id=""
                                                                   wire:click="IncrementQty({{ $data->id }})">
                                                                    +
                                                                </a>
                                                            </div>
                                                            <input type="hidden" name="price" value="{{$data->price}}" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary mr-2 text-center">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    @endforeach

        <form action="{{route('order.store')}}" method="POST">
        @csrf
        <div wire:ignore.self wire:ignore class="modal fade" id="invoice" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <div class="media align-items-top justify-content-between">
                                <h3 class="">Create Invoice</h3>
                                <div class="btn-cancel p-0" data-dismiss="modal"><i class="fa fa-times"></i></div>
                            </div>
                            <div class="content edit-notes">
                                <div class="card card-transparent card-block card-stretch event-note mb-0">
                                    <div class="card-body px-0 bukmark">
                                        <div
                                            class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
                                            <div class="quill-tool">
                                            </div>
                                        </div>
                                        <div id="quill-toolbar1">

                                            <div class="row">

                                                <div class="col-6 pt-3">
                                                    @foreach($products as $data)
                                                    <input type="hidden" class="form-control" name="product_price[]" value="{{$data->price}}">
                                                    @endforeach
                                                    @foreach($carts as $data)
                                                        <input type="hidden" class="form-control" name="product_id[]" value="{{$data->product_id}}">
                                                        <input type="hidden" class="form-control" name="qty[]" value="{{$data->quantity}}">

                                                        <input type="hidden" class="form-control" name="unitprice[]" value="{{$data->price}}">
                                                        <input type="hidden" class="form-control" name="product_name[]" value="{{$data->name}}">
                                                    @endforeach
                                                    <label for="paymentMethod"><b>Payment Method:</b></label>
                                                    <select class="form-control" name="paymentMethod" id="paymentMethod" required>
                                                        <option value="">Select Payment Method</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Bank Transfer">Bank Transfer</option>
                                                        <option value="Credit Card">Credit Card</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 pt-3">
                                                    <label for="payment"><b>Total Amount(#):</b></label>
                                                    <input type="number" class="form-control"
                                                           value="{{$carts->sum('price')}}"
                                                           readonly>
                                                </div>
                                                <div  class="col-6 pt-3 pb-5">
                                                    <label for="payment"><b>Payment(#):</b></label>
                                                    <input type="number" name="payment" class="form-control" wire:model="Payment">
                                                </div>
                                                <div class="col-6 pt-3 pb-5">
                                                    <label for="change"><b>Balance(#):</b></label>
                                                    <input class="form-control" name="balance"  type="number" wire:model="balance" readonly>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer border-0">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary text-center">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="modal " id="printMode" tabindex="-1" aria-hidden="true">
            @include('receipt.receipt')
        </div>

</div>
