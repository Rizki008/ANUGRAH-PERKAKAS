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
                    <a href="<?= base_url('supplier') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Data Bahan Mentah</span>
                    </a>
                    <ul class="submenu">
                        <!-- <li><a href="<?= base_url('kategori') ?>">Kategori</a></li> -->
                        <li><a href="<?= base_url('barang') ?>">Bahan Mentah</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-shopping-cart"></span><span class="mtext">Pemsanan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('pesanan') ?>">Pesanan Masuk</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>