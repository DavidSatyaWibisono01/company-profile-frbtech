<div class="content-wrapper">
<div class="container py-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Ganti password</a></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- <form action="<?= base_url('ganti_pass/change') ?>" method="post"> -->
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmGantiPass', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group pb-2">
                        <label for="currentPassword">Password lama</label>
                        <input type="password" name="currentPassword" class="form-control" id="currentPassword" placeholder="Password sekarang" required>
                        <?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group pb-2">
                        <label for="newPassword1">Password baru</label>
                        <input type="password" name="newPassword1" class="form-control" id="newPassword1" placeholder="Password baru" required>
                        <?= form_error('newPassword1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group pb-2">
                        <label for="newPassword2">Konfirmasi password</label>
                        <input type="password" name="newPassword2" class="form-control" id="newPassword2" placeholder="Konfirmasi password" required>
                        <?= form_error('newPassword2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>