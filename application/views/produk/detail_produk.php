<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css3/color1.css" media="screen" id="color">

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Detail Produk</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="validasi_ulasan_gagal" data-flashdata="<?= $this->session->flashdata('ulasan_gagal') ?>"></div>
<div class="validasi_ulasan_berhasil" data-flashdata="<?= $this->session->flashdata('ulasan_berhasil') ?>"></div>

    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-10 col-xs-12 order-up">
                        <div class="product-right-slick">
                            <div><img src="<?php echo base_url('images/produk/'.$produk->foto_produk) ?>" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-right product-description-box">
                            <h2><?php echo $produk->nama_produk ?></h2>
                            <div class="border-product">
                                <h6 class="product-title">Detail Produk</h6>
                                <p><?php echo $produk->keterangan_produk ?></p>
                            </div>
                            <div class="single-product-tables border-product detail-section">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Jenis Produk:</td>
                                            <td><?php echo $produk->jenis_produk ?></td>
                                        </tr>
                                        <tr>
                                            <td>Berat Produk:</td>
                                            <td><?php echo $produk->berat_produk ?> Kg</td>
                                        </tr>
                                        <tr>
                                            <td>Stok Produk:</td>
                                            <td><?php echo $produk->jumlah_produk ?> Stok</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">share it</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                    <?php if ($this->session->username): ?>
                                      <form class="d-inline-block">
                                          <a href="<?php echo base_url('Produk/tambah_wishlist/'.$produk->id_produk) ?>" style="color:#212121;" class="wishlist-btn"><i class="fa fa-heart"></i><span
                                                  class="title-font">Add To WishList</span></a>
                                      </form>
                                    <?php else: ?>
                                      <form class="d-inline-block">
                                          <a href="<?php echo base_url('Auth/login') ?>" style="color:#212121;" class="wishlist-btn"><i class="fa fa-heart"></i><span
                                                  class="title-font">Add To WishList</span></a>
                                      </form>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-right product-form-box">
                            <h3>Rp <?php echo number_format($produk->harga_produk) ?></h3>
                            <div class="product-description border-product">
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button"
                                                class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span></div>
                                </div>
                            </div>
                            <div class="product-buttons"><a href="<?php echo base_url('Produk/tambah_keranjang?id_produk='.$produk->id_produk) ?>"  data-target="#addtocart"
                                    class="btn btn-solid">Tambah Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

    <section class="blog-details spad">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-12">
  					<div class="blog-details-inner">
  						<div class="leave-comment">
  							<h4>Leave A Comment</h4>
                <?= form_open('Produk/ulasan','class="comment-form"',array('method' =>'POST')) ?>
                <input type="text" name="id_produk" value="<?php echo $produk->id_produk ?>" hidden>
  								<div class="row">
  									<div class="col-lg-6">
  										<input value="<?php echo $this->session->nama ?>" placeholder="Name" disabled>
  									</div>
  									<div class="col-lg-6">
  										<input value="<?php echo $this->session->email ?>" placeholder="Email" disabled>
  									</div>
                    <div class="col-lg-6">
  										<input type="text" placeholder="Rating" name="rating">
  									</div>
  									<div class="col-lg-12">
  										<textarea placeholder="Review" name="isi_testimoni"></textarea>
  										<button type="submit" class="site-btn">Kirim Review</button>
  									</div>
  								</div>
  							<?= form_close() ?>
  						</div>

              <?php foreach ($ulasan as $u): ?>
              <div class="posted-by mt-5">
                  <div class="pb-pic">
                    <?php if ($u->foto_user == null): ?>
                      <img style="border-radius:1000%;" src="<?php echo base_url('images/orang.jpg')?>" alt="" width="100" height="100">
                    <?php else: ?>
                      <img style="border-radius:1000%;" src="<?php echo base_url('uploads/'.$u->foto_user)?>" alt="" width="100" height="100">
                    <?php endif; ?>
                  </div>
  							<div class="pb-text">
  									<h5><?php echo $u->nama ?></h5>
  								<p><?php echo $u->isi_testimoni ?></p>
  							</div>
  						</div>
            <?php endforeach; ?>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
    <!-- product-tab ends -->
