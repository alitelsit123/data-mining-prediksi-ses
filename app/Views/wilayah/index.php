<!DOCTYPE html>
<html lang="en">

<main>
  <div class="container-fluid">
    <h1 class="mt-4">Tables Data Wilayah</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
      <li class="breadcrumb-item active">Tables Data Wilayah</li>
    </ol>
    <div class="card mb-4">
      <!-- <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
      </div> -->
    </div>
    <div>
      <a href="<?php echo base_url('/wilayah/create'); ?>" type="submit" class="btn btn-primary mb-4">Tambah Data</a>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
      </div>
    <?php endif; ?>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable Example
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Wilayah</th>
                <th>Nama Wilayah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Kode Wilayah</th>
                <th>Nama Wilayah</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              $no = 1;
              foreach ($wilayah as $w) {
              ?>
                <tr>
                  <td> <?= $no++; ?> </td>
                  <td> <?= $w['kode_wilayah']; ?> </td>
                  <td> <?= $w['nama_wilayah']; ?> </td>
                  <td>
                    <div>
                      <a type="Edit" href="wilayah/edit/<?= $w['kode_wilayah']; ?>" class="btn btn-success m-2">Edit</a>
                      <a type="Delete" href="wilayah/delete/<?= $w['kode_wilayah']; ?>" class="btn btn-danger m-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Hapus</a>
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
<?= $this->include('layout/footer') ?>