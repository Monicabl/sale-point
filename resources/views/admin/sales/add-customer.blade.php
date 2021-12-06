@extends('blades.admin')

@section('title', 'Add Customer to Sale')
    
@section('css')
    <link rel="stylesheet" href="{{ url('css/admin/file-name.css') }}">
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="/admin/sales">Sales</a> / 
            <a href="/admin/sales/{{$sale->id}}"> {{$sale->id}}</a> / 
            Add Customer
        </div>
        <div class="card-body">

            <form id="second_stage">
                <h4>Customer Data</h4>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" placeholder="Andrea"  required id="first_name">                    
                    </div>
                    <div class="mb-3 col-6">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" placeholder="Perez"  required id="last_name">                    
                    </div>
                    <div class="mb-3 col-6">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" placeholder="961-122-1222"  id="phone">                    
                    </div>
                    <div class="mb-3 col-6">
                        <label for="">Email</label>
                        <input type="text" class="form-control" placeholder="email" id="email">                    
                    </div>
                    <div class="col-12 d-flex justify-content-end d-grid gap-2">
                        <button class="btn btn-primary">Add Address</button>
                        <button class="btn btn-outline-primary">Link Customer</button>
                    </div>
                </div>
            </form>

            <form id="third_stage">
                <h4>Customer Address</h4>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="">Street</label>
                        <input type="text" class="form-control" placeholder="Andrea"  required id="first_name">                    
                    </div>
                    <div class="mb-3 col-6">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" placeholder="Perez"  required id="last_name">                    
                    </div>
                    <div class="mb-3 col-6">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" placeholder="961-122-1222"  id="phone">                    
                    </div>
                    <div class="mb-3 col-6">
                        <label for="">Email</label>
                        <input type="text" class="form-control" placeholder="email" id="email">                    
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary">Continue</button>
                    </div>
                </div>
            </form>

        </div>
    </div> 

@endsection

@section('bottom-js')
    <script src="{{ url('js/admin/file-name.css') }}"></script>
@endsection




