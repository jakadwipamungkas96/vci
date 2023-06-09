<?php $this->load->view("layout/header") ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Penjualan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Menu Utama</a></div>
                <div class="breadcrumb-item">Data Pejualan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4></h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-left">Kode Barang</th>
                                        <th class="text-left">Nama Barang</th>
                                        <th class="text-left">Customer</th>
                                        <th class="text-left">Qty</th>
                                        <th class="text-left">Harga</th>
                                        <th class="text-left">Netto</th>
                                    </tr>
                                    <?php if (!empty($dt_penjualan["data"])) { ?>
                                        <?php foreach ($dt_penjualan["data"] as $k_penjualan => $val) { ?>
                                        <tr>
                                            <td class="p-0 text-center"><?php echo $k_penjualan+1 ?></td>
                                            <td><?php echo $val['kodebarang'] ?></td>
                                            <td><?php echo $val['namabarang'] ?></td>
                                            <td><?php echo $val['customer'] ?></td>
                                            <td><?php echo $val['qty'] ?></td>
                                            <td><?php echo $val['harga'] ?></td>
                                            <td><?php echo $val['netto'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="9" class="text-secondary text-center">Data Kosong</td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view("layout/footer") ?>
