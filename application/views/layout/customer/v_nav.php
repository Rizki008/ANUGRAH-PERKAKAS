<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="<?= base_url('customer') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="<?= base_url('customer/barang') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-library"></span><span class="mtext">Data Barang</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('customer/data_pesan') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-truck"></span><span class="mtext">Pesan Barang</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>