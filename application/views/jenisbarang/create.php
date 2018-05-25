<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Tambah Jenis Barang</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('jenisbarang/store'); ?>

    <div class="form-group">
      <label for="nama jenis">Jenis Barang</label>
      <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" placeholder="Masukkan Jenis Barang">
    </div>

    <a class="btn btn-info" href="<?php echo base_url() ?>jenisbarang">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>