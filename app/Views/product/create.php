<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>



<div>
  <h3 class="title-p">Create Produk</h3>

  <div class="row">
    <!-- <form method="post" action="/save"> -->
    <?= form_open('save') ?>
    <?= csrf_field(); ?>

    <div class="mb-3">
      <label for="nama_produk" class="form-label">Nama Produk</label>
      <input type="text" class="form-control " name="nama_produk" value="<?= set_value('nama_produk') ?>">
      <!-- Error -->
      <?= validation_show_error('nama_produk') ?>
    </div>

    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="text" class="form-control" name="harga" value="<?= set_value('harga') ?>" prefix="Rp.">
      <!-- Error -->
      <?= validation_show_error('harga') ?>
    </div>

    <div class="mb-3">
      <label for="kategori" class="form-label">Kategori</label>
      <input type="text" class="form-control" name="kategori" value="<?= set_value('kategori') ?>">
      <!-- Error -->
      <?= validation_show_error('kategori') ?>
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select value="<?= set_value('status') ?>" class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
        <option value="bisa dijual">bisa dijual</option>
        <option value="tidak bisa dijual">tidak bisa dijual</option>
      </select>
      <!-- Error -->
      <div class="error-message">
        <?= validation_show_error('status') ?>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <?= form_close() ?>
  </div>
</div>

<?= $this->endSection('content') ?>