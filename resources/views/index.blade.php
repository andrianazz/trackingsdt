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
                <div class="card p-4 mt-3">
                    <div class="text-right">
                        <button type="submit" class="mt-4 search-icon btn btn-info">
                            <i class="fa fa-right-to-bracket"></i>
                        </button>
                    </div>
                    <h3 class="heading mt-3 text-center font-weight-bold">LACAK PENYAMPAIAN SPPT</h3>
                    <div class="d-flex justify-content-center">
                        <div class="search">
                            <form action="{{ route('search') }}" method="POST">
                                @csrf
                                <!-- <input type="text" name="search" class="search-input" placeholder="Masukkan Nomor NOP...." data-mask="00-00-000-000-000-0000-0"> -->
                                <input autocomplete="false" id="nop" type="text" name="search" class="search-input" placeholder="Masukkan Nomor NOP...." data-mask="00-00-000-000-000-0000-0" require>
                                <button type="submit" class="search-icon btn btn-info"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-4 g-1 px-4 mb-5">

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

        // $(document).ready(function() {
        //     //$('#example').DataTable();
        //     $('#idCetakNop').click(function() {
        //         var nopp = $('#nop').val();
        //         var nop = nopp.split("-");
        //         $("#idLoading").show();
        //         $("#mdl").modal('show');
        //         $("#idModul").html('');
        //         $("#idDownload").html('<a href="kiosk/tagihanpbb/cekpbb_sendfile.php?nop=' + nop[0] + '-' + nop[1] + '-' + nop[2] + '-' + nop[3] + '-' + nop[4] + '-' + nop[5] + '-' + nop[6] + '" target="_blank"><button class="btn btn-success" id="" type="button"  >Dowload</button></a>');

        //         $.post("cekpbb.php", {
        //             nop: nopp
        //         }, function(data) {
        //             $("#idLoading").hide('slow');
        //             $("#idModul").html(data);


        //             //$("#mdl").modal('hide');
        //         });



        //     });
        //     $("#idcetak").click(function() {
        //         var nopp = $('#nop').val();
        //         var nop = nopp.split("-");
        //         $("#idModul").html('<embed src="kiosk/tagihanpbb/cekpbb.php?nop=' + nop[0] + '-' + nop[1] + '-' + nop[2] + '-' + nop[3] + '-' + nop[4] + '-' + nop[5] + '-' + nop[6] + '"  width="100%" height="600px" />');

        //     });

        // });
    </script>
</body>

</html>