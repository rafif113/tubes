<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
<!-- UPDATE FOTO PROFILE -->
<?php if (!empty($this->session->flashdata('status') ) ): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('status') ?>
        </div>
      <?php endif; ?>

<section class="checkout-section spad">
  <div class="container checkout-form">
      <div class="row">
        <?= form_open_multipart('User/upload_foto',array('method' =>'POST')) ?>
        <div class="container.fluid col-xl-3 col-lg-4 container checkout-form">
            <div class="col-lg-6 mb-5">
              <?php if ($user->foto_user == NULL): ?>
                <img class="offset-lg-6" width="190px" height="130px" style="border-radius:1000%;"
                  src="<?php echo base_url('images/orang.jpg')?>">
              <?php endif; ?>
              <?php if ($user->foto_user): ?>
                <img class="offset-lg-6" width="370px" height="170px" style="border-radius:1000%;"
                  src="<?php echo base_url('uploads/'.$user->foto_user)?>">
              <?php endif; ?>
            </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" name="foto_user" class="custom-file-input">
                  <label class="custom-file-label" for="file-input">Pilih Foto...</label>
                </div>
              </div>
              <div class="pt-2">
                <button class="btn btn-success btn-sm btn-block"> Ubah Foto Profile</button>
              </div>

            <div class="pt-2">
              <a class="btn btn-danger btn-sm btn-block tombol-hapus-foto"
              href="<?php echo base_url('user/hapus_foto') ?>">Hapus Foto Profile</a>
            </div>


              <small class="form-text text-danger"><?= form_error('foto_user'); ?></small>
        </div>
        <?php echo form_close() ?>


<!-- UPDATE PROFILE -->
        <div class="col-lg-6 offset-lg-1">
          <h4>Profile Anda</h4>
          <?= form_open('user/profile_proses',array('method' =>'POST')) ?>
          <div class="row">
            <div class="col-lg-6">
              <label for="fir">Nama Depan<span>*</span></label>
              <input type="text" name="nam_dep" value="<?php echo $user->nama; ?>" id="fir">
              <small class="form-text text-danger"><?= form_error('nam_dep'); ?></small>
            </div>
            <div class="col-lg-6">
              <label for="last">Nama Belakang<span>*</span></label>
              <input type="text" name="nam_bel" id="last">
              <small class="form-text text-danger"><?= form_error('nam_bel'); ?></small>
            </div>
            <div class="col-lg-12">
              <label for="cun">Provinsi<span>*</span></label>
              <input type="text" name="provinsi" value="<?php echo $user->provinsi; ?>" id="cun">
              <small class="form-text text-danger"><?= form_error('provinsi'); ?></small>
            </div>
            <div class="col-lg-12">
              <label for="cun">Kota<span>*</span></label>
              <input type="text" name="kota" id="cun" value="<?php echo $user->kota; ?>">
              <small class="form-text text-danger"><?= form_error('kota'); ?></small>
            </div>
            <div class="col-lg-12">
              <label for="street">Alamat<span>*</span></label>
              <input type="text" name="alamat" id="street" class="street-first" value="<?php echo $user->alamat; ?>">
              <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>
            <div class="col-lg-12">
              <label for="zip">Kode Pos<span>*</span></label>
              <input type="text" name="kode_pos" id="zip" value="<?php echo $user->kode_pos; ?>">
              <small class="form-text text-danger"><?= form_error('kode_pos'); ?></small>
            </div>
            <div class="col-lg-12">
              <label for="town">Kecamatan<span>*</span></label>
              <input type="text" name="kecamatan" id="town" value="<?php echo $user->kecamatan; ?>">
              <small class="form-text text-danger"><?= form_error('kecamatan'); ?></small>
            </div>
            <div class="col-lg-6">
              <label for="email">Alamat Email<span>*</span></label>
              <input type="text" name="email" id="email" value="<?php echo $user->email; ?>">
              <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="col-lg-6">
              <label for="phone">No Telepon<span>*</span></label>
              <input type="text" name="no_telepon" id="phone" value="<?php echo $user->no_telepon; ?>">
              <small class="form-text text-danger"><?= form_error('no_telepon'); ?></small>
            </div>
              <button type="submit" name="ubah" class="site-btn register-btn offset-lg-4">UPDATE PROFILE</button>
          </div>
        </div>
      </div>
    <?php echo form_close() ?>
  </div>
</section>
