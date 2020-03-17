<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $judul?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css" type="text/css">
</head>

<body>
      <!-- Page Preloder -->
      <div id="preloder">
          <div class="loader"></div>
      </div>

      <!-- Header Section Begin -->
      <header class="header-section">
          <div class="header-top">
              <div class="container">
                  <div class="ht-left">
                      
                      <?php if ($this->session->username): ?>
                          <a class="phone-service" href="<?php echo base_url('User/profile') ?>"><i class=" fa fa-user"></i>
                          Profile</a>
                      <?php endif; ?>

                  </div>

                  <?php if (!$this->session->username): ?>
                    <div class="ht-right">
                        <a href="<?php echo base_url('auth/login') ?>" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    </div>
                  <?php endif; ?>
                  <?php if ($this->session->username): ?>
                    <div class="ht-right">
                        <a href="<?php echo base_url('auth/logout') ?>" class="login-panel"><i class="fa fa-user"></i>Logout</a>
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
                          <div class="advanced-search">
                              <button type="button" class="category-btn">All Categories</button>
                              <div class="input-group">
                                  <input type="text" name="keyword" placeholder="Cari Produk UMKM....">
                                  <button type="button"><i class="ti-search"></i></button>
                              </div>
                          </div>
                      </div>
                      <?php if ($this->session->username): ?>
                      <div class="col-lg-3 text-right col-md-3">
                          <ul class="nav-right">
                              <li class="heart-icon">
                                  <a href="#">
                                      <i class="icon_heart_alt"></i>
                                      <span>0</span>
                                  </a>
                              </li>
                              <li class="cart-icon">
                                  <a href="<?php echo base_url('LandingPage/shopping_cart') ?>">
                                      <i class="icon_bag_alt"></i>
                                      <span><?= $this->cart->total_items() ?></span>
                                  </a>
                                  <div class="cart-hover">
                                      <div class="select-items">
                                          <table>
                                              <tbody>
                                                <?php foreach ($this->cart->contents() as $index => $kr): ?>
                                                  <?php $barang = $this->Produk_models->getProdukRow($kr['id'])->row();?>
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
                                          <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                          <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
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
              <div class="container offset-lg-3">
                  <nav class="nav-menu mobile-menu">
                      <ul>
                          <li><a href="<?php echo base_url() ?>">Beranda</a></li>
                          <li><a href="<?php echo base_url('LandingPage/shop') ?>">Produk</a></li>
                          <li><a href="<?php echo base_url('LandingPage/shopping_cart') ?>">Keranjang</a></li>
                          <li><a href="<?php echo base_url('LandingPage/check_out') ?>">Checkout</a></li>
                          <li><a href="<?php echo base_url('LandingPage/faq') ?>">Faq</a></li>
                      </ul>
                  </nav>
                  <div id="mobile-menu-wrap"></div>
              </div>
          </div>
      </header>
      <!-- Header End -->
