<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-sm-6">
          <br>
          <h1>Forecasting Form</h1>
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
              <h3 class="card-title">Forecasting</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('prediksi/hasil') ?>" method="get">
              <?= csrf_field(); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_wilayah">Nama Wilayah</label>
                  <select name="nama_wilayah" id="nama_wilayah" class="form-control">
                    <option value="">- Pilih Wilayah -</option>
                    <?php foreach ($wilayah as $w) : ?>
                      <option value="<?= $w['kode_wilayah']; ?>"><?= $w['nama_wilayah']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Alpha :</label>
                  <select class="form-control" name="pilih_alpha" id="pilih_alpha">
                    <option value="">- Pilih Alpha -</option>
                    <option value="0.1"> 0.1 </option>
                    <option value="0.2"> 0.2 </option>
                    <option value="0.3"> 0.3 </option>
                    <option value="0.4"> 0.4 </option>
                    <option value="0.5"> 0.5 </option>
                    <option value="0.6"> 0.6 </option>
                    <option value="0.7"> 0.7 </option>
                    <option value="0.8"> 0.8 </option>
                    <option value="0.9"> 0.9 </option>
                  </select>
                  <div class="invalid-feedback">
                  </div>
                </div>
                <div class="form-group">
                  <label>Periode berikutnya :</label>
                  <div class="d-flex">
                    <input type="number" name="pilih_periode" class="form-control mr-3" min="0">
                    <span class="align-self-center text-capitalize">Tahun</span>
                  </div>
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <div class="form-group">
                  <input type="submit" value="Proses" class="btn btn-primary" />
                  <!-- <input href="<?php echo base_url('/wilayah'); ?>" type="submit" value="Reset" class="btn btn-danger" /> -->
                </div>
              </div>
            </form>
          </div>
          <!-- /.card -->
  </section>
</div>
<?= $this->include('layout/footer') ?>