@extends('mahasiswa.layout')

@section('content')
<div class="row my-5">
    <div class="col-lg-12">
        <div class="float-start">
            <h1>Crud Mahasiswa</h1>
        </div>
        <div class="float-end">
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">Create New Mahasiswa</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($mahasiswas as $mahasiswa)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->kelas }}</td>
            <td>
                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post">
                    <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection