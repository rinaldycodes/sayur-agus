@extends('templates.backend.master-admin') @section('title', 'Edit Profile' )
@section('content')
<!-- Page Heading -->
<div id="profile" class="row align-items-center">
    <div class="col">
        <h1 class="h3 mb-2 text-gray-800">Edit Profile</h1>
    </div>
</div>
<hr />
<div class="row mb-5 justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header bg-primary text-white"></div>
            <form
                action="{{ route('profile.update', $user->id) }}"
                enctype="multipart/form-data"
                method="POST"
            >
                @csrf @method('PUT')

                <!-- hidden -->
                <div class="card-body row">
                    <div
                        class="col-md-6 py-3 text-center justify-content-center"
                    >
                        <img
                            src="{{ $user->profile 
                                ? url('/storage', $user->profile->photo) 
                                : 'https://bit.ly/3qOrh8Q' }}"
                            class="img-prof rounded-circle"
                            alt="Photo"
                        />
                        <input type="file" name="photo" class="form-control" />
                        @error('photo')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 py-3">
                        <div class="form-group">
                            <div class="email mb-3">
                                <label for="">Nama</label>
                                <input
                                    type="text"
                                    value="{{ Auth::user()->name }}"
                                    name="name"
                                    class="form-control"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input
                                    type="text"
                                    value="{{ Auth::user()->email }}"
                                    readonly
                                    class="form-control"
                                />
                            </div>
                            <div class="role">
                                <p class="badge badge-primary">
                                    {{ $user->role }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="">No. Telp</label>
                                <input
                                    type="text"
                                    name="no_telp"
                                    value="{{ $user->profile
                                            ? $user->profile->no_telp : '' }}"
                                    class="form-control"
                                />
                            </div>
                            <div class="address mb-5">
                                <label for="">Alamat</label>
                                <textarea
                                    class="form-control"
                                    name="address"
                                    id=""
                                    cols="15"
                                    rows="5"
                                    >{{ $user->profile
                                            ? $user->profile->address : '' }}</textarea
                                >
                            </div>
                            <div class="buttons">
                                <button type="submit" class="btn btn-primary">
                                    SUBMIT
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
