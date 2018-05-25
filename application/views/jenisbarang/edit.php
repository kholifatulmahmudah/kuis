<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Edit Jenis Barang</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('jenisbarang/update/'.$data->id_jenis); ?>
    <?php echo form_hidden('id_jenis', $data->id_jenis) ?>
    <div class="form-group">
      <label for="namajenis">Jenis Barang</label>
      <input type="text" class="form-control" id="nama_jenis" name="nama_jenis"value="<?php echo $data->nama_jenis?>">
    </div>

    <a class="btn btn-info" href="<?php echo base_url('jenisbarang/index') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>