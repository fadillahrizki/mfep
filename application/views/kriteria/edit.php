<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Edit data Kriteria : <?=$kriteria->nama?></h5>
            <form action="/kriteria/update" method="post">
            <input type="hidden" name="id" value="<?=$kriteria->id?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?=$kriteria->nama?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Bobot</label>
                    <input type="text" name="bobot" value="<?=$kriteria->bobot?>" class="form-control">
                </div>
                <hr>
                <button class="btn btn-success">Edit</button>
                <a href="/kriteria" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>