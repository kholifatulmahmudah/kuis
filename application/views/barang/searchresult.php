<?php $this->load->view('layouts/base_start') ?>
<div class="container">
  <legend>Hasil Pencarian </legend>
  <?php if (isset($cari)) { ?>
  <table class="table table-striped">
    <thead>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Harga Satuan</th>
        <th>Stok Barang</th>
        <th width="30%">Keterangan</th>
        <th></th>
    </thead>
    <tbody>
    <?php if(count($cari) > 0 ) {
    foreach ($cari as $data) { ?>
    <tr>
      <td>
        <a href="<?php echo base_url('jenisbarang/show/'.$data->id_barang) ?>">
        <?php echo $data->nama_barang ?>
      </td>
      <td>
      <?php foreach ($barang as $b)
        {
          if($b->id_jenis == $data->jenis_barang)
          {
            echo $b->nama_jenis;
          }
        }
      ?>
      </td>
      <td>
        <?php echo $data->harga_satuan ?>
      </td>
      <td>
        <?php echo $data->stok_barang ?>
      </td>
      <td>
        <?php echo $data->keterangan ?>
      </td>
      <td>
        <?php echo form_open('barang/destroy/'.$data->id_barang)  ?>
        <a class="btn btn-info" href="<?php echo base_url('barang/edit/'.$data->id_barang) ?>">
          Ubah
        </a>
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
        <?php echo form_close() ?>
      </td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    <?php } ?>
    <?php } else { ?>
    <div>Tidak ada data</div>
    <?php } ?>
    <a class="btn btn-primary" href="<?php echo base_url('barang/index') ?>">
    Kembali
    </a>
</div>

<?php $this->load->view('layouts/base_end') ?>
