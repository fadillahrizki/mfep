<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Tambah data Guru</h5>
            <form action="/guru/insert" method="post">
                <input type="hidden" name="level" value="guru">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option disabled selected >- Jenis Kelamin -</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas_id" class="form-control" required>
                    <option disabled selected>- Kelas -</option>
                        <?php foreach($kelas as $k): ?>
                            <option value="<?=$k->id?>"><?=$k->nama?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <hr>
                <button class="btn btn-success">Tambah</button>
                <a href="/guru" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>