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

<div class="product-shop spad">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo base_url('images/produk/'.$produk->foto_produk) ?>" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <!-- <?= form_open('belanja/tambah',array('method' =>'POST')) ?> -->
        <h2 class="text-black"><?php echo $produk->nama_produk ?></h2>
        <p class="mb-4"><?php echo $produk->keterangan_produk ?></p>
        <p><strong style="color:#e7ab3c;" class="h4">Rp. <?php echo $produk->harga_produk ?></strong></p>
        <div class="mb-5">
          <div class="input-group mb-3" style="max-width: 120px;">
          <div class="input-group-prepend">
            <button style="background-color:#e7ab3c;" class="btn btn-outline js-btn-minus" type="button">&minus;</button>
          </div>
          <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
          <div class="input-group-append">
            <button style="background-color:#e7ab3c;" class="btn btn-outline js-btn-plus" type="button">&plus;</button>
          </div>
        </div>

        </div>
        <?php if (!$this->session->id_user){ ?>
          <p><a href="<?php echo base_url('landingpage/validasi') ?>" style="background-color:#e7ab3c;" class="buy-now btn btn-sm ">Add To Cart</a></p>
        <?php } else{ ?>
          <p><a href="<?php echo base_url('Barang/tambah_keranjang?id_produk='.$produk->id_produk) ?>" style="background-color:#e7ab3c;" class="buy-now btn btn-sm ">Add To Cart</a></p>
        <?php } ?>
        <!-- <?php echo form_close() ?> -->
      </div>

    </div>
  </div>
</div>
