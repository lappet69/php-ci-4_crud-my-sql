<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>
<div>
  <h3>Daftar Produk</h3>
  <?php if (session()->getFlashdata('success') !== NULL) : ?>
    <div class="alert alert-success" role="alert">
      <?php echo session()->getFlashdata('success'); ?>
    </div>
  <?php endif; ?>
  <a href="/create" class="badge text-bg-primary d-inline">Tambah Produk</a>
  <table class="table  table-responsive">
    <thead>
      <tr>
        <th scope="col">NO</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Harga</th>
        <th scope="col" width="15%">Kategori</th>
        <th scope="col" width="7%">Status</th>
        <th scope="col" width="9%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $p) : ?>
        <tr>
          <th scope="row"><?= $offset++; ?></th>
          <td><?= $p['nama_produk'] ?></td>
          <td><?= number_to_currency($p['harga'], 'IDR', 2); ?></td>
          <td><?= $p['kategori'] ?></td>
          <td><?= $p['status'] ?></td>
          <td>
            <button type="button" class="badge text-bg-warning d-inline"><a href="<?= base_url("/edit"); ?>/<?= $p['id_produk'] ?>">Edit</a></button>
            <form action="/delete/<?= $p['id_produk'] ?>" method="post" class="d-inline">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="badge text-bg-danger d-inline" onclick="return confirm('Yakin ingin menghapus <?= $p['nama_produk'] ?>')">Hapus</button>
            </form>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>


</div>
<div>
  <?= $pager_links ?>
</div>
<?= $this->endSection() ?>