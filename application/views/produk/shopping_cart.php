<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?php echo base_url('Produk') ?>">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                      <?php if (empty($cart)): ?>
                        <h3 class="offset-lg-5">Tidak ada produk</h3>
                        <br>
                      <?php endif; ?>
                      <?php if ($cart): ?>
                        <thead>
                          <tr>
                              <th>Foto Produk</th>
                              <th class="p-name pl-4">Nama Produk</th>
                              <th>Harga</th>
                              <th>Jumlah</th>
                              <th>Total</th>
                              <th>Update</th>
                              <th><i class="ti-close"></i></th>
                          </tr>
                      </thead>
                          <?php endif; ?>
                        <tbody id="detail_cart">
                          <?php foreach ($cart as $index => $kr): ?>
                            <?php $produk = $this->Produk_model->getProdukRow($kr['id'])->row();?>
                              <?= form_open(base_url('Produk/update_cart/'.$kr['rowid'])); ?>
                            <tr>
                                <td class="cart-pic"><img src="<?php echo base_url('images/produk/'.$produk->foto_produk) ?>" alt=""></td>
                                <td class="cart-title pl-5">
                                    <h5><?php echo $produk->nama_produk ?></h5>
                                </td>
                                <td class="p-price">Rp <?php echo number_format($produk->harga_produk) ?></td>
                                <td class="qua-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="qty" value="<?php echo $kr['qty'] ?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price">Rp <?php echo number_format($kr['subtotal']) ?></td>
                                <td class="cart-buttons"><button class="primary-btn up-cart">Update</button></td>
                                <td class="close-td"><a style="color: #343a40;" href="<?php echo base_url('Produk/hapus_cart/'.$kr['rowid']) ?>">
                                  <i class="ti-close"></i></a></td>
                            </tr>
                            <?php echo form_close() ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                  <?php if ($cart): ?>
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="<?php echo base_url('Produk') ?>" class="primary-btn continue-shop">Tambah produk</a>
                            <a class="primary-btn up-cart tombol-hapus" href="<?php echo base_url('Produk/hapus_cart') ?>"> Hapus Semua</a>
                        </div>
                    </div>
                  <?php endif; ?>
                    <div class="col-lg-4 offset-lg-4">
                      <?php if ($cart): ?>
                        <div class="proceed-checkout">
                            <ul>
                                <li class="cart-total">Total <span>Rp <?=number_format($this->cart->total())?></span></li>
                            </ul>
                            <a href="<?php echo base_url('Transaksi/check_out') ?>" class="proceed-btn">PROSES CHECK OUT</a>
                        </div>
                      <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
