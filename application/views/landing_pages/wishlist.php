<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?php echo base_url('LandingPage/wishlist') ?>">Wishlist</a>
                    <span>Shopping Wishlist</span>
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
                        <h3 class="offset-lg-5">Tidak ada barang</h3>
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
                            <?php $barang = $this->Produk_models->getProdukRow($kr['id'])->row();?>
                              <?= form_open(base_url('Barang/update_cart/'.$kr['rowid'])); ?>
                            <tr>
                                <td class="cart-pic"><img src="<?php echo base_url('images/produk/'.$barang->foto_produk) ?>" alt=""></td>
                                <td class="cart-title pl-5">
                                    <h5><?php echo $barang->nama_produk ?></h5>
                                </td>
                                <td class="p-price">Rp <?php echo number_format($barang->harga_produk) ?></td>
                                <td class="qua-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="qty" value="<?php echo $kr['qty'] ?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price">Rp <?php echo number_format($kr['subtotal']) ?></td>
                                <td class="cart-buttons"><button class="primary-btn up-cart">Update</button></td>
                                <td class="close-td"><a href="<?php echo base_url('Barang/hapus_cart/'.$kr['rowid']) ?>">
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
                            <a href="<?php echo base_url('LandingPage/shop') ?>" class="primary-btn continue-shop">Tambah barang</a>
                            <a class="primary-btn up-cart tombol-hapus" href="<?php echo base_url('Barang/hapus_cart') ?>"> Hapus Semua</a>
                        </div>
                    </div>
                  <?php endif; ?>
                    <div class="col-lg-4 offset-lg-4">
                      <?php if (empty($cart)): ?>
                        <div class="proceed-checkout">
                            <a href="<?php echo base_url('LandingPage/shop') ?>" class="proceed-btn">Tambah Barang </a>
                        </div>
                      <?php endif; ?>
                      <?php if ($cart): ?>
                        <div class="proceed-checkout">
                            <ul>
                                <li class="cart-total">Total <span>Rp <?=number_format($this->cart->total())?></span></li>
                            </ul>
                            <a href="<?php echo base_url('LandingPage/check_out') ?>" class="proceed-btn">PROSES CHECK OUT</a>
                        </div>
                      <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
