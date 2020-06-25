<div class="container">
    <div class="row">
        <div class="col-12">
            <h5>Tambah data Kriteria</h5>
            <form action="/kriteria/insert" method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label>Bobot</label>
                    <input type="text" name="bobot" class="form-control">
                </div>
                <hr>
                <button class="btn btn-success">Tambah</button>
                <a href="/kriteria" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>