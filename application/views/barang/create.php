<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Tambah Barang</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('barang/store'); ?>
    <div class="form-group">
      <label for="nama_barang">Nama Barang</label>
      <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama barang">
    </div>
    <div class="form-group">
      <label>Jenis Barang</label>
          <select class="form-control" name ="jenis_barang" id="jenis_barang"> 
          <option selected> --Pilih Jenis Barang-- </option>
          <?php foreach ($dataBarang as $b) { ?>
          <option value="<?php echo $b->id_jenis?>"><?php echo $b->nama_jenis?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
      <label for="harga_satuan">Harga Satuan</label>
      <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Masukkan Harga Satuan">
    </div>
    <div class="form-group">
      <label for="stok_barang">Stok Barang</label>
      <input type="text" class="form-control" id="stok_barang" name="stok_barang" placeholder="Masukkan Stok Barang">
    </div>
    <div class="form-group">
      <label for="keterangan">Keterangan</label>
      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
    </div>
    <a class="btn btn-info" href="<?php echo base_url() ?>barang">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php //$this->load->view('layouts/base_end') ?>