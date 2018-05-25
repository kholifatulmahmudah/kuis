<?php $this->load->view('layouts/base_start') ?>
<div class="container">
  <legend>Jenis Barang </legend>
  <form action="<?php echo base_url('jenisbarang/hasil')?>" action="GET">
		<div class="form-inline">
			<input type="text" class="form-control" id="cari" name="cari" placeholder="Cari...">
      <input class="btn btn-primary" type="submit" name="filter" value="Go"><br/>
      *pencarian berdasarkan jenis barang
		</div>
	</form>
  <?php if (isset($results)) { ?>
  <table class="table table-striped">
    <thead>
        <th>Jenis Barang</th>
        <th><a class="btn btn-primary" href="<?php echo base_url('jenisbarang/create') ?>">
            Tambah
          </a>
        </th>
    </thead>
    <tbody>
    <?php foreach ($results as $data) { ?>
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
  <?php echo $links ?>
  <?php } else { ?>
  <div>Tidak ada data</div>
  <?php } ?>
</div>

<?php $this->load->view('layouts/base_end') ?>
