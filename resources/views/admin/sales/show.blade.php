@extends('blades.admin')

@section('title', 'Create ~MODEL~')
    
@section('css')
    <link rel="stylesheet" href="{{ url('css/admin/file-name.css') }}">
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            Sale # {{ $sale->id }}
            
        </div>
        <div class="card-body">
            <h5>Total Amount $ {{ $sale->amount }} </h5>
            <h5>Date: {{ $sale->created_at }}</h5>
            <h5>Customer: 
                @if ($sale->customer_id)
                    <a href='/admin/customers/{{$sale->customer_id}}'>{{ $sale->customer->full_name }}</a>
                @else
                    <a class="btn btn-primary btn-sm" href='/admin/sales/{{$sale->id}}/add-customer'>Add Customer</a>
                @endif
                
            </h5>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>                    
                  </tr>
                </thead>
                <tbody >
                    @foreach ($sale->saleDescriptions as $i => $description)
                        
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td><a href="{{ url('admin/products', $description->product_id) }}">{{ $description->product->name }}</a></td>
                            <td>{{ $description->quantity }}</td>
                            <td>{{ $description->price }}</td>
                            <td>${{ $description->subtotal }}</td>
                        </tr>

                    @endforeach
                  
                </tbody>
            </table>
        </div>
    </div> 

@endsection

@section('bottom-js')
    <script src="{{ url('js/admin/file-name.css') }}"></script>
@endsection