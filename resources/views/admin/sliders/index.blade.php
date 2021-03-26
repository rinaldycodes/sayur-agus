@extends('templates.backend.master-admin') @section('title', 'Semua Slider' )
@section('content')
<div class="row">
    <div class="col">
        <h1 class="h3 mb-2 text-gray-800">Slider</h1>
    </div>
    <div class="col text-right">
        <a href="{{ route('sliders.create') }}" class="btn btn-primary btn-sm"
            ><i class="fas fa-plus"></i> Tambah</a
        >
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Semua Slider</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table
                class="table table-bordered table-striped table-hover"
                id="myTable"
                width="100%"
                cellspacing="0"
            >
                <thead class="text-center">
                    <tr>
                        <th>Slider</th>
                        <th>Image</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>Slider</th>
                        <th>Image</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody class="text-center">
                    @forelse ($sliders as $slider)

                    <tr class="align-middle">
                        <td>
                            <p>
                                <b>{{$slider->name}}</b>
                            </p>
                        </td>
                        <td>{{$slider->img}}</td>
                        <td>{{$slider->created_at}}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm mb-1">
                                    <a
                                        href="{{route('sliders.edit', $slider->id)}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Edit"
                                        class="btn btn-sm btn-success"
                                        ><i class="fas fa-edit"></i
                                    ></a>
                                </div>
                                <div class="col-sm mb-1">
                                    <form
                                        action="{{route('sliders.destroy', $slider->id)}}"
                                        method="post"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Delete"
                                    >
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <p>Tidak ada slide</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
