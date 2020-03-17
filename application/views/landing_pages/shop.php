<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('barang') ?>"></div>

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Kategori</h4>
                    <?php foreach ($kategori as $k ) : ?>
                    <ul class="filter-catagories">
                        <li><a href="#"><?php echo $k->jenis_produk ?></a></li>
                    </ul>
                  <?php endforeach ?>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Top Produk</h4>
                    <?php foreach ($produk as $k ) : ?>
                    <ul class="filter-catagories">
                        <li><a href="#"><?php echo $k->nama_produk ?></a></li>
                    </ul>
                  <?php endforeach ?>
                </div>


            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="select-option">
                                <select class="sorting">
                                    <option value="">Default Sorting</option>
                                </select>
                                <select class="p-show">
                                    <option value="">Show:</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <p>Show <?php echo $jumlah ?> Product</p>
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row">
                      <?php foreach ($produk as $p ) : ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="<?php echo base_url('images/produk/'.$p->foto_produk) ?>" alt="">
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="<?php echo base_url('Barang/tambah_keranjang?id_produk='.$p->id_produk) ?>">
                                          <i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="<?php echo base_url('LandingPage/detail_produk/'.$p->id_produk) ?>">
                                          + Lihat Barang</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name"><?php echo $p->jenis_produk ?></div>
                                    <a href="#">
                                        <h5><?php echo $p->nama_produk ?></h5>
                                    </a>
                                    <div class="product-price">
                                        Rp <?php echo number_format($p->harga_produk) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
