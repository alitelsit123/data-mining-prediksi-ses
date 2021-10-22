<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-sm-6">
          <br>
          <h1>Data Periode</h1>
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
              <h3 class="card-title">Tambah Data Periode</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('periode/save') ?>" method="post">
              <?= csrf_field(); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="tahun">Periode</label>
                  <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" value="<?= old('tahun'); ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <div class="form-group">
                  <input type="submit" value="Simpan" class="btn btn-primary" />
                  <input href="<?php echo base_url('/periode'); ?>" type="submit" value="Kembali" class="btn btn-danger" />
                </div>
              </div>
            </form>
          </div>
          <!-- /.card -->
  </section>
</div>
<?= $this->include('layout/footer') ?>