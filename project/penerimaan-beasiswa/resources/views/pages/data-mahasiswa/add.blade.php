@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Membuat Data Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('api-userIndex') }}">API @lang('cruds.user.title')</a>
                    </li>
                    <li class="breadcrumb-item active">@lang('global.add')</li>
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
                    <h3 class="card-title">Tambah Data Mahasiswa</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ route('data-mahasiswa.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"
                                        class="form-control {{ $errors->has('nama_mahasiswa') ? "is-invalid":"" }}"
                                        value="{{ old('nama_mahasiswa', isset($mahasiswa) ? $mahasiswa->nama : '') }}">
                                    @if($errors->has('nama_mahasiswa'))
                                    <span class="error invalid-feedback">{{ $errors->first('nama_mahasiswa') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>No Induk Mahasiswa</label>
                                    <input type="text" id="nim" name="nim"
                                        class="form-control {{ $errors->has('nim') ? "is-invalid":"" }}"
                                        value="{{ old('nim', isset($mahasiswa) ? $mahasiswa->nim : '') }}">
                                    @if($errors->has('nim'))
                                    <span class="error invalid-feedback">{{ $errors->first('nim') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Program Studi
                                        <span class="btn btn-info btn-xs deselect-all">Deselect all</span>
                                    </label>
                                    <select data-placeholder="Pilih Program Studi" name="prodi" id="prodi"
                                        class="form-control select2 {{ $errors->has('prodi') ? "is-invalid":"" }}">
                                        <option></option>
                                        <option value="1">Teknik Informatika</option>
                                        <option value="2">Sistem Informasi</option>
                                    </select>
                                    @if($errors->has('prodi'))
                                    <span class="error invalid-feedback">{{ $errors->first('prodi') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Semester</label>
                                    <input type="text" id="semester" name="semester"
                                        class="form-control {{ $errors->has('semester') ? "is-invalid":"" }}"
                                        value="{{ old('semester', isset($mahasiswa) ? $mahasiswa->semester : '') }}">
                                    @if($errors->has('semester'))
                                    <span class="error invalid-feedback">{{ $errors->first('semester') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Tanggungan</label>
                                    <input type="number" id="jumlah_tanggungan" name="jumlah_tanggungan"
                                        class="form-control {{ $errors->has('jumlah_tanggungan') ? "is-invalid":"" }}"
                                        value="{{ old('jumlah_tanggungan', isset($mahasiswa) ? $mahasiswa->jumlah_tanggungan : '') }}">
                                    @if($errors->has('jumlah_tanggungan'))
                                    <span
                                        class="error invalid-feedback">{{ $errors->first('jumlah_tanggungan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Penghasilan Orang Tua</label>
                                    <input type="text" id="pendapatan" name="pendapatan"
                                        class="form-control {{ $errors->has('pendapatan') ? "is-invalid":"" }}"
                                        value="{{ old('pendapatan', isset($mahasiswa) ? $mahasiswa->pendapatan : '') }}">
                                    @if($errors->has('pendapatan'))
                                    <span
                                        class="error invalid-feedback">{{ $errors->first('pendapatan') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>IPK</label>
                                    <input type="text" id="ipk" name="ipk"
                                        class="form-control {{ $errors->has('ipk') ? "is-invalid":"" }}"
                                        value="{{ old('ipk', isset($mahasiswa) ? $mahasiswa->ipk : '') }}">
                                    @if($errors->has('ipk'))
                                    <span
                                        class="error invalid-feedback">{{ $errors->first('ipk') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Prestasi</label>
                                    <input type="number" id="prestasi" name="prestasi"
                                        class="form-control {{ $errors->has('prestasi') ? "is-invalid":"" }}"
                                        value="{{ old('prestasi', isset($mahasiswa) ? $mahasiswa->prestasi : '') }}">
                                    @if($errors->has('prestasi'))
                                    <span
                                        class="error invalid-feedback">{{ $errors->first('prestasi') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" id="alamat" name="alamat"
                                        class="form-control {{ $errors->has('alamat') ? "is-invalid":"" }}"
                                        value="{{ old('alamat', isset($mahasiswa) ? $mahasiswa->alamat : '') }}">
                                    @if($errors->has('alamat'))
                                    <span
                                        class="error invalid-feedback">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" id="no_telepon" name="no_telepon"
                                        class="form-control {{ $errors->has('no_telepon') ? "is-invalid":"" }}"
                                        value="{{ old('no_telepon', isset($mahasiswa) ? $mahasiswa->no_telepon : '') }}">
                                    @if($errors->has('no_telepon'))
                                    <span
                                        class="error invalid-feedback">{{ $errors->first('no_telepon') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                            <a href="{{ route('data-mahasiswa.index') }}"
                                class="btn btn-default float-left">@lang('global.cancel')</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
