@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Matriks Normalisasi Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Matriks Normalisasi</a></li>
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
                    <h3 class="card-title">Membuat Matriks Normalisasi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ route('matriks-normalisasi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Pilih Kriteria</label>
                            <select data-placeholder="Pilih Kriteria " name="kriteria" id="kriteria"
                                class="form-control select2 {{ $errors->has('kriteria') ? "is-invalid":"" }}">
                                <option></option>
                                @foreach ($kriteria as $id => $kriteria)
                                <option value="{{ $id }}"
                                    {{ (in_array($id, old('sub_kriteria', [])) || isset($sub_kriteria) && $sub_kriteria->kriteria->contains($id)) ? 'selected' : '' }}>
                                    {{ $kriteria }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('kriteria'))
                            <span class="error invalid-feedback">{{ $errors->first('kriteria') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                            <a href="{{ route('matriks-normalisasi.index') }}"
                                class="btn btn-default float-left">@lang('global.cancel')</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
