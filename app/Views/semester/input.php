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
                            <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_semester'];?>"
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="id_semester">id semester</label>
                        <input type="text" name="id_semester" id="id_semester" value="<?php echo empty(set_value('id_semester')) ? (empty($edit_data['id_semester']) ?"":$edit_data['id_semester']) : set_value('id_semester'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" id="tahun_ajaran" value="<?php echo empty(set_value('tahun_ajaran')) ? (empty($edit_data['tahun_ajaran']) ?"":$edit_data['tahun_ajaran']) : set_value('tahun_ajaran'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="semester">semester</label>
                        <input type="text" name="semester" id="semester" value="<?php echo empty(set_value('semester')) ? (empty($edit_data['semester']) ?"":$edit_data['semester']) : set_value('semester'); ?>" class="form-control">
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
