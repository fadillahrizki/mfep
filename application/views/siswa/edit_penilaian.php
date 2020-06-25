<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Form Penilaian</h5>
            <hr>
            <h6>NIS : <b> <?= $siswa->NIS ?> </b> </h6>
            <h6>Nama : <b> <?= $siswa->nama ?> </b></h6>
            <form action="/penilaian/update" method="post">
                <input type="hidden" name="id" value="<?=$penilaian->id?>">
                <input type="hidden" name="kriteria" value="[]">
                <div class="card">
                    <div class="card-body">
                        <?php $i=0; foreach($kriteria as $k): ?>
                            <div class="form-group">
                                <input type="hidden" name="kriteria[<?=$i?>][id]" value="<?=$penilaian->items[$i]->id?>">
                                <input type="hidden" name="kriteria[<?=$i?>][kriteria_id]" value="<?=$k->id?>">
                                <label>Kriteria : <?=$k->nama?></label>
                                <select name="kriteria[<?=$i?>][sub_kriteria_id]" class="form-control">
                                    <?php foreach($k->childs as $sk): ?>
                                        <?php if($penilaian->items[$i]->sub_kriteria_id == $sk->id): ?>
                                            <option value="<?=$sk->id?>" selected><?=$sk->nama?> (<?=$sk->nilai?>)</option>
                                        <?php else : ?>
                                            <option value="<?=$sk->id?>"><?=$sk->nama?> (<?=$sk->nilai?>)</option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
                <hr>
                <button class="btn btn-success">Edit</button>
                <a href="/siswa" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>