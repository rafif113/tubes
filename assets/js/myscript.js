const flashData  = $('.flash-data').data('flashdata');
const flashData1 = $('.login-first').data('flashdata');
const flashData2 = $('.flash-login').data('flashdata');
const flashData3 = $('.flash-payment').data('flashdata');


if (flashData) {
  Swal.fire({
    title: 'Data Profile ',
    text: 'Berhasil ' + flashData,
    icon: 'success'
  });
}

if (flashData1) {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Tambah barang terlebih dahulu'
  });
}

if (flashData2) {
  Swal.fire({
    title: 'Login Berhasil ',
    text: 'Selamat datang ' + flashData2,
    icon: 'success'
  });
}

if (flashData3) {
  Swal.fire({
  icon: 'warning',
  title: 'Oops...',
  text: flashData3,
  footer: '<a href="http://localhost/tubes/User/profile">Halaman Profile</a>'
})
}

$('.tombol-hapus').on('click', function (e){

  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
  title: 'Apakah anda yakin ?',
  text: "Data akan dihapus",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus Data!'
}).then((result) => {
  if (result.value) {
    document.location.href = href;
  }
});

});


$('.tombol-hapus-foto').on('click', function (e){
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
  title: 'Apakah anda yakin ?',
  text: "Foto akan dihapus",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus Foto!'
}).then((result) => {
  if (result.value) {
    document.location.href = href;
  }
});
});

$('.tombol-logout').on('click', function (e){
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
  title: 'Apakah anda yakin ?',
  text: "Logout sekarang",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Logout sekarang!'
}).then((result) => {
  if (result.value) {
    document.location.href = href;
  }
});
});


$('.tombol-wishlist').on('click', function (e){
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Produk berhasil ditambahkan'
})
});
