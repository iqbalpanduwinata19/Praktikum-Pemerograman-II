//Ketika dok / halaman sudah siap maka script ini akan di jalankan
$(function () {
    //Buat event Ketika tombol Edit Diclik Tambah Data
    $('.tambahData').on('click', function () {
        $('#labelModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        //Agar ketika diklik tambah data Form menjadi Kosong
        $('#nimmhs').val('');
        $('#namamhs').val('');
        $('#tlahir').val('');
        $('#prodi').val('');
    });
    //Buat event Ketika tombol Edit Diclik Edit Data
    $('.tampilModalEdit').on('click', function () {
        $('#labelModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        //Merubah Atribut Action pada Form Input
        $('.modal-body form').attr('action', 'http://localhost/mvcphp/public/mahasiswa/ubah');

        //Variabel untuk memanggil data NIM
        const nim = $(this).data('nim');
        $.ajax({
            //Ambil data ke URL mana
            url: 'http://localhost/mvcphp/public/mahasiswa/EditMhs',
            data: { nim: nim },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nimmhs').val(data.nim);
                $('#namamhs').val(data.nama);
                $('#tlahir').val(data.tempatlahir);
                $('#prodi').val(data.prodi);
                $('#nim').val(data.nim);
            }
        });
    });
});

// Dosen
$(function () {
    //Buat event Ketika tombol Edit Diclik Tambah Data
    $('.tambahDataDosen').on('click', function () {
        $('#labelModal').html('Tambah Data Dosen');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        //Agar ketika diklik tambah data Form menjadi Kosong
        $('#nimdosen').val('');
        $('#namadosen').val('');
        $('#email').val('');
        $('#prodi').val('');
    });
    //Buat event Ketika tombol Edit Diclik Edit Data
    $('.tampilModalEditDosen').on('click', function () {
        $('#labelModal').html('Ubah Data Dosen');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        //Merubah Atribut Action pada Form Input
        $('.modal-body form').attr('action', 'http://localhost/mvcphp/public/dosen/ubah');

        //Variabel untuk memanggil data NIM
        const nidn = $(this).data('nidn');
        $.ajax({
            //Ambil data ke URL mana
            url: 'http://localhost/mvcphp/public/dosen/EditDosen',
            data: { nidn: nidn },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nidndosen').val(data.nidn);
                $('#namadosen').val(data.nama);
                $('#alamatdosen').val(data.alamat);
                $('#email').val(data.email);
                $('#prodi').val(data.prodi);
                $('#nim').val(data.nim);
            }
        });
    });
});