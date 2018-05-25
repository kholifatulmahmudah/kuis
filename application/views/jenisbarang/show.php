<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <br/>
  <legend>Lihat Jenis Barang</legend>
  <div class="content">
    <div class="form-group">
      <label for="jenisbarang">Jenis Barang</label>
      <p><?php echo $data->nama_jenis ?></p>
    </div>
    <a class="btn btn-info" href="<?php echo base_url('jenisbarang/') ?>">Kembali</a>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>