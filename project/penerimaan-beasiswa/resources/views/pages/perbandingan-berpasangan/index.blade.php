@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Matriks Perbandingan Berpasangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item active">Matriks Perbandingan Berpasangan</li>
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
                    <h3 class="card-title">Data Matriks Perbandingan Berpasangan</h3>
                    @can('perbandingan-berpasangan.add')
                    <a href="{{ route('perbandingan-berpasangan.create') }}" class="btn btn-success btn-sm float-right">
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
                                <th></th>
                                <th>IPK (C1)</th>
                                <th>Pendapatan (C2)</th>
                                <th>Prestasi (C3)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perbandingan as $item)
                            <tr class="text-center">
                                <td>
                                    @if ($item->kriteria_id === 1)
                                        IPK
                                    @endif
                                    @if ($item->kriteria_id === 2)
                                        PENDAPATAN ORANG TUA
                                    @endif
                                    @if ($item->kriteria_id === 3)
                                        PRESTASI
                                    @endif
                                </td>
                                <td>{{ $item->ipk }}</td>
                                <td>{{ $item->pendapatan }}</td>
                                <td>{{ $item->prestasi }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tbody>
                            <tr class="text-center">
                                <td>Jumlah</td>
                                <td> {{$jumlahIPK}} </td>
                                <td> {{$jumlahPendapatan}} </td>
                                <td> {{$jumlahPrestasi}} </td>
                            </tr>
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
