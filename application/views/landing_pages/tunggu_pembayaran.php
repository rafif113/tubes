


<?php foreach ($transaksi as $t): ?>
  <div class="card text-center">
    <div class="card-header">
      Status
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $t->status_transaksi ?></h5>
      <p class="card-text">Kode Bayar : <?php echo $t->kode_bayar ?></p>
      <a href="<?php echo base_url('LandingPage/invoice/'.$t->kode_bayar) ?>" class="btn btn-primary">Lihat Detail</a>
    </div>
    <div class="card-footer text-muted">
      Batas Pembayaran <?php echo $t->tanggal_deadline ?>
    </div>
  </div>
<?php endforeach; ?>
