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

                    <form action="{{ route('sub-kriteria.update',$sub_kriteria->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Kriteria</label>
                            <select data-placeholder="Pilih Kriteria " name="kriteria" id="kriteria"
                                class="form-control select2 {{ $errors->has('kriteria') ? "is-invalid":"" }}">
                                <option></option>
                                @foreach ($kriteria as $kriteria)
                                <option value="{{ $kriteria->id }}" {{(isset($sub_kriteria) && $sub_kriteria->kriteria->contains($kriteria->id) ? "selected" : '')}}>
                                    {{$kriteria->nama_kriteria}}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('kriteria'))
                            <span class="error invalid-feedback">{{ $errors->first('kriteria') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Sub Kriteria</label>
                            <select data-placeholder="Pilih Sub Kriteria " name="sub_kriteria" id="sub_kriteria"
                                class="form-control select2 {{ $errors->has('sub_kriteria') ? "is-invalid":"" }}">
                                <option></option>
                                <option value="Rendah" {{$sub_kriteria->sub_kriteria === 'Rendah' ? 'selected' : ''}}>RENDAH</option>
                                <option value="Cukup" {{$sub_kriteria->sub_kriteria === 'Cukup' ? 'selected' : ''}}>CUKUP</option>
                                <option value="Tinggi" {{$sub_kriteria->sub_kriteria === 'Tinggi' ? 'selected' : ''}}>TINGGI</option>
                            </select>
                            @if($errors->has('sub_kriteria'))
                            <span class="error invalid-feedback">{{ $errors->first('sub_kriteria') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                            <a href="{{ route('sub-kriteria.index') }}"
                                class="btn btn-default float-left">@lang('global.cancel')</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
