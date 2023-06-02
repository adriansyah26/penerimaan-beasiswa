@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Normalisasi Matriks Terbobot Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Normalisasi Matriks Terbobot Management</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->

<section class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Membuat Normalisasi Matriks Terbobot</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ route('normalisasi-matriks-terbobot.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Pilih Mahasiswa</label>
                            <select data-placeholder="Pilih Mahasiswa " name="mahasiswa" id="mahasiswa"
                                class="form-control select2 {{ $errors->has('mahasiswa') ? "is-invalid":"" }}">
                                <option></option>
                                @foreach ($mahasiswa as $id => $mhs)
                                <option value="{{ $id }}"
                                    {{ (in_array($id, old('mhs', [])) || isset($matriks_keputusan) && $matriks_keputusan->mhs->contains($id)) ? 'selected' : '' }}>
                                    {{ $mhs }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('mahasiswa'))
                            <span class="error invalid-feedback">{{ $errors->first('mahasiswa') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                            <a href="{{ route('matriks-keputusan.index') }}"
                                class="btn btn-default float-left">@lang('global.cancel')</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
