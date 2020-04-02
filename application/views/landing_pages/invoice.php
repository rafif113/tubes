<!DOCTYPE html>
<html lang="en">



<head>
  <!-- Icons -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css2/fontawesome.css">
  <!-- Bootstrap css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css2/bootstrap.css">
  <!-- Theme css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css2/color1.css" media="screen" id="color">
</head>

<body>


  <!-- header start -->
  <!-- thank-you section start -->
  <section class="section-b-space light-layout">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if ($transaksi['status_transaksi'] == 'Belum dibayar'){ ?>
            <div class="success-text">
              <h2>Detail Transaksi</h2>
              <p><?php echo $transaksi['status_transaksi'] ?></p>
              <p>Kode Bayar: <?php echo $transaksi['kode_bayar'] ?></p>
            </div>
          <?php }else { ?>
            <div class="success-text"><i class="fa fa-success fa-check-circle" aria-hidden="true"></i>
              <h2>Detail Transaksi</h2>
              <p><?php echo $transaksi['status_transaksi'] ?></p>
              <p>Kode Bayar: <?php echo $transaksi['kode_bayar'] ?></p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Section ends -->


  <!-- order-detail section start -->
  <section class="section-b-space">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="product-order">
            <h3>your order details</h3>

          <?php foreach ($transaksi2 as $t): ?>
            <div class="row product-order-detail">
              <div class="col-3"><img src="<?php echo base_url('images/produk/'.$t->foto_produk) ?>" alt="" class="img-fluid  lazyload"></div>
              <div class="col-3 order_detail">
                <div>
                  <h4>nama Produk</h4>
                  <h5><?php echo $t->nama_produk ?></h5>
                </div>
              </div>
              <div class="col-3 order_detail">
                <div>
                  <h4>quantity</h4>
                  <h5><?php echo $t->jumlah_produk ?></h5>
                </div>
              </div>
              <div class="col-3 order_detail">
                <div>
                  <h4>harga</h4>
                  <h5>Rp <?php echo number_format($t->sub_total) ?></h5>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

            <div class="total-sec">
              <ul>
                <li>subTotal <span>Rp <?php echo number_format($transaksi1['sub_total'])?></span></li>
                <li>Pengiriman <span>Rp <?php echo number_format($transaksi['harga_pengiriman']) ?></span></li>
              </ul>
            </div>
            <div class="final-total">
              <h3>Total <span>Rp <?php echo number_format($transaksi1['sub_total'] + $transaksi['harga_pengiriman'])?></span></h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row order-success-sec">
            <div class="col-sm-6">
              <h4>Ringkasan</h4>
              <ul class="order-detail">
                <li>Kode Bayar: <?php echo $transaksi['kode_bayar'] ?></li>
                <li>Order Total: Rp <?php echo number_format($transaksi1['sub_total'] + $transaksi['harga_pengiriman'])?></li>
              </ul>
            </div>
            <div class="col-sm-6">
              <h4>Alamat Pengiriman</h4>
              <ul class="order-detail">
                <li><?php echo $transaksi['alamat'] ?></li>
                <li><?php echo $transaksi['kecamatan'] ?> , <?php echo $transaksi['kota'] ?></li>
                <li><?php echo $transaksi['provinsi'] ?></li>
                <li>No Telpon. <?php echo $transaksi['no_telepon'] ?></li>
              </ul>
            </div>
            <div class="col-sm-12 payment-mode">
              <h4>Metode Pembayaran</h4>
              <p>Transfer melalui rekening yang tersedia</p>
            </div>
            <div class="col-md-12">
              <?php if ($transaksi['status_transaksi'] == 'Belum dibayar'){ ?>
                <div class="delivery-sec">
                  <h3>Batas Pembayaran</h3>
                  <h2><?php echo date('d F Y H:i:s', strtotime($t->tanggal_deadline )); ?></h2>
                </div>
              <?php }else { ?>
                <div class="delivery-sec">
                  <h3>Cetak Invoice</h3>
                  <a href="<?php echo base_url('LandingPage/cetak/'.$transaksi['kode_bayar']) ?>" class="btn rounded" style="background-color:#e7ab3c; color:#fff;" target="_BLANK" >Cetak Invoice</a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section ends -->
  <!-- tap to top start -->
  <div class="tap-top">
    <div><i class="fa fa-angle-double-up"></i></div>
  </div>
  <!-- tap to top end -->
</body>



</html>
