<?php $this->load->view('layouts/base_start') ?>
<div class="container">
  <legend>Barang</legend>
  <form action="<?php echo base_url('barang/hasil')?>" action="GET">
		<div class="form-inline">
			<input type="text" class="form-control" id="cari" name="cari" placeholder="Cari...">
      <input class="btn btn-primary" type="submit" name="filter" value="Go"><br/>
      *pencarian berdasarkan nama barang
		</div>
	</form>
  <?php if (isset($results)) { ?>
  <table class="table table-striped">
    <thead>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Harga Satuan</th>
        <th>Stok Barang</th>
        <th width="30%">Keterangan</th>
        <th>
          <a class="btn btn-primary" href="<?php echo base_url('barang/create') ?>">
            Tambah
          </a>
        </th>
    </thead>
    <tbody>
    <?php foreach ($results as $data) { ?>
    <tr>
      <td>
        <a href="<?php echo base_url('barang/show/'.$data->id_barang) ?>">
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
      <td><?php echo $data->harga_satuan ?></td>
      <td><?php echo $data->stok_barang ?></td>
      <td><?php echo $data->keterangan ?></td>
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
  <?php echo $links ?>
  <?php } else { ?>
  <div>Tidak ada data</div>
  <?php } ?>
</div>

<?php $this->load->view('layouts/base_end') ?>
