<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Edit data Alternatif : <?=$siswa->nama?></h5>
            <form action="/siswa/update" method="post">
                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="NIS" value="<?=$siswa->NIS?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?=$siswa->nama?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option disabled selected>- Jenis Kelamin -</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="5" class="form-control"><?=$siswa->alamat?></textarea>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas_id" class="form-control">
                        <?php foreach($kelas as $k): ?>
                            <?php if($siswa->kelas->id == $k->id): ?>
                                <option selected value="<?=$k->id?>"><?=$k->nama?></option>
                            <?php else : ?>
                                <option value="<?=$k->id?>"><?=$k->nama?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <hr>
                <button class="btn btn-success">Edit</button>
                <a href="/siswa" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>