@extends('blades.admin')

@section('title', 'Create ~MODEL~')
    
@section('css')
    <link rel="stylesheet" href="{{ url('css/admin/file-name.css') }}">
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            Sale Point
        </div>
        <div class="card-body">
            <form>
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
                    <div class="col-12">
                        <button class="btn-primary">Continue</button>
                    </div>
                </div>
            </form>
        </div>
    </div> 

@endsection

@section('bottom-js')
    <script src="{{ url('js/admin/file-name.css') }}"></script>
@endsection