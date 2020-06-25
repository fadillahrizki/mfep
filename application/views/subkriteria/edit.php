<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Edit data Sub Kriteria : <?=$kriteria->nama?> dari Kriteria : <?=$parent->nama?></h5>
            <form action="/subkriteria/update" method="post">
            <input type="hidden" name="id" value="<?=$kriteria->id?>">
            <input type="hidden" name="kriteria_id" value="<?=$parent->id?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?=$kriteria->nama?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nilai</label>
                    <input type="text" name="nilai" value="<?=$kriteria->nilai?>" class="form-control">
                </div>
                <hr>
                <button class="btn btn-success">Edit</button>
                <a href="/subkriteria?kriteria_id=<?=$parent->id?>" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>