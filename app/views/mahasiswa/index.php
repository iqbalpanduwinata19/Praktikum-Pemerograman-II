<div class="container mt-4">
    <div class="row">
      <div class="col-lg-5">
        <?php Flashnotif::notif(); ?>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <!-- Button Tambah-->
            <button type="button" class="btn btn-primary tambahData" data-bs-toggle="modal" data-bs-target="#forminputmhs">
            Tambah Data Mahasiswa
            </button>
            </div>
            <div class="row mb-2">
      <div class="col-lg-5">
        <!-- Button Cari -->
        <form action="<?=BASEURL;?>/mahasiswa/cari" method="post">
        <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Cari Nama Mahasiswa" name="pencarian" id="cari">
  <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
</div>
      </form>
      </div>
    </div>
            <h4>Daftar Mahasiswa</h4>
            <ul class="list-group">
                <?php foreach($data['mhs'] as $mhs) :?>
                <li class="list-group-item">
                    <?=$mhs['nama'];?>
                    <a href="<?=BASEURL;?>/mahasiswa/hapus/<?=$mhs['nim'];?>"
                     class="badge bg-danger float-end m-1" onclick="return confirm('Yakin Data akan dihapus.?');"style="text-decoration:none">Hapus</a>
                    <a href="<?=BASEURL;?>/mahasiswa/ubah/<?=$mhs['nim'];?>"
                     class="badge bg-success float-end m-1 tampilModalEdit" data-bs-toggle="modal" data-bs-target="#forminputmhs" style="text-decoration:none" data-nim="<?=$mhs['nim'];?>">Edit Data</a>
                    <a href="<?=BASEURL;?>/mahasiswa/detail/<?=$mhs['nim'];?>"
                     class="badge bg-primary float-end m-1" style="text-decoration:none">Detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- Modal Boxnya -->
<div class="modal fade" id="forminputmhs" tabindex="-1" aria-labelledby="labelModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/mahasiswa/tambah" method="post">
        <input type="hidden" name="nim" id="nim">
        <div class="input-group mb-3">
        <span class="input-group-text">NIM</span>
        <input type="number" class="form-control" id="nimmhs" name="nim" aria-label="nim" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
        <span class="input-group-text">Nama Mahasiswa</span>
        <input type="text" class="form-control" id="namamhs" name="nama" aria-label="nama" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
        <span class="input-group-text">Tempat Lahir</span>
        <input type="text" class="form-control" id="tlahir" name="tempatlahir" aria-label="tempatlahir" aria-describedby="basic-addon1">
        </div>
        <select class="form-select" id="prodi" name="prodi" aria-label="prodi">
        <option selected>Program Studi</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Sipil">Teknik Sipil</option>
            <option value="Teknik Elektro">Teknik Elektro</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
