@extends('templates.backend.master-admin') @section('title', 'Edit User' )
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col text-center mb-4">
        <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
        <small>{{$user->name}}</small>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('users.update', $user->id)}}" method="post">
            @method('PUT') @csrf

            <div class="form-group">
                <label for="email">Email User</label>
                <b>{{ $user->email }}</b>
            </div>

            <div class="form-group">
                <label for="name">Nama User</label>
                <b>{{ $user->name }}</b>
            </div>

            <div class="form-group">
                <label for="role">Role User</label>
                <b>{{ $user->role }}</b>
            </div>

            <hr />

            <div class="form-group">
                <label for="role">Pesanan User</label>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction )
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>
                                {{ $transaction->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <a
                                    href="{{ route('transactions.show', $transaction->id) }}"
                                    class="btn btn-info"
                                >
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <a href="{{ route('users.index') }}" class="btn btn-secondary"
                    >Batal</a
                >
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- /PRODUCT -->
@endsection
