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
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div> 

@endsection

@section('bottom-js')
    <script src="{{ url('js/admin/file-name.css') }}"></script>
@endsection