<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Tambah data Siswa</h5>
            <form action="/siswa/insert" method="post">
                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="NIS" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control">
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
                    <textarea name="alamat" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas_id" class="form-control">
                        <?php foreach($kelas as $k): ?>
                            <option value="<?=$k->id?>"><?=$k->nama?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <hr>
                <button class="btn btn-success">Tambah</button>
                <a href="/siswa" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>