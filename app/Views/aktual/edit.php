<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-sm-6">
          <br>
          <h1>Data Aktual</h1>
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
              <h3 class="card-title">Edit Data Wilayah</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('aktual/update/' . $aktual['id_prediksi']) ?>" method="post">
              <?= csrf_field(); ?>
              <div class="form-group">
                <label for="tahun">Tahun</label>
                <select name="tahun" id="tahun" class="form-control">
                  <option value="">- Pilih Tahun -</option>
                  <?php foreach ($periode as $a) { ?>
                    <option value="<?= $a['id_periode']; ?>" <?= ($a['id_periode'] == $aktual['id_periode']) ? 'selected' : ''; ?>>
                      <?= $a['tahun']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="nama_wilayah">Nama Wilayah</label>
                <select name="nama_wilayah" class="form-control">
                  <option value="">- Pilih Kode Wilayah -</option>
                  <?php foreach ($wilayah as $a) { ?>
                    <option value="<?= $a['kode_wilayah']; ?>" <?= ($a['kode_wilayah'] == $aktual['kode_wilayah']) ? 'selected' : ''; ?>>
                      <?= $a['nama_wilayah']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="jumlah_penduduk">Jumlah Penduduk Miskin</label>
                <input type="text" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" value="<?= $aktual['jumlah_penduduk']; ?>" placeholder="Masukkan Jumlah Penduduk" value="<?= old('nama_wilayah'); ?>">
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