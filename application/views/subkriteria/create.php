<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Tambah data Sub Kriteria : <?=$parent->nama?></h5>
            <form action="/subkriteria/insert?kriteria_id=<?=$parent->id?>" method="post">
                <input type="hidden" name="kriteria_id" value="<?=$parent->id?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nilai</label>
                    <input type="text" name="nilai" class="form-control">
                </div>
                <hr>
                <button class="btn btn-success">Tambah</button>
                <a href="/subkriteria?kriteria_id=<?=$parent->id?>" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>