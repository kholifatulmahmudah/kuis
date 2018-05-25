<?php $this->load->view('layouts/base_start') ?>
<div class="container">
  <legend>Hasil Pencarian </legend>
  <?php if (isset($cari)) { ?>
  <table class="table table-striped">
    <thead>
        <th>Jenis Barang</th>
        <th></th>
    </thead>
    <tbody>
    <?php if(count($cari) > 0 ) {
    foreach ($cari as $data) { ?>
    <tr>
      <td>
        <a href="<?php echo base_url('jenisbarang/show/'.$data->id_jenis) ?>">
        <?php echo $data->nama_jenis ?>
      </td>
      <td>
        <?php echo form_open('jenisbarang/destroy/'.$data->id_jenis)  ?>
        <a class="btn btn-info" href="<?php echo base_url('jenisbarang/edit/'.$data->id_jenis) ?>">
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
    <a class="btn btn-primary" href="<?php echo base_url('jenisbarang/index') ?>">
    Kembali
    </a>
</div>

<?php $this->load->view('layouts/base_end') ?>
