<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-sm-6">
          <br>
          <h1>Data Wilayah</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Wilayah</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('wilayah/save') ?>" method="post">
              <?= csrf_field(); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="kode_wilayah">Kode Wilayah</label>
                  <input type="text" class="form-control" id="kode_wilayah" name="kode_wilayah" placeholder="Masukkan Kode Wilayah" autofocus value="<?= old('kode_wilayah'); ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_wilayah">Nama Wilayah</label>
                  <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" placeholder="Masukkan Nama Wilayah" value="<?= old('nama_wilayah'); ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <div class="form-group">
                  <input type="submit" value="Simpan" class="btn btn-primary" />
                  <input href="<?php echo base_url('/wilayah'); ?>" type="submit" value="Kembali" class="btn btn-danger" />
                </div>
              </div>
            </form>
          </div>
          <!-- /.card -->
  </section>
</div>
<?= $this->include('layout/footer') ?>