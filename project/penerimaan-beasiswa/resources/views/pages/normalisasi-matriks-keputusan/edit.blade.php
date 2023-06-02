@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kriteria Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('permissionIndex') }}">Kriteria Management</a></li>
                    <li class="breadcrumb-item active">@lang('global.edit')</li>
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
                    <h3 class="card-title">@lang('global.edit') Kriteria</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ route('kriteria.update',$kriteria->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>@lang('cruds.permission.fields.name')</label>
                            <select data-placeholder="Pilih Kriteria " name="kriteria" id="kriteria"
                                class="form-control select2 {{ $errors->has('kriteria') ? "is-invalid":"" }}">
                                <option></option>
                                <option value="IPK" {{$kriteria->nama_kriteria === 'IPK' ? 'selected' : ''}}>IPK</option>
                                <option value="PENDAPATAN ORANG TUA" {{$kriteria->nama_kriteria === 'PENDAPATAN ORANG TUA' ? 'selected' : ''}}>PENDAPATAN ORANG TUA</option>
                                <option value="PRESTASI" {{$kriteria->nama_kriteria === 'PRESTASI' ? 'selected' : ''}}>PRESTASI</option>
                            </select>
                            @if($errors->has('kriteria'))
                            <span class="error invalid-feedback">{{ $errors->first('kriteria') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                            <a href="{{ route('kriteria.index') }}"
                                class="btn btn-default float-left">@lang('global.cancel')</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
