<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Register</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Register</h2>
                    <?= form_open('auth/register_proses',array('method' =>'POST')) ?>
                        <div class="group-input">
                            <label for="username">Username </label>
                            <input type="text" name="username" id="username" value="<?php echo set_value('username')?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('username'); ?></small>
                        </div>
                        <div class="group-input">
                            <label for="pass">Password *</label>
                            <input type="password" name="password1" id="pass">
                            <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Confirm Password *</label>
                            <input type="password" name="password2" id="con-pass">
                            <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                        </div>
                        <button type="submit" class="site-btn register-btn">REGISTER</button>
                    <?php echo form_close() ?>
                    <div class="switch-login">
                        <a href="<?php echo base_url('auth/login') ?>" class="or-login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
