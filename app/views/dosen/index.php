<div class="container mt-4">
    <div class="row">
      <div class="col-lg-5">
        <?php Flashnotif::notif(); ?>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <!-- Button Tambah-->
            <button type="button" class="btn btn-primary mb-2 tambahDataDosen" data-bs-toggle="modal" data-bs-target="#forminputdosen">
            Tambah Data Dosen
            </button>
            </div>
            <div class="row mb-2">
      <div class="col-lg-5">
        <!-- Button Cari -->
        <form action="<?=BASEURL;?>/dosen/cari" method="post">
        <div class="input-group mb-3">
  <!-- <input type="text" class="form-control" placeholder="Cari Nama dosen" name="pencarian" id="cari">
  <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button> -->
</div>
      </form>
      </div>
    </div>
            <h4>Daftar dosen</h4>
            <ul class="list-group">
                <?php foreach($data['dosen'] as $dosen) :?>
                <li class="list-group-item">
                    <?=$dosen['nama'];?>
                    <a href="<?=BASEURL;?>/dosen/hapus/<?=$dosen['nidn'];?>"
                     class="badge bg-danger float-end m-1" onclick="return confirm('Yakin Data akan dihapus.?');"style="text-decoration:none">Hapus</a>
                    <a href="<?=BASEURL;?>/dosen/ubah/<?=$dosen['nidn'];?>"
                     class="badge bg-success float-end m-1 tampilModalEditDosen" data-bs-toggle="modal" data-bs-target="#forminputdosen" style="text-decoration:none" data-nidn="<?=$dosen['nidn'];?>">Edit Data</a>
                    <a href="<?=BASEURL;?>/dosen/detail/<?=$dosen['nidn'];?>"
                     class="badge bg-primary float-end m-1" style="text-decoration:none">Detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- Modal Boxnya -->
<div class="modal fade" id="forminputdosen" tabindex="-1" aria-labelledby="labelModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModal">Tambah Data Dosen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/dosen/tambah" method="post">
        <input type="hidden" name="nidn" id="nidn">
        <div class="input-group mb-3">
        <span class="input-group-text">NIDN</span>
        <input type="number" class="form-control" id="nidndosen" name="nidn" aria-label="nidn" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
        <span class="input-group-text">Nama Dosen</span>
        <input type="text" class="form-control" id="namadosen" name="nama" aria-label="nama" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
        <span class="input-group-text">Alamat</span>
        <input type="text" class="form-control" id="alamatdosen" name="alamat" aria-label="alamat" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
        <span class="input-group-text">Email</span>
        <input type="text" class="form-control" id="email" name="email" aria-label="email" aria-describedby="basic-addon1">
        </div>
        <select class="form-select" id="prodi" name="prodi" aria-label="prodi">Program Studi
        <option selected></option>
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
