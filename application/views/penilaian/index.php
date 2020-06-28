
<div class="py-3">
  <h3>Data Penilaian</h3>
    <?php if($this->session->user->level != "guru"): ?>
    <select name="kelas" class="form-control mr-3" onchange="filter(event)">
      <option value="-"> - Pilih Kelas - </option>
      <?php foreach($kelas as $k):?>
        <option value="<?=$k->id?>"><?=$k->nama?></option>
      <?php endforeach ?>
    </select>
    <?php endif ?>
</div>

<?php if(isset($this->session->successCreate)): ?>
  <div class="alert alert-success">Berhasil Menambah Data Penilaian</div>
<?php unset($_SESSION['successCreate']);endif; ?>

<?php if(isset($this->session->successUpdate)): ?>
  <div class="alert alert-success">Berhasil Mengedit Data Penilaian</div>
<?php unset($_SESSION['successUpdate']);endif; ?>

<?php if(isset($this->session->successDelete)): ?>
  <div class="alert alert-success">Berhasil Menghapus Data Penilaian</div>
<?php unset($_SESSION['successDelete']);endif; ?>

<div id="print" class="text-center">
  <div id="text-print" class="py-5">
    <h4>SMA Negeri 1 Aek Kuasan</h4>
    <p>Negeri Dongeng, Kecamatan Semua, Kabupaten Berantah, Santuy</p>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>NIS</th>
        <th>Nama</th>
        <?php foreach($kriteria as $k): ?>
          <th><?=$k->nama?> ( <?=$k->bobot?> )</th>
        <?php endforeach ?>
        <th>Total</th>
        <th>Keputusan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="ctn"><tr><td colspan="8" class="text-center">Tidak ada data!</td></tr></tbody>
  </table>
</div>


<?php if($this->session->user->level == "guru"): ?>
  <script>
  let tbody = document.querySelector("tbody#ctn");
    fetch('/penilaian/read?kelas_id='+<?=$this->session->user->guru->kelas_id?>)
        .then(res=>res.json())
        .then(res=>{
          if(!res.length){
            tbody.innerHTML = `
            <tr>
              <td colspan="8" class="text-center">Tidak ada data!</td>
            </tr>`;
          }else{
            tbody.innerHTML = '';
            res.map((penilaian,index)=>{
              tbody.innerHTML += `
              <tr>
                <th>${index+1}</th>
                <td>${penilaian.siswa.NIS}</td>
                <td>${penilaian.siswa.nama}</td>
                ${penilaian.items.map(item=>`<td>${item.sub_kriteria.nama} ( ${item.sub_kriteria.nilai} )</td>`)}
                <td>${penilaian.total}</td>
                <td>${index+1 == 1 ? "Terpilih" : "-" }</td>
                <td>
                  <button class="btn btn-success" onclick="window.print()">Cetak</button>
                </td>
              </tr>`
            })
          }
        })
  </script>
<?php else: ?>
  <script>
    function filter(e){
      const id = e.target.value
      let tbody = document.querySelector("tbody#ctn");
      fetch('/penilaian/read?kelas_id='+id)
        .then(res=>res.json())
        .then(res=>{
          if(!res.length){
            tbody.innerHTML = `
            <tr>
              <td colspan="8" class="text-center">Tidak ada data!</td>
            </tr>`;
          }else{
            tbody.innerHTML = '';
            res.map((penilaian,index)=>{
              tbody.innerHTML += `
              <tr>
                <th>${index+1}</th>
                <td>${penilaian.siswa.NIS}</td>
                <td>${penilaian.siswa.nama}</td>
                ${penilaian.items.map(item=>`<td>${item.sub_kriteria.nama} ( ${item.sub_kriteria.nilai} )</td>`)}
                <td>${penilaian.total}</td>
                <td>${index+1 == 1 ? "Terpilih" : "-" }</td>
                <td>
                  <button class="btn btn-success" onclick="window.print()">Cetak</button>
                </td>
              </tr>`
            })
          }
        })
    }
  </script>
<?php endif; ?>

