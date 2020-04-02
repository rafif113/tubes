<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
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
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <!-- <?php var_dump($wishlist) ?> -->
                          <?php foreach ($wishlist as $w): ?>
                            <tr>
                                <td class="cart-pic first-row"><img src="<?php echo base_url('images/produk/'.$w->foto_produk) ?>" alt=""></td>
                                <td>
                                    <h5><?php echo $w->nama_produk ?></h5>
                                </td>
                                <td class="p-price first-row">Rp <?php echo number_format($w->harga_produk) ?></td>
                                <td class="close-td first-row">
                                  <a style="color: #343a40;" href="<?php echo base_url('LandingPage/hapus_wishlist/'.$w->id_wishlist) ?>"><i class="ti-close mr-3"></i></a>
                                  <a style="color: #343a40;" href="<?php echo base_url('Barang/tambah_keranjang?id_produk='.$w->id_produk) ?>"><i class="ti-shopping-cart"></i></a>
                                </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="#" class="primary-btn continue-shop">Lanjut Belanja</a>
                            <a href="#" class="primary-btn up-cart">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
