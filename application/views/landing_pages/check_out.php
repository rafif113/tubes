<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text product-more">
          <a href="./index.html"><i class="fa fa-home"></i> Home</a>
          <a href="./shop.html">Shop</a>
          <span>Check Out</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
  <div class="container">
    <form action="#" class="checkout-form">
      <div class="row">
        <div class="col-lg-6">
          <h4>Biiling Details</h4>
          <div class="row">
            <div class="col-lg-12">
              <label for="cun-name">Nama Lengkap</label>
              <input type="text" readonly="readonly" value="<?php echo $user->nama ?>" id="cun-name">
            </div>
            <div class="col-lg-12">
              <label for="cun">Provinsi<span>*</span></label>
              <input type="text" readonly="readonly" name="provinsi" value="<?php echo $user->provinsi; ?>" id="cun">
              <small class="form-text text-danger"><?= form_error('provinsi'); ?></small>
            </div>
            <div class="col-lg-12">
              <label for="cun">Kota<span>*</span></label>
              <input type="text" readonly="readonly" name="kota" value="<?php echo $user->kota; ?>" id="cun">
              <small class="form-text text-danger"><?= form_error('kota'); ?></small>
            </div>
            <div class="col-lg-12">
              <label for="street">Alamat<span>*</span></label>
              <input type="text" readonly="readonly" name="alamat" id="street" value="<?php echo $user->alamat; ?>" class="street-first">
              <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>
            <div class="col-lg-12">
              <label for="zip">Kode Pos<span>*</span></label>
              <input type="text" readonly="readonly" name="kode_pos" value="<?php echo $user->kode_pos; ?>" id="zip">
              <small class="form-text text-danger"><?= form_error('kode_pos'); ?></small>
            </div>
            <div class="col-lg-12">
              <label for="town">Kecamatan<span>*</span></label>
              <input type="text" readonly="readonly" name="kecamatan" value="<?php echo $user->kecamatan; ?>" id="town">
              <small class="form-text text-danger"><?= form_error('kecamatan'); ?></small>
            </div>
            <div class="col-lg-6">
              <label for="email">Alamat Email<span>*</span></label>
              <input type="text" readonly="readonly" name="email" value="<?php echo $user->email; ?>" id="email">
              <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="col-lg-6">
              <label for="phone">No Telepon<span>*</span></label>
              <input type="text" readonly="readonly" name="no_telepon" value="<?php echo $user->no_telepon; ?>" id="phone">
              <small class="form-text text-danger"><?= form_error('no_telepon'); ?></small>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="place-order">
            <h4>Pesanan Anda</h4>
            <div class="order-total">
              <ul class="order-table">
                <li>Produk <span>Total</span></li>
                <?php foreach ($cart as $index => $kr): ?>
                  <?php $barang = $this->Produk_models->getProdukRow($kr['id'])->row();?>
                <li class="fw-normal"><?php echo $barang->nama_produk ?> x <?php echo $kr['qty'] ?>
                  <span>Rp <?php echo number_format($kr['subtotal']) ?></span></li>
                <?php endforeach ?>
                <li class="fw-normal"><?php echo $pengiriman->nama_pengiriman ?>
                  <span>Rp <?php echo number_format($pengiriman->harga_pengiriman) ?></span></li>
                  <?php $total = $this->cart->total() + $pengiriman->harga_pengiriman ?>
                <li class="total-price">Total <span>Rp <?=number_format($total)?></span></li>
              </ul>
              <div class="payment-check">
                <div class="pc-item">
                  <label for="pc-check">
                    Cheque Payment
                    <input type="checkbox" id="pc-check">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="pc-item">
                  <label for="pc-paypal">
                    <?php echo $pengiriman->nama_pengiriman ?>
                    <input type="checkbox" id="pc-paypal" checked disabled>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="order-btn">
                <button type="submit" class="site-btn place-btn">Place Order</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Shopping Cart Section End -->
