<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url(); ?>logo-pondok-bgwhite.png" alt="ISTA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">APPS Ista</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">BENDAHARA</li>
                <li class="nav-item">
                    <a href="<?= base_url('skl'); ?>" class="nav-link">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>
                            Suket Lunas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('skt'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Suket Tanggungan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>