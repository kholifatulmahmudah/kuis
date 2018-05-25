
<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Edit Barang</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('barang/update/'.$data->id_barang); ?>
    <?php echo form_hidden('id_barang', $data->id_barang) ?>
    <div class="form-group">
      <label for="nama_barang">Nama Barang</label>
      <input type="text" class="form-control" id="nama_barang" name="nama_barang"
      value="<?php echo $data->nama_barang ?>">
    </div>
    <div class="form-group">
    <label> Jenis Barang </label>
          <select class="form-control" name ="jenis_barang" id="jenis_barang"> 
          <option selected>
          <?php
            foreach ($jenisbarang as $k) {
              if($k->id_jenis == $data->jenis_barang)
              {
                echo $k->nama_jenis;
              }
            }
          ?>
          </option>
          <?php foreach ($jenisbarang as $k) { ?>
          <option value="<?php echo $k->id_jenis?>"><?php echo $k->nama_jenis?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
      <label for="harga_satuan">Harga Satuan</label>
      <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" 
      value="<?php echo $data->harga_satuan ?>">
    </div>
    <div class="form-group">
      <label for="stok_barang">Stok Barang</label>
      <input type="text" class="form-control" id="stok_barang" name="stok_barang"
      value="<?php echo $data->stok_barang ?>">
    </div>
    <div class="form-group">
      <label for="keterangan">Keterangan</label>
      <input type="text" class="form-control" id="keterangan" name="keterangan"
      value="<?php echo $data->keterangan ?>">
    </div>

    <a class="btn btn-info" href="<?php echo base_url('barang/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close(); ?>
  </div>
</div>

<?php //$this->load->view('layouts/base_end') ?>