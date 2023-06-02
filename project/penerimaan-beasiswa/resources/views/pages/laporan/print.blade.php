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
                        <a href="{{ route('laporan.index') }}">Laporan</a>
                    </h1>

                    <!-- /.card-header -->
                    <table id="dataTable" class="table table-bordered table-hover dataTable dtr-inline table-sm"
                        user="grid" aria-describedby="dataTable_info">
                        <thead>
                            <tr class="text-center">
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
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
</body>

</html>
