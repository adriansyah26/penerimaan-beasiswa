<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <title>Document</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <h1 class="card-title">
                        <a href="{{ route('data-mahasiswa.index') }}">Data Mahasiswa</a>
                    </h1>

                    <!-- /.card-header -->
                    <table id="dataTable" class="table table-bordered table-hover dataTable dtr-inline table-sm"
                        user="grid" aria-describedby="dataTable_info">
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
</body>

</html>
