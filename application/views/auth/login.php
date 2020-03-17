<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Login</span>
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
                <div class="login-form">
                    <h2>Login</h2>
                    <?php if (!empty($this->session->flashdata('status') ) ): ?>
                      <div class="alert alert-danger">
                          <?php echo $this->session->flashdata('status') ?>
                      </div>
                    <?php endif; ?>
                    <?= form_open('auth/proses_login',array('method' =>'POST')) ?>
                        <div class="group-input">
                            <label for="username">Username </label>
                            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('username'); ?></small>
                        </div>
                        <div class="group-input">
                            <label for="pass">Password *</label>
                            <input type="password" name="password" id="pass">
                            <small class="form-text text-danger"><?= form_error('password');?></small>
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Save Password
                                    <input type="checkbox" id="save-pass">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">Forget your Password</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Sign In</button>
                    <?php echo form_close() ?>
                    <div class="switch-login">
                        <a href="<?php echo base_url('auth/register') ?>" class="or-login">Or Create An Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
