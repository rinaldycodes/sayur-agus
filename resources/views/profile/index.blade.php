@extends('templates.backend.master-admin')

@section('title', 'Profile'  )

@section('content')
    <!-- Page Heading -->
    <div class="row align-items-center">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Profile</h1>
        </div>
    </div>
    <hr>
    <div class="row mb-5">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    {{ Auth::user()->name }}
                </div>
                <div class="card-body">
                
                </div>
            </div>
        </div>
    </div>
@endsection