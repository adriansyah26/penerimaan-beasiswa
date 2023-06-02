@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                    <h3 class="card-title">@lang('Data Mahasiswa')</h3>
                    @can('mahasiswa.add')
                    <a href="{{ route('data-mahasiswa.create') }}" class="btn btn-success btn-sm float-right">
                        <span class="fas fa-plus-circle"></span>
                        @lang('global.add')
                    </a>
                    @endcan
                    {{-- @can('mahasiswa.print')
                    <a href="{{ route('data-mahasiswa.print') }}" target="__blank" class="btn btn-success btn-sm float-right" style="margin-right: 5px">
                        <span class="fas fa-plus-circle"></span>
                        Print
                    </a>
                    @endcan --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Data table -->
                    <table id="dataTable"
                        class="table table-bordered table-hover dataTable dtr-inline table-sm" user="grid"
                        aria-describedby="dataTable_info">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Prodi</th>
                                <th>Semester</th>
                                <th>Jumlah Tanggungan</th>
                                <th>Pendapatan Orang Tua</th>
                                <th>IPK</th>
                                <th>Prestasi</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th class="w-25">@lang('global.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1
                            @endphp
                            @foreach($mahasiswa as $mhs)
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>
                                    {{ $mhs->nama}}
                                </td>
                                <td>
                                    {{ $mhs->nim ?? '' }}
                                </td>
                                <td>
                                    {{ $mhs->prodi ?? '' }}
                                <td>
                                    {{ $mhs->semester ?? '' }}
                                </td>
                                <td>
                                    {{ $mhs->jumlah_tanggungan ?? '' }}
                                </td>
                                <td>
                                    @currency($mhs->penghasilan_orang_tua ?? 0 )
                                </td>
                                <td>
                                    {{ $mhs->ipk ?? '' }}
                                </td>
                                <td>
                                    {{ $mhs->prestasi ?? '' }}
                                </td>
                                <td>
                                    {{ $mhs->alamat ?? '' }}
                                </td>
                                <td>
                                    {{ $mhs->no_telepon ?? '' }}
                                </td>
                                <td class="text-center">
                                    @can('mahasiswa.delete')
                                    <form action="{{ route('data-mahasiswa.destroy',$mhs->id) }}" method="post">
                                        @csrf
                                        @can('mahasiswa.edit')
                                        <a href="{{ route('data-mahasiswa.edit',$mhs->id) }}" type="button"
                                            class="btn btn-info btn-xs"> @lang('global.edit')</a>
                                        @endcan
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" class="btn btn-danger btn-xs"
                                            onclick="if (confirm('Anda yakin?')) { this.form.submit() } ">
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
@section('scripts')
<script>
    function showPassword(id) {
        $("#hidden_" + id).hide();
        $("#password_" + id).show();
    }

    function hidePassword(id) {
        $("#hidden_" + id).show();
        $("#password_" + id).hide();
    }

    function toggle_api_user(id) {
        $.ajax({
            url: "/api-user/activate/?q=",
            type: "GET",
            data: {
                id
            },
            dataType: "JSON",
            success: function (result) {
                if (result.is_active == 1) {
                    $('#api_user').attr('class', "fas fa-check-circle text-success");
                } else {
                    $('#api_user').attr('class', "fas fa-times-circle text-danger");
                }

            },
            error: function (errorMessage) {
                console.log(errorMessage)
            }
        });
    }

</script>
@endsection
