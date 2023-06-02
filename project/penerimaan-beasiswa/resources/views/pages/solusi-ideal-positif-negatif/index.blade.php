@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Solusi Ideal Positif Negatif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item active">Solusi Ideal Positif Negatif</li>
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
                    <h3 class="card-title">Data Solusi Ideal Positif Negatif</h3>
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
                            <tr class="text-center">
                                <td>A <sup>+</sup>
                                </td>
                                <td>{{ $maxIPK ?? '' }}</td>
                                <td>{{ $maxPendapatan ?? ''}}</td>
                                <td>{{ $maxPrestasi ?? ''}}</td>
                            </tr>
                            <tr class="text-center">
                                <td>A <sup>-</sup>
                                <td>{{ $minIPK ?? '' }}</td>
                                <td>{{ $minPendapatan ?? ''}}</td>
                                <td>{{ $minPrestasi ?? ''}}</td>
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
