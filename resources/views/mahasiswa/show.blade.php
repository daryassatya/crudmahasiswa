@extends('mahasiswa.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 my-5">
        <div class="float-start">
            <h2>Detail Mahasiswa</h2>
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

<div class="row gap-2">
    <div class="col-12">
        <div class="form-group">
            <label for="" class="form-label">Nama : </label>
            {{ $mahasiswa->nama }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="" class="form-label">Kelas : </label>
            {{ $mahasiswa->kelas }}
        </div>
    </div>
</div>
@endsection