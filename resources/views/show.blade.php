<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Tracking SDT</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class='snippet-body'>
    <div class="container mt-4 ">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9">
                <div class="card p-4 mt-3 ">
                    <div class="text-right">
                        <button type="submit" onclick="window.location.href='https://simpbb.pekanbaru.go.id/'" class="mt-4 search-icon btn btn-info">
                            <i class="fa fa-right-to-bracket"></i>
                        </button>
                    </div>
                    <h3 class="heading mt-2 text-center font-weight-bold">LACAK PENYAMPAIAN SPPT</h3>
                    <div class="d-flex justify-content-center">
                        <div class="search">
                            <form action="{{ route('search') }}" method="post">
                                @csrf
                                <input id="nop" type="text" name="search" class="search-input" placeholder="Masukkan Nomor NOP...." name="">
                                <button type="submit" class="search-icon btn btn-info"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3 g-1 mb-5">
                        <div class="card mb-3 p-3">
                            <div class="p-4 text-center text-white text-lg rounded-top" style="background-color: #435ebe"><span class="">Pencarian NOP <br></span><span class="text-medium"> {{$nop}}</span></div>
                            <div class="card-content">
                                <div class="card-body pb-0 px-0 mb-0 mx-0">
                                    <div class="mb-0 pb-0 steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                        <div class="step {{ $tracking >= 1 ? 'completed': '' }} ">
                                            <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="fa-regular fa-file"></i></div>
                                            </div>
                                            <h4 class="step-title my-2">Proses Cetak</h4>
                                        </div>
                                        <div class="step {{ $tracking >= 2 ? 'completed': '' }}">
                                            <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="fa-solid fa-users-gear"></i></div>
                                            </div>
                                            <h4 class="step-title my-2">Proses Distribusi</h4>
                                        </div>
                                        <div class="step {{ $tracking >= 3 ? 'completed': '' }}">
                                            <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="fa-sharp fa-solid fa-truck-fast"></i></div>
                                            </div>
                                            <h4 class="step-title my-2">Proses Penyampaian</h4>
                                        </div>
                                        <div class="step {{ $tracking >= 4 ? 'completed': '' }}">
                                            <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="fa-solid fa-check-to-slot"></i></div>
                                            </div>
                                            <h4 class="step-title my-2">Status Penyampaian</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between mt-3 py-3 px-2" style="background-color: #374250">
                                <div class="col w-100 text-light py-1 px-2">
                                    <span class="text-medium"><b><u>KETERANGAN</u></b></span> <br>
                                        @if($data == null)
                                            @if ($message) 
                                                <span class="text-danger">{{$message}}</span> <br>
                                            @elseif($tracking==3)
                                                <span class="text-medium">-</span> <br>
                                            @else
                                            <span class="text-medium">Silahkan Hubungi SPPT ke BAPENDA Kota Pekanbaru</span> <br>
                                            @endif
                                        @endif

                                        @if($tracking == 4 && $data != null)
                                        @foreach($data as $d)
                                        <table>
                                            <tr>
                                                <td>Nama Penerima</td>
                                                <td>:</td>
                                                <td> </td>
                                                <td>{{ $d->nama_penerima == null ? "Tidak ada" : $d->nama_penerima }}</td>
                                            </tr>
                                            <tr>
                                                <td>Diterima Tanggal</td>
                                                <td>:</td>
                                                <td> </td>
                                                <td>{{ $d->tgl_penyampaian }}</td>
                                            </tr>
                                        </table>
                                        @endforeach
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script>
        $("#nop").inputmask({
            "mask": "99-99-999-999-999-9999-9"
        });
    </script>
</body>

</html>
