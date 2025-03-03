<?= $this->extend('layout/main'); ?>

<?= $this->section('style'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0"><?= $subtitle; ?></h3>
            </div>
        </div>
        <!--end::Row-->
        <div class="row">
            <div class="col-sm-12">
                <!-- Tampilkan pesan jika berhasil atau gagal input -->

                <?php $errors = validation_errors(); ?>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <?php if (session('success') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('success') ?></div>
                <?php endif ?>

                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('error') ?></div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-6">
                <!-- Default box -->
                <div class="card card-success card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Tambah SKL Baru</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <?= form_open('skl'); ?>
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="namaSantri" class="col-sm-4 col-form-label">Nama Santri</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="namaSantri" name="nama" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namaOrtu" class="col-sm-4 col-form-label">Nama Orang Tua</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="namaOrtu" name="namaortu" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-7">
                                <select class="form-select" id="kelas" name="kelas" required>
                                    <option selected disabled value="">- Pilih kelas -</option>
                                    <?php foreach ($kelas as $item): ?>
                                        <option><?= $item; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tahunajaran" class="col-sm-4 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-7">
                                <select class="form-select" id="tahunajaran" name="tahunajaran" required>
                                    <option selected disabled value="">- Pilih tahun ajaran -</option>
                                    <?php foreach ($tahunAjaran as $tahun): ?>
                                        <option><?= $tahun; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success pr-4 pl-4">Simpan</button>
                    </div>
                    <!--end::Footer-->
                    <?= form_close(); ?>
                    <!--end::Form-->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card card-warning card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Historis SKL</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="historiskl" class="table table-hover">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Nama Orang Tua</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Tahun Ajaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($skl as $item): ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['name_orang_tua']; ?></td>
                                            <td class="text-center"><?= $item['kelas']; ?></td>
                                            <td class="text-center"><?= $item['tahun_ajaran']; ?></td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-success"><ion-icon name="glasses" class="icon" size='small'></ion-icon> <span class="text">Lihat</span></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- JS Plugin for datatable -->
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
<!-- JS function for tabale that using datatable plugin -->
<script type="text/javascript">
    $('#historiskl').DataTable({
        language: {
            search: 'Pencarian :',
            searchPlaceholder: 'Cari data skl',
            emptyTable: 'Belum ada histori skl',
            info: 'Menampilkan _START_ to _END_ of _TOTAL_ _ENTRIES-TOTAL_',
            entries: {
                _: 'skl',
                1: 'skl'
            },
        }
    });
</script>
<?= $this->endSection(); ?>