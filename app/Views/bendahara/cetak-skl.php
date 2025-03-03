<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../adminlte/dist/css/adminlte.min.css">
    <style>
        .standar-text {
            font-size: 27px;
        }

        .suket {
            font-size: 29px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .deskripsi {
            word-spacing: 6px;
        }

        .wrapper {
            margin: 0 auto;
            padding: 6mm;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <img src="../../assets/img/kop-surat.png" alt="" class="img-fluid mx-auto d-block">
                    <br>
                    <p class="suket text-center">
                        SURAT KETERANGAN
                    </p>
                </div>
                <!-- /.col -->
            </div>
            <br>
            <!-- row header -->
            <div class="row standar-text">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            Dari
                        </div>
                        <div class="col-1">
                            <p class="float-right">:</p>
                        </div>
                        <div class="col-8">
                            Bendahara Pondok Pesantren Imam Syafi'i
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Kepada
                        </div>
                        <div class="col-1">
                            <p class="float-right">:</p>
                        </div>
                        <div class="col-8">
                            Kepala Sekolah SDI-ST/ MSW/ MSU
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:row header -->
            <br>
            <p class="standar-text">Menerangkan bahwa santri dengan data berikut ini,</p>
            <br>
            <!-- Biodata santri -->
            <div class="row standar-text">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            Nama
                        </div>
                        <div class="col-1">
                            <p class="float-right">:</p>
                        </div>
                        <div class="col-8">
                            <?= strtoupper($skl['name']); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Nama Orang Tua
                        </div>
                        <div class="col-1">
                            <p class="float-right">:</p>
                        </div>
                        <div class="col-8">
                            <?= strtoupper($skl['name_orang_tua']); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Kelas
                        </div>
                        <div class="col-1">
                            <p class="float-right">:</p>
                        </div>
                        <div class="col-8">
                            <?= $skl['kelas']; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Tahun Ajaran
                        </div>
                        <div class="col-1">
                            <p class="float-right">:</p>
                        </div>
                        <div class="col-8">
                            <?= $skl['tahun_ajaran']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- end: Biodata santri -->
            <!-- Telah lunas -->
            <div class="row standar-text deskripsi">
                <p>Telah <span class="font-weight-bold text-uppercase">melunasi</span> seluruh tanggungan biaya <span class="font-weight-bold text-uppercase">spp, daftar ulang</span> dan <span class="font-weight-bold text-uppercase">administrasi</span> lainnya.</p>
            </div>
            <div class="row standar-text deskripsi">
                <p>Demikian surat ini diberikan untuk dipergunakan sebagaimana mestinya. Jazakumullohu Khoiron.</p>
            </div>
            <br>
            <!-- end: Telah lunas -->
            <!-- Kota, tanggal, pejabat -->
            <div class="row justify-content-end standar-text">
                <div class="col-6">
                    <p class="text-center">Tulungagung, <?= $tanggal; ?></p>
                    <p class="text-center">Bendahara Pondok Pesantren</p>
                    <br>
                    <br>
                    <br>
                    <p class="text-center font-weight-bold">Wahyu Utomo, S.Pd.</p>
                </div>
            </div>
            <!-- end: Kota, tanggal, pejabat -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>