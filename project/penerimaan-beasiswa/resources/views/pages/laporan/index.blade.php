@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Laporan</h3>
                    {{-- @can('normalisasi-matriks-terbobot.add')
                    <a href="{{ route('normalisasi-matriks-terbobot.create') }}"
                        class="btn btn-success btn-sm float-right">
                        <span class="fas fa-plus-circle"></span>
                        @lang('global.add')
                    </a>
                    @endcan --}}
                    @can('matriks.print')
                    <a href="{{ route('laporan.print') }}" class="btn btn-success btn-sm float-right" target="_blank" style="margin-right: 5px">
                        <span class="fas fa-plus-circle"></span>
                        Print
                    </a>
                    @endcan
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Data table -->
                    <table id="dataTable"
                        class="table table-responsive table-bordered table-striped dataTable dtr-inline table-sm" role="grid"
                        aria-describedby="dataTable_info">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Preferensi</th>
                                <th>Ranking</th>
                                <th>Prodi</th>
                                <th>Semester</th>
                                <th>Jumlah Tanggungan</th>
                                <th>Pendapatan Orang Tua</th>
                                <th>IPK</th>
                                <th>Prestasi</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1
                            @endphp
                        @foreach ($matriks as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        {{$mhs->nama}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        {{$mhs->nim}}
                                    @endforeach
                                </td>
                                <td>{{$item->preferensi}}</td>
                                <td>{{$item->getRank()}}</td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        {{$mhs->prodi}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        {{$mhs->semester}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        {{$mhs->jumlah_tanggungan}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        @currency($mhs->penghasilan_orang_tua)
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        {{$mhs->ipk}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        {{$mhs->prestasi}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        {{$mhs->alamat}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->mahasiswa as $mhs)
                                        {{$mhs->no_telepon}}
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
