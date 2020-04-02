
<div class="flash-login" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
          <?php foreach ($artikel as $data ): ?>
            <div class="single-hero-items set-bg" data-setbg="<?php echo base_url('images/').$data->gambar ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span><?php echo $data->sub_judul ?></span>
                            <h1 class="text-white"><?php echo $data->judul ?></h1>
                            <p class="text-white"><?php echo $data->keterangan ?></p>
                        </div>
                    </div>
                </div>
            </div>
          <?php endforeach; ?>
        </div>

    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
              <div class="col-lg-4">
                  <a href="#">
                  <div class="single-banner">
                  <img src="<?php echo base_url('images/') ?>komunitas1.jpg" alt="">
                      <div class="inner-text">
                          <h4>Komunitas</h4>
                      </div>
                  </div>
                  </a>
              </div>
              <div class="col-lg-4">
                  <div class="single-banner">
                      <img src="<?php echo base_url('images/') ?>topProduk.jpg" alt="">
                      <div class="inner-text">
                          <h4>Top Produk</h4>
                      </div>
                  </div>
              </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="<?php echo base_url('images/') ?>umkm.jpg" alt="">
                        <div class="inner-text">
                            <h4>UMKM</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- sayur Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                  <?php foreach ($kategori as $k): ?>
                    <div class="product-large set-bg" data-setbg="<?php echo base_url('images/'.$k->gambar) ?>">
                        <h2><?php echo $k->judul ?></h2>
                        <a href="#"><?php echo $k->sub_judul ?></a>
                    </div>
                  <?php endforeach; ?>
                </div>
                  <div class="col-lg-8 offset-lg-1">
                      <div class="filter-control">
                          <ul>
                              <li class="active">Sayuran</li>
                          </ul>
                      </div>
                      <div class="product-slider owl-carousel">
                        <?php foreach ($sayuran as $s): ?>
                          <div class="product-item">
                              <div class="pi-pic">
                                  <img src="<?php echo base_url('images/produk/').$s->foto_produk ?>" alt="">
                                  <ul>
                                      <li class="w-icon active"><a href="<?php echo base_url('Barang/tambah_keranjang?id_produk='.$s->id_produk) ?>">
                                        <i class="icon_bag_alt"></i></a></li>
                                      <li class="quick-view"><a href="<?php echo base_url('LandingPage/detail_produk/'.$s->id_produk) ?>">
                                        + Lihat Barang</a></li>
                                  </ul>
                              </div>
                              <div class="pi-text">
                                  <div class="catagory-name"><?php echo $s->jenis_produk ?></div>
                                  <a href="#">
                                      <h5><?php echo $s->nama_produk ?></h5>
                                  </a>
                                  <div class="product-price">
                                      Rp <?php echo number_format($s->harga_produk) ?>
                                  </div>
                              </div>
                          </div>
                          <?php endforeach; ?>
                      </div>
                  </div>

            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="<?php echo base_url('images/') ?>gabung.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                        consectetur adipisicing elit </p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mt-5">
                    <div class="filter-control">
                        <ul>
                              <li class="active">Buah Buahan</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                      <?php foreach ($buah as $s): ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo base_url('images/produk/').$s->foto_produk ?>" alt="">
                                <ul>
                                  <li class="w-icon active"><a href="<?php echo base_url('Barang/tambah_keranjang?id_produk='.$s->id_produk) ?>">
                                    <i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="<?php echo base_url('LandingPage/detail_produk/'.$s->id_produk) ?>">+ Lihat Barang</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $s->jenis_produk ?></div>
                                <a href="#">
                                    <h5><?php echo $s->nama_produk ?></h5>
                                </a>
                                <div class="product-price">
                                    Rp <?php echo number_format($s->harga_produk) ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="<?php echo base_url('images/') ?>buah.jpg">
                        <h2>Buah buahan</h2>
                        <a href="#">Buah</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?php echo base_url('assets/') ?>img/latest-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>The Best Street Style From London Fashion Week</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?php echo base_url('assets/') ?>img/latest-2.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?php echo base_url('assets/') ?>img/latest-3.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                  </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?php echo base_url('assets/') ?>img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?php echo base_url('assets/') ?>img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?php echo base_url('assets/') ?>img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
