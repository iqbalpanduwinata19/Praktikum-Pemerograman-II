<div class="container mt-6">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $data['dosen']['nama'];?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?=$data['dosen']['nidn'];?></h6>
    <p class="card-text"><?=$data['dosen']['email'];?></p>
    <p class="card-text"><?=$data['dosen']['alamat'];?></p>
    <p class="card-text"><?=$data['dosen']['prodi'];?></p>
    <a href="<?=BASEURL;?>/dosen" class="card-link text-decoration-none">Kembali</a>
  </div>
</div>
</div>
