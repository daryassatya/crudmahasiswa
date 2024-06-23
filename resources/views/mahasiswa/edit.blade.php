@extends('mahasiswa.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 my-5">
        <div class="float-start">
            <h2>Edit Mahasiswa</h2>
        </div>
        <div class="float-end">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>There were some problems with your input. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post">
    @method('put')
    @csrf
    <div class="row gap-2">
        <div class="col-12">
            <div class="form-group">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->nama }}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="" class="form-label">Kelas</label>
                <input type="text" class="form-control" name="kelas" value="{{ $mahasiswa->kelas }}">
            </div>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection