<?php $this->load->view('layouts/head'); ?>
<body>
      <!-- Page Preloder -->
      <div id="preloder">
          <div class="loader"></div>
      </div>

      <?php
        $id = $this->session->id_user;
        $this->db->like('id_user' ,$id);
        $this->db->from('tb_wishlist');
        $data['total_rows'] = $this->db->count_all_results();
      ?>

      <!-- Header Section Begin -->
      <header class="header-section">
          <div class="header-top">
              <div class="container">
                  <div class="ht-left">

                      <?php if ($this->session->username): ?>
                          <a class="phone-service" href="<?php echo base_url('profile') ?>"><i class=" fa fa-user"></i>
                          Profile</a>
                      <?php endif; ?>

                  </div>
                  <?php if (empty($this->session->username)): ?>
                    <div class="ht-right">
                        <a href="<?php echo base_url('auth/login') ?>" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    </div>
                  <?php else: ?>
                    <div class="ht-right">
                        <a href="<?php echo base_url('auth/logout') ?>" class="login-panel tombol-logout"><i class="fa fa-user"></i>Logout</a>
                    </div>
                  <?php endif; ?>
              </div>
          </div>
          <div class="container">
              <div class="inner-header">
                  <div class="row">
                      <div class="col-lg-2 col-md-2">
                          <div class="logo">
                              <a href="<?php echo base_url() ?>">
                                  <img src="<?php echo base_url('images/') ?>logo.png" alt="">
                              </a>
                          </div>
                      </div>
                      <div class="col-lg-7 col-md-7">
                        <?= form_open('produk',array('method' =>'POST')) ?>
                          <div class="advanced-search">
                              <a type="button" class="category-btn">All Categories</a>
                              <div class="input-group">
                                  <input type="text" name="keyword" placeholder="Cari Produk UMKM...." autocomplete="off" autofocus>
                                  <button type="button"><i class="ti-search"></i></button>
                              </div>
                              <?= form_close() ?>
                          </div>
                      </div>
                      <?php if ($this->session->username): ?>
                      <div class="col-lg-3 text-right col-md-3">
                          <ul class="nav-right">
                              <li class="heart-icon">
                                  <a href="<?php echo base_url('produk/wishlist') ?>">
                                      <i class="icon_heart_alt"></i>
                                      <span><?php echo $data['total_rows'] ?></span>
                                  </a>
                              </li>
                              <li class="cart-icon">
                                  <a href="<?php echo base_url('Produk/shopping_cart') ?>">
                                      <i class="icon_bag_alt"></i>
                                      <span><?= $this->cart->total_items() ?></span>
                                  </a>
                                  <div class="cart-hover">
                                      <div class="select-items">
                                          <table>
                                              <tbody>
                                                <?php foreach ($this->cart->contents() as $index => $kr): ?>
                                                  <?php $barang = $this->Produk_model->getProdukRow($kr['id'])->row();?>
                                                  <tr>
                                                    <td class="cart-pic"><img width='90px' src="<?php echo base_url('images/produk/'.$barang->foto_produk) ?>" alt=""></td>

                                                      <td class="si-text">
                                                          <div class="product-selected">
                                                              <p>Rp <?php echo number_format($barang->harga_produk) ?> x <?php echo $kr['qty'] ?></p>
                                                              <h6><?php echo $barang->nama_produk ?></h6>
                                                          </div>
                                                      </td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>
                                          </table>
                                      </div>
                                      <div class="select-total">
                                          <span>total:</span>
                                          <h5>Rp <?=number_format($this->cart->total())?></h5>
                                      </div>
                                      <div class="select-button">
                                          <a href="<?php echo base_url('transaksi/check_out') ?>" class="primary-btn checkout-btn">CHECK OUT</a>
                                      </div>
                                  </div>
                              </li>
                              <li class="cart-price">Rp <?=number_format($this->cart->total())?></li>
                          </ul>
                      </div>
                      <?php endif; ?>
                      <?php if (!$this->session->username): ?>
                      <div class="col-lg-3 text-right col-md-3">
                          <ul class="nav-right">
                              <li class="heart-icon">
                                  <a href="#">
                                      <i class="icon_heart_alt"></i>
                                      <span>-</span>
                                  </a>
                              </li>
                              <li class="cart-icon">
                                 <a href="#">
                                      <i class="icon_bag_alt"></i>
                                      <span>-</span>
                                  </a>
                              </li>
                              <li class="cart-price">Rp -</li>
                          </ul>
                      </div>
                      <?php endif; ?>
                  </div>
              </div>
          </div>

          <div class="nav-item">
              <div class="container offset-lg-4">
                  <nav class="nav-menu mobile-menu">
                      <ul>
                          <li><a href="<?php echo base_url() ?>">Beranda</a></li>
                          <li><a href="<?php echo base_url('produk') ?>">Produk</a></li>
                          <li><a href="#">Halaman Lainnya</a>
                              <ul class="dropdown">
                                  <li><a href="<?php echo base_url('produk/shopping_cart') ?>">Keranjang</a></li>
                                  <li><a href="<?php echo base_url('transaksi/check_out') ?>">Checkout</a></li>
                                  <li><a href="<?php echo base_url('transaksi/tunggu_pembayaran') ?>">Daftar Transaksi</a></li>
                              </ul>
                          </li>

                      </ul>
                  </nav>
                  <div id="mobile-menu-wrap"></div>
              </div>
          </div>
      </header>
      <!-- Header End -->
