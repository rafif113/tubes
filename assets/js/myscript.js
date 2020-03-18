const flashData  = $('.flash-data').data('flashdata');
const flashData1 = $('.login-first').data('flashdata');


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
