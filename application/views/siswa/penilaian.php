<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Form Penilaian</h5>
            <hr>
            <h6>NIS : <b> <?= $siswa->NIS ?> </b> </h6>
            <h6>Nama : <b> <?= $siswa->nama ?> </b></h6>
            <form action="/penilaian/insert" method="post">
                <input type="hidden" name="NIS" value="<?=$siswa->NIS?>">
                <input type="hidden" name="kelas_id" value="<?=$siswa->kelas_id?>">
                <input type="hidden" name="kriteria" value="[]">
                <div class="card">
                    <div class="card-body">
                        <?php $i=0; foreach($kriteria as $k): ?>
                            <div class="form-group">
                                <input type="hidden" name="kriteria[<?=$i?>][kriteria_id]" value="<?=$k->id?>">
                                <label>Kriteria : <?=$k->nama?></label>
                                <input type="text" name="kriteria[<?=$i?>][nilai]" class="form-control">
                                <?php /*
                                <select name="kriteria[<?=$i?>][sub_kriteria_id]" class="form-control">
                                    <option disabled selected>- Pilih Sub Kriteria -</option>
                                    <?php foreach($k->childs as $sk): ?>
                                        <option value="<?=$sk->id?>"><?=$sk->nama?> (<?=$sk->nilai?>)</option>
                                    <?php endforeach ?>
                                </select>
                                */ ?>
                            </div>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
                <hr>
                <button class="btn btn-success">Tambah</button>
                <a href="/siswa" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>