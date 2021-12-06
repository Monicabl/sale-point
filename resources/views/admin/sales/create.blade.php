@extends('blades.admin')

@section('title', 'Create ~MODEL~')
    
@section('css')
    {{-- <link rel="stylesheet" href="{{ url('css/admin/file-name.css') }}"> --}}
    <style>
        .sugest-product-container {
            position: relative;
        }

        #sugestedProducts {
            position: absolute;
            bottom: 0;
            left: 0;       
            width: 100%;
            z-index: 100;
            transform: translateY(100%);
        }

        #sugestedProducts div {
            background: white;
            border: rgb(163, 198, 255) solid 1px;
            padding: 6px;
            cursor: pointer; 
        }

        #sugestedProducts div:hover {
            background: rgb(28, 159, 163);
            color: white;
        }
    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            Sale Point
        </div>
        <div class="card-body">
            <div class="row mb-3">

                <div class="mb-3 col-1">
                    <input type="number" class="form-control" id="quantity" placeholder="1"  value="1" min="1" required>                    
                </div>
                <div class=" mb-3 col-11">
                    <div class="input-group sugest-product-container">
                        {{-- onblur="abortSugest()" --}}
                        <input type="text" onkeyup="suggestProducts()"  class="form-control" id="termToSearch" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn  btn-outline-primary" type="button" id="button-addon2" onclick="addProduct()">Add Product</button>
                        <div id="sugestedProducts"></div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-9">

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Options</th>
                          </tr>
                        </thead>
                        <tbody id="descriptionsTBody">
                          {{-- <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr> --}}
                          
                        </tbody>
                    </table>

                </div>
                <div class="col-3">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Total: $</span>
                        <input type="text" id='total' class="form-control" disabled>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">IVA: $</span>
                        <input type="text" id="iva" class="form-control" disabled>
                    </div>

                    <button class="btn btn-primary w-100" onclick="processCheckout()">Process Checkout</button>

                </div>

            </div>
        </div>
    </div> 

@endsection

@section('bottom-js')
    <script src="{{ url('js/admin/sale-point.js') }}"></script>
@endsection