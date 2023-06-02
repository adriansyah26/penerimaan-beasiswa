@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Normalisasi Matriks Keputusan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item active">Normalisasi Matriks Keputusan</li>
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
                    <h3 class="card-title">Data Normalisasi Matriks Keputusan</h3>
                    @can('matriks-keputusan.add')
                    <a href="{{ route('normalisasi-matriks-keputusan.create') }}" class="btn btn-success btn-sm float-right">
                        <span class="fas fa-plus-circle"></span>
                        @lang('global.add')
                    </a>
                    @endcan
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Data table -->
                    <table id="dataTable"
                        class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid"
                        aria-describedby="dataTable_info">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>IPK (C1)</th>
                                <th>Pendapatan (C2)</th>
                                <th>Prestasi (C3)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($normalisasi_matriks_keputusan as $normalisasi)
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>{{ $normalisasi->mahasiswa->nama }}</td>
                                <td>{{ $normalisasi->mahasiswa->nim }}</td>
                                <td>{{ $normalisasi->ipk }}</td>
                                <td>{{ $normalisasi->pendapatan }}</td>
                                <td>{{ $normalisasi->prestasi }}</td>
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
