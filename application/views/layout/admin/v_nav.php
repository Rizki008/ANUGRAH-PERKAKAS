<?php
$notifikasi_bayar = $this->m_admin->notifikasi_bayar();
$data_notifikiasi_bayar = $this->m_admin->data_notifikiasi_bayar(); ?>
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
                    <a href="<?= base_url('admin') ?>" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/data_barang') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Data Barang</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('order') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-truck"></span><span class="mtext">Order Bahan Mentah</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/pesanan_masuk') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-paper-plane"></span><span class="mtext">Pesanan Masuk</span>[<?= $notifikasi_bayar ?>]
                        <span class="badge notification-active"></span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('laporan') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-bookmark1"></span><span class="mtext">Laporan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>