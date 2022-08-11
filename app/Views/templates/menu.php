<?php $uri = current_url(true); ?>

<?php if (in_groups('pegawai')) : ?>
    <div class="content">
        <div class="navigation">
            <ul class="menu js__accordion">
                <li <?php if ($uri->getSegment(1) == "") {
                        echo 'class="current"';
                    } ?>>
                    <a class="waves-effect" href="<?= base_url() ?>"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
                </li>

                <li><a style="pointer-events: none; cursor: default;">Master Data</a></li>
                <li <?php if ($uri->getSegment(1) == "coa") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('coa') ?>"><i class="menu-icon mdi mdi-view-dashboard"></i>Coa</a></li>
                <li <?php if ($uri->getSegment(1) == "supplier") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('supplier') ?>"><i class="menu-icon mdi mdi-truck"></i>Supplier</a></li>
                <li <?php if ($uri->getSegment(1) == "barang") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('barang') ?>"><i class="menu-icon mdi mdi-tshirt-crew"></i>Barang</a></li>
                <li <?php if ($uri->getSegment(1) == "kategori") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('kategori') ?>"><i class="menu-icon mdi mdi-format-list-bulleted-type"></i>Kategori</a></li>

                <li><a style="pointer-events: none; cursor: default;">Transaksi</a></li>

                <li <?php if ($uri->getSegment(1) == "pembelian") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('pembelian') ?>"><i class="menu-icon mdi mdi-sale"></i>Pembelian</a></li>
                <li <?php if ($uri->getSegment(1) == "penjualan") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('penjualan') ?>"><i class="menu-icon mdi mdi-stackexchange"></i>Penjualan</a></li>

                <!-- <li><a style="pointer-events: none; cursor: default;">Laporan</a></li>

                <li <?php if ($uri->getSegment(1) == "laporan") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('laporan/LaporanPenjualan') ?>"><i class="menu-icon mdi mdi-file-document-box"></i>Laporan Penjualan</a></li>
                <li <?php if ($uri->getSegment(1) == "jurnal") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('jurnal') ?>"><i class="menu-icon mdi mdi-file-check"></i>Jurnal Umum</a></li>
                <li <?php if ($uri->getSegment(1) == "bukuBesar") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('bukuBesar') ?>"><i class="menu-icon mdi mdi-file-cloud"></i>Buku Besar</a></li>
                <li <?php if ($uri->getSegment(1) == "kartuStok") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('kartuStok') ?>"><i class="menu-icon mdi mdi-file-document"></i>Kartu Stok</a></li> -->
            </ul>
        </div>
    </div>
<?php endif; ?>


<?php if (in_groups('pemilik')) : ?>
    <div class="content">
        <div class="navigation">
            <ul class="menu js__accordion">
                <li <?php if ($uri->getSegment(1) == "") {
                        echo 'class="current"';
                    } ?>>
                    <a class="waves-effect" href="<?= base_url() ?>"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
                </li>

                <!-- <li><a style="pointer-events: none; cursor: default;">Master Data</a></li>
                <li <?php if ($uri->getSegment(1) == "coa") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('coa') ?>"><i class="menu-icon mdi mdi-view-dashboard"></i>Coa</a></li>
                <li <?php if ($uri->getSegment(1) == "supplier") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('supplier') ?>"><i class="menu-icon mdi mdi-truck"></i>Supplier</a></li>
                <li <?php if ($uri->getSegment(1) == "barang") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('barang') ?>"><i class="menu-icon mdi mdi-tshirt-crew"></i>Barang</a></li>
                <li <?php if ($uri->getSegment(1) == "kategori") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('kategori') ?>"><i class="menu-icon mdi mdi-format-list-bulleted-type"></i>Kategori</a></li>

                <li><a style="pointer-events: none; cursor: default;">Transaksi</a></li>

                <li <?php if ($uri->getSegment(1) == "pembelian") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('pembelian') ?>"><i class="menu-icon mdi mdi-sale"></i>Pembelian</a></li>
                <li <?php if ($uri->getSegment(1) == "penjualan") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('penjualan') ?>"><i class="menu-icon mdi mdi-stackexchange"></i>Penjualan</a></li> -->

                <li><a style="pointer-events: none; cursor: default;">Laporan</a></li>

                <li <?php if ($uri->getSegment(1) == "laporan") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('laporan/LaporanPenjualan') ?>"><i class="menu-icon mdi mdi-file-document-box"></i>Laporan Penjualan</a></li>
                <li <?php if ($uri->getSegment(1) == "jurnal") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('jurnal') ?>"><i class="menu-icon mdi mdi-file-check"></i>Jurnal Umum</a></li>
                <li <?php if ($uri->getSegment(1) == "bukuBesar") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('bukuBesar') ?>"><i class="menu-icon mdi mdi-file-cloud"></i>Buku Besar</a></li>
                <li <?php if ($uri->getSegment(1) == "kartuStok") {
                        echo 'class="current"';
                    } ?>><a href="<?= base_url('kartuStok') ?>"><i class="menu-icon mdi mdi-file-document"></i>Kartu Stok</a></li>
            </ul>
        </div>
    </div>
<?php endif; ?>