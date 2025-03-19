<?= $this->extend('layout/main'); ?>

<?= $this->section('style'); ?>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap4.css"> -->
<link rel="stylesheet" href="<?= base_url(); ?>adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- include summernote css-->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!-- CSS for datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css">

<style>
    .note-editor .dropdown-toggle::after {
        all: unset;
    }

    .note-editor .note-dropdown-menu {
        box-sizing: content-box;
    }

    .note-editor .note-modal-footer {
        box-sizing: content-box;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $subtitle; ?></h1>
                </div>
            </div>
            <!-- Succes and error mesage if exist -->
            <div class="row">
                <div class="col-sm-12">
                    <?php $errors = validation_errors(); ?>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <?php if (session('success') !== null) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= session('success') ?>
                        </div>
                    <?php endif ?>

                    <?php if (session('error') !== null) : ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= is_array(session('error')) ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Tambah SKT Baru</h3>
            </div>
            <!--  Begin form  -->
            <?= form_open('skt'); ?>
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label for="namaSantri" class="col-sm-2 col-form-label">Nama Santri</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="namaSantri" name="nama" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="namaOrtu" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="namaOrtu" name="namaortu" />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="kelas" name="kelas">
                            <option selected disabled value="">- Pilih kelas -</option>
                            <?php foreach ($kelas as $item): ?>
                                <option><?= $item; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tahunajaran" class="col-sm-2 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="tahunajaran" name="tahunajaran">
                            <option selected disabled value="">- Pilih tahun ajaran -</option>
                            <?php foreach ($tahunAjaran as $tahun): ?>
                                <option><?= $tahun; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tanggungan" class="col-sm-2 col-form-label">Rincian Tanggungan</label>
                    <div class="col-sm-7">
                        <textarea type="text" class="form-control" id="tanggungan" name="tanggungan"></textarea>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
            <?= form_close(); ?>
            <!-- End Form -->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Historis Surat Keterangan Tanggungan</h3>
            </div>
            <div class="card-body">
                <table id="historiskt" class="table table-striped table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Nama Orang Tua</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Tahun Ajaran</th>
                            <th class="text-center">Tanggungan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($skt as $item): ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td id="id" class="text-center"><?= $item['id']; ?></td>
                                <td id="name"><?= $item['name']; ?></td>
                                <td id="name_ortu"><?= $item['name_orang_tua']; ?></td>
                                <td id="kelas" class="text-center"><?= $item['kelas']; ?></td>
                                <td id="tahun_ajaran" class="text-center"><?= $item['tahun_ajaran']; ?></td>
                                <td id="id" class="text-center"><?= $item['tanggungan']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('cetak-skt/' . $item['id']); ?>" class="btn btn-sm btn-warning" target="_blank"><i class="fas fa-print"></i> <span class="text">Cetak</span></a>
                                    <!-- <button type="button" class="btn btn-sm btn-primary edit"><i class=" fas fa-edit"></i> <span class="text">Edit</span></button> -->
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Modal -->
        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="modalId" name="modalId" hidden>
                        <div class="form-group">
                            <label for="modalNamaSantri">Nama Santri</label>
                            <input type="text" class="form-control" id="modalNamaSantri" name="modalNamaSantri">
                        </div>
                        <div class="form-group">
                            <label for="modalNamaOrtu">Nama Orang Tua</label>
                            <input type="text" class="form-control" id="modalNamaOrtu" name="modalNamaOrtu">
                        </div>
                        <div class="form-group">
                            <label for="modalKelas">Kelas</label>
                            <select class="form-control" id="modalKelas" name="modalKelas">
                                <option selected disabled value="">- Pilih kelas -</option>
                                <?php foreach ($kelas as $item): ?>
                                    <option><?= $item; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modalTahunAjaran">Tahun Ajaran</label>
                            <select class="form-control" id="modalTahunAjaran" name="modalTahunAjaran">
                                <option selected disabled value="">- Pilih kelas -</option>
                                <?php foreach ($tahunAjaran as $tahun): ?>
                                    <option><?= $tahun; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modalTanggungabn">Rincian Tanggungan</label>
                            <textarea type="text" class="form-control" id="modalTanggungan" name="modalTanggungan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button id="modalSaveButton" type="button" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- end: Modal -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<!-- Jquery -->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
<!-- JS Plugin for datatable -->
<!-- <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script> -->
<script src="<?= base_url(); ?>adminlte/plugins/datatables/jquery.dataTables.js"></script>
<!-- <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"></script> -->
<script src="<?= base_url(); ?>adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- JS function for tabale that using datatable plugin -->
<!-- include summernote js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $('#historiskt').DataTable({
        language: {
            search: 'Pencarian :',
            searchPlaceholder: 'Cari data skt',
            emptyTable: 'Belum ada histori skt',
            info: 'Menampilkan _START_ - _END_ dari total _TOTAL_ skt',
            lengthMenu: 'Tampilkan _MENU_ skt',
            paginate: {
                "next": ">",
                "previous": "<",
                "first": "<<",
                "last": ">>"
            },
        },
        columnDefs: [{
                name: 'id',
                visible: false,
                targets: 1,
                searchable: false,
                orderable: false,
            },
            {
                name: 'tanggungan',
                visible: false,
                targets: 6,
                searchable: false,
                orderable: false,
            }
        ]
    });

    $(document).on('click', '.edit', function(e) {
        e.preventDefault();

        let currentRow = $(this).closest('tr');

        let data = $('#historiskt').DataTable().row(currentRow).data();
        console.log(data[6]);

        $('#modal-edit').find('.modal-title').text('Ubah data santri : ' + data[2]);
        $('#modal-edit').find('#modalNamaSantri').val(data[2]);
        $('#modal-edit').find('#modalNamaOrtu').val(data[3]);
        $('#modal-edit').find('#modalKelas').val(data[4]);
        $('#modal-edit').find('#modalTahunAjaran').val(data[5]);
        $('#modal-edit').find('#modalTanggungan').val(data[6]);
        $('#modal-edit').find('#modalId').val(data[1]);
        $('#modal-edit').modal('show');
    });

    $('#modalSaveButton').on('click', function() {
        let nama = $('#modal-edit').find('#modalNamaSantri').val();
        let namaOrtu = $('#modal-edit').find('#modalNamaOrtu').val();
        let kelas = $('#modal-edit').find('#modalKelas').val();
        let tahunAjaran = $('#modal-edit').find('#modalTahunAjaran').val();
        let tanggungan = $('#modal-edit').find('#modalTanggungan').val();
        let id = $('#modal-edit').find('#modalId').val();

        $.ajax({
            url: '<?= base_url('update-skt'); ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                nama: nama,
                namaOrtu: namaOrtu,
                kelas: kelas,
                tahunAjaran: tahunAjaran,
                tanggungan: tanggungan,
                id: id
            },
            success: function(response) {

                alert(response.data['message']);

                window.location.reload();

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });

    $('#tanggungan').summernote({
        dialogsInBody: true,
        minHeight: 170,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear', 'italic']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
        ],
    });

    $('#modalTanggungan').summernote({
        dialogsInBody: true,
        minHeight: 170,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear', 'italic']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
        ],
    });
</script>
<?= $this->endSection(); ?>