<?php
$notifikasi = $this->m_customer->notifikasi();
$data_notifikiasi = $this->m_customer->data_notifikiasi();
$akun = $this->m_auth->akun(); ?>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo.svg" alt=""></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
            <div class="header-search">
            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">

                    </a>
                </div>
            </div>
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification">[<?= $notifikasi ?>]</i>
                        <span class="badge notification-active"></span>
                    </a>
                    <?php foreach ($data_notifikiasi as $key => $value) { ?>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="notification-list mx-h-350 customscroll">
                                <ul>
                                    <li>
                                        <a href="<?= base_url('customer/data_pesan') ?>">
                                            <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="">
                                            <h3><?= $value->nama_barang ?></h3>
                                            <p>Barang Telah Di Konfirmasi Silahkan Melakukan Pembayaran</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <?php foreach ($akun as $key => $value) { ?>
                            <span class="user-icon">
                                <img src="<?= base_url('assets/profil/' . $value->gambar) ?>" alt="">
                            </span>
                        <?php } ?>
                        <span class="user-name"><?=
                                                $this->session->userdata('nama');
                                                ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="<?= base_url('customer/akun') ?>"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="<?= base_url('auth/logout_user') ?>"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
            <div class="github-link">
                <a href="https://github.com/dropways/deskapp" target="_blank"><img src="<?= base_url() ?>deskapp-master/vendors/images/github.svg" alt=""></a>
            </div>
        </div>
    </div>