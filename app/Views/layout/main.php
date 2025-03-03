<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<?= $this->include('layout/head'); ?>
<!-- end::Head -->

<!-- Custom CSS -->
<?= $this->renderSection('style'); ?>
<!-- end Custom CSS -->

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <?= $this->include('layout/navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->include('layout/sidebar'); ?>
        <!-- /.Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <?= $this->renderSection('content'); ?>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <?= $this->include('layout/footer'); ?>
        <!-- /.Footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Script -->
    <?= $this->include('layout/script'); ?>
    <!-- /.Script -->

    <!-- custom script -->
    <?= $this->renderSection('script'); ?>
    <!-- end custom script -->
</body>

</html>