
<div class="flash-login" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">

            <div class="single-hero-items set-bg" data-setbg="<?php echo base_url('images/sayuran.jpg')?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Sayur</span>
                            <h1 class="text-white">Sayur Mayur</h1>
                            <p class="text-white">Sayuran merupakan sebutan umum bagi bahan pangan asal tumbuhan yang biasanya mengandung kadar air tinggi dan dikonsumsi dalam keadaan segar atau setelah diolah secara minimal. Sebutan untuk beraneka jenis sayuran disebut sebagai sayur-sayuran atau sayur-m</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-hero-items set-bg" data-setbg="<?php echo base_url('images/kerajinan.jpg')?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Kerajinan</span>
                            <h1 class="text-white">Kerajinan Tangan</h1>
                            <p class="text-white">Kerajinan Tangan adalah menciptakan suatu produk atau barang yang dilakukan oleh tangan dan memiliki fungsi pakai atau keindahan sehingga memiliki nilai jual. Kerajinan tangan yang memiliki kualitas tinggi tentu harganya akan mahal, jika kalian memiliki k</p>
                        </div>
                    </div>
                </div>
            </div>

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
                    <div class="product-large set-bg" data-setbg="<?php echo base_url('images/sayuran.jpg') ?>">
                        <h2>Sayur Mayur</h2>
                        <a href="#">Sayuran</a>
                    </div>
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
                                      <li class="w-icon active"><a href="<?php echo base_url('Produk/tambah_keranjang?id_produk='.$s->id_produk) ?>">
                                        <i class="icon_bag_alt"></i></a></li>
                                      <li class="quick-view"><a href="<?php echo base_url('Produk/detail_produk/'.$s->id_produk) ?>">
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
    <section class="deal-of-week set-bg spad">
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
                                  <li class="w-icon active"><a href="<?php echo base_url('Produk/tambah_keranjang?id_produk='.$s->id_produk) ?>">
                                    <i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="<?php echo base_url('Produk/detail_produk/'.$s->id_produk) ?>">+ Lihat Barang</a></li>
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

    <!-- Latest Blog Section End -->
