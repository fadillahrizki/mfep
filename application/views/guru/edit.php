<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Edit data Guru : <?=$guru->pengguna->nama?></h5>
            <form action="/guru/update" method="post">
                <input type="hidden" name="id" value="<?=$guru->id?>">
                <input type="hidden" name="pengguna_id" value="<?=$guru->pengguna_id?>">
                <input type="hidden" name="kelas_id" value="<?=$guru->kelas_id?>">
                <input type="hidden" name="level" value="guru">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?=$guru->pengguna->nama?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?= $guru->pengguna->username ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?= $guru->pengguna->password ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <?php if($guru->pengguna->jenis_kelamin == 'Laki - Laki'): ?>
                            <option value="Laki - Laki" selected>Laki - Laki</option>
                        <?php else: ?>
                            <option value="Perempuan" selected>Perempuan</option>
                        <?php endif ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas_id" class="form-control">
                    <option disabled selected>- Kelas -</option>
                        <?php foreach($kelas as $k): ?>
                            <?php if($guru->kelas_id == $k->id): ?>
                                <option value="<?=$k->id?>" selected><?=$k->nama?></option>
                            <?php else: ?>
                                <option value="<?=$k->id?>"><?=$k->nama?></option>
                            <?php endif ?>        
                        <?php endforeach ?>
                    </select>
                </div>
                <hr>
                <button class="btn btn-success">Edit</button>
                <a href="/guru" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>