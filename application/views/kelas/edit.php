<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Edit data Kelas : <?=$kelas->nama?></h5>
            <form action="/kelas/update" method="post">
            <input type="hidden" name="id" value="<?=$kelas->id?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?=$kelas->nama?>" class="form-control">
                </div>
                <hr>
                <button class="btn btn-success">Edit</button>
                <a href="/kelas" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>