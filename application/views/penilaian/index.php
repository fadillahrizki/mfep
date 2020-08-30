
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
    <button class="btn btn-success hide-print" onclick="window.print()">Cetak</button>
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
    <table width="100%">
      <tr>
        <td width="150px">
          <img src="/logo-pemprov.png" width="100px">
        </td>
        <td>
          <h5 style="padding:0;margin:0;">PEMERINTAH PROVINSI SUMATERA UTARA</h5>
          <h5 style="padding:0;margin:0;">DINAS PENDIDIKAN</h5>
          <h2 style="padding:0;margin:0;">SMA NEGERI 1 AEK KUASAN</h2>
          <p><i>Aek Loba Afd 1, Kec. Aek Kuasan, Kab. Asahan, Telepon : (0623) 351030, Kode Pos : 21275</i></p>
        </td>
      </tr>
    </table>
    <hr>
  </div>
  <div classs="table-responsive">
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
        </tr>
      </thead>
      <tbody id="ctn"><tr><td colspan="11" class="text-center">Tidak ada data!</td></tr></tbody>
    </table>
  </div>
  <div id="text-print" class="py-5">
    <table width="100%">
      <tr>
        <td width="50%">
          Dibuat Oleh,<br>
          Kepala Tata Usaha
          <br><br><br>
          SANGKOT ARMADI, S.Pd <br>
          NIP. -
        </td>
        <td>
          Disetujui Oleh,<br>
          Kepala SMAN 1 Aek Kuasan
          <br><br><br>
          MAZLI, S.Pd <br>
          NIP. 197409172006041002
        </td>
      </tr>
    </table>
    <hr>
  </div>
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
              <td colspan="11" class="text-center">Tidak ada data!</td>
            </tr>`;
          }else{
            tbody.innerHTML = '';
            res.forEach((penilaian,index) => {
              var kriteria = ""
              penilaian.items.forEach(item=>{kriteria += "<td>"+item.nilai+"</td>"})
              tbody.innerHTML += `
              <tr>
                <th>${index+1}</th>
                <td>${penilaian.siswa.NIS}</td>
                <td>${penilaian.siswa.nama}</td>
                ${kriteria}
                <td>${penilaian.total}</td>
                <td>${index+1 == 1 ? "Terpilih" : "-" }</td>
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
              <td colspan="11" class="text-center">Tidak ada data!</td>
            </tr>`;
          }else{
            tbody.innerHTML = '';
            res.forEach((penilaian,index) => {
              var kriteria = ""
              penilaian.items.forEach(item=>{kriteria += "<td>"+item.nilai+"</td>"})
              tbody.innerHTML += `
              <tr>
                <th>${index+1}</th>
                <td>${penilaian.siswa.NIS}</td>
                <td>${penilaian.siswa.nama}</td>
                ${kriteria}
                <td>${penilaian.total}</td>
                <td>${index+1 == 1 ? "Terpilih" : "-" }</td>
              </tr>`
            })
          }
        })
    }
  </script>
<?php endif; ?>

