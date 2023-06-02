@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kriteria</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item active">Kriteria</li>
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
                    <h3 class="card-title">Data Kriteria</h3>
                    @can('kriteria.add')
                    <a href="{{ route('kriteria.create') }}" class="btn btn-success btn-sm float-right">
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
                                <th>Kriteria</th>
                                <th class="w-25">@lang('global.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($kriteria as $kriteria)
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>{{ $kriteria->nama_kriteria }}</td>
                                <td class="text-center">
                                    @can('kriteria.delete')
                                    <form action="{{ route('kriteria.destroy',$kriteria->id) }}" method="post">
                                        @csrf
                                        @can('kriteria.edit')
                                        <a href="{{ route('kriteria.edit',$kriteria->id) }}" type="button"
                                            class="btn btn-info btn-xs"> @lang('global.edit')</a>
                                        @endcan
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" class="btn btn-danger btn-xs"
                                            onclick="if (confirm('Вы уверены?')) {this.form.submit()}">
                                            @lang('global.delete')</button>
                                    </form>
                                    @endcan
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
