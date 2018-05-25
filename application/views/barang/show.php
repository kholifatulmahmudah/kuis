<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <br/>
  <legend>Lihat Barang</legend>
  <div class="content">
    <div class="form-group">
      <label for="nama_barang">Nama Barang</label>
      <p><?php echo $data->nama_barang ?></p>
    </div>
    <div class="form-group">
      <label for="jenis_barang">Jenis Barang</label>
      <p><?php foreach ($barang as $b)
        {
          if($b->id_jenis == $data->jenis_barang)
          {
            echo $b->nama_jenis;
          }
        }
        ?></p>
    </div>
    <div class="form-group">
      <label for="harga_satuan">Harga Satuan</label>
      <p><?php echo $data->harga_satuan ?></p>
    </div>
    <div class="form-group">
      <label for="stok_barang">Stok Barang</label>
      <p><?php echo $data->stok_barang ?></p>
    </div>
    <div class="form-group">
      <label for="keterangan">Keterangan</label>
      <p><?php echo $data->keterangan ?></p>
    </div>
    <a class="btn btn-info" href="<?php echo base_url('barang/') ?>">Kembali</a>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>