<?php
echo $this->extend('tamplate/index');
echo $this->section('content');

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header -->
            <form action="<?php echo $action; ?>" method="post">
                <div class="card-body">
                    <?php if (validation_errors()) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            <?php echo validation_list_errors() ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (session()->getFlashdata('error')) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-warning"></i> error</h5>
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php echo csrf_field() ?>
                    <?php
                    if(current_url(true)->getSegment(2) =='edit' ){
                        ?>
                            <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_santri'];?>"
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="id_santri">id santri</label>
                        <input type="text" name="id_santri" id="id_santri" value="<?php echo empty(set_value('id_santri')) ? (empty($edit_data['id_santri']) ?"":$edit_data['id_santri']) : set_value('id_santri'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" id="nis" value="<?php echo empty(set_value('nis')) ? (empty($edit_data['nis']) ?"":$edit_data['nis']) : set_value('nis'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama_santri">nama santri</label>
                        <input type="text" name="nama_santri" id="nama_santri" value="<?php echo empty(set_value('nama_santri')) ? (empty($edit_data['nama_santri']) ?"":$edit_data['nama_santri']) : set_value('nama_santri'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" name="alamat" id="alamat" value="<?php echo empty(set_value('alamat')) ? (empty($edit_data['alamat']) ?"":$edit_data['alamat']) : set_value('alamat'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="asrama">asrama</label>
                        <input type="text" name="asrama" id="asrama" value="<?php echo empty(set_value('asrama')) ? (empty($edit_data['asrama']) ?"":$edit_data['asrama']) : set_value('asrama'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tahun_mondok">tahun mondok</label>
                        <input type="text" name="tahun_mondok" id="tahun_mondok" value="<?php echo empty(set_value('tahun_mondok')) ? (empty($edit_data['tahun_mondok']) ?"":$edit_data['tahun_mondok']) : set_value('tahun_mondok'); ?>" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
echo $this->endSection();
