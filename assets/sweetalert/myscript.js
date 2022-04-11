const gagal = $('.flash-data').data('gagal');
const berhasil = $('.flash-data').data('loginberhasil');
const a= document.getElementById('tes').value;

if (gagal){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: gagal
      })
}

if (berhasil){
    Swal.fire({
        icon: 'success',
        title: berhasil,
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
      })
}

if (a){
    Swal.fire({
        icon: 'success',
        title: a,
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
      })
}
