<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>
<div>
  <h3>Edit Produk</h3>

  <div class="row">
    <form method="post" action="/update/<?= $product['id_produk'] ?>">

      <?= csrf_field() ?>
      <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" value="<?= $product['nama_produk']; ?>" name="nama_produk">
        <!-- Error -->
        <?= validation_show_error('nama_produk') ?>
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" value="<?= $product['harga'] ?>" name="harga">
        <!-- Error -->
        <?= validation_show_error('harga') ?>
      </div>

      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" class="form-control" value="<?= $product['kategori'] ?>" name="kategori">
        <!-- Error -->
        <?= validation_show_error('kategori') ?>
      </div>

      <div class="mb-3">
        <select value="<?= set_value('status') ?>" class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
          <option value="bisa dijual">bisa dijual</option>
          <option value="tidak bisa dijual">tidak bisa dijual</option>
        </select>
        <!-- Error -->
        <?= validation_show_error('status') ?>
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>

<?= $this->endSection('content') ?>