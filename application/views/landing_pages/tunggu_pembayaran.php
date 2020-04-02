<?php foreach ($transaksi as $t): ?>
<div class="container">
  <div class="card text-center mt-5">
    <div class="card-header">
      Status
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $t->status_transaksi ?></h5>
      <p class="card-text">Kode Bayar : <?php echo $t->kode_bayar ?></p>
      <a href="<?php echo base_url('LandingPage/invoice/'.$t->kode_bayar) ?>" class="btn " style="background-color:#e7ab3c; color:#ffff;">Lihat Detail</a>
    </div>
    <div class="card-footer text-muted">
      Batas Pembayaran  <?php echo date('d F Y H:i:s', strtotime($t->tanggal_deadline )); ?>
      <br>
    </div>
  </div>
</div>
<?php endforeach; ?>
