<?php $this->load->view("layout/header") ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Menu Utama</a></div>
                <div class="breadcrumb-item">Data User</div>
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
                                        <th class="text-left">UserID</th>
                                        <th class="text-left">Email</th>
                                    </tr>
                                    <?php if (!empty($dt_user["data"])) { ?>
                                        <?php foreach ($dt_user["data"] as $k_user => $val) { ?>
                                        <tr>
                                            <td class="p-0 text-center"><?php echo $k_user+1 ?></td>
                                            <td><?php echo $val['username'] ?></td>
                                            <td><?php echo $val['email'] ?></td>
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
