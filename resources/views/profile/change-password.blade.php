@extends('templates.backend.master-admin')

@section('title', 'Change Password'  )

@section('content')
    <!-- Page Heading -->
    <div id="profile" class="row  align-items-center">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Change Password</h1>
        </div>
    </div>
    <hr>
    <div class="row mb-5 justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                </div>
                <form action="{{ url('/profile/change-password', Auth::user()->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    @method('PUT')
                    
                    <!-- hidden -->
                    <div class="card-body row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Current Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error ('password') 
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                                @error ('new_password') 
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <a href="{{ route('profile.index') }}" class="btn btn-light"> Back </a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection