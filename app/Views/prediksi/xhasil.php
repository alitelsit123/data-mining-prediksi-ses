<!-- <main>
  <h1>===================PERAMALAN======================</h1>
  <div class="card mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> - </th>
              <th>Periode</th>
              <th>Jumlah Penduduk</th>
            </tr>
          </thead>
          <?php foreach ($dataAktual as $DA) : ?>
            <tr>
              <td> - </td>
              <td><?= $DA['tahun'] ?></td>
              <td><?= $DA['jumlah_penduduk'] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tahun</th>
              <th>Jumlah Penduduk (Yt)</th>
              <th>alpha</th>
              <th>alpha * Yt</th>
              <th>1-alpha</th>
              <th>Ft</th>
              <th>error</th>
              <th>AbsError(e)</th>
              <th>ErrSqr(e^2)</th>
              <th>Err/Yt</th>
            </tr>
          </thead>

          <tr>
            <?php $thPertama = 0;
            $ftSebelum = 0;
            $thSebelum = 0;
            $i = 0;
            foreach ($dataAktual as $DA) : ?>
              <?php if ($i == 0) : $thPertama = $DA['jumlah_penduduk'] ?>
          <tr>
            <td><?= $DA['tahun'] ?></td>
            <td><?= $DA['jumlah_penduduk'] ?></td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
          </tr>
        <?php elseif ($i == 1) : ?>
          <tr>
            <td><?= $DA['tahun'] ?></td>
            <td><?= $DA['jumlah_penduduk'] ?></td>
            <td><?= $_GET['pilih_alpha'] ?></td>
            <td><?= $_GET['pilih_alpha'] * $DA['jumlah_penduduk'] ?></td>
            <td><?= 1 - $_GET['pilih_alpha'] ?></td>
            <td><?= $ytawal = $ftSebelum = ($_GET['pilih_alpha'] * $thPertama) + ((1 - $_GET['pilih_alpha']) * $thPertama) ?></td>
            <td><?= $err = $DA['jumlah_penduduk'] - $ytawal ?></td>
            <td><?= $abs_err = abs($err) ?></td>
            <td><?= $sqr_err = pow($abs_err, 2) ?></td>
            <td><?= $errYt = ($abs_err / $ytawal) ?></td>
          </tr>
        <?php elseif ($i > 1) : ?>
          <tr>
            <td><?= $DA['tahun'] ?></td>
            <td><?= $DA['jumlah_penduduk'] ?></td>
            <td><?= $_GET['pilih_alpha'] ?></td>
            <td><?= $_GET['pilih_alpha'] * $DA['jumlah_penduduk'] ?></td>
            <td><?= 1 - $_GET['pilih_alpha'] ?></td>
            <td><?= $yt = ($_GET['pilih_alpha'] * $thSebelum) + ((1 - $_GET['pilih_alpha']) * $ftSebelum) ?></td>
            <td><?= $err = $DA['jumlah_penduduk'] - $yt ?></td>
            <td><?= $abs_err = abs($err) ?></td>
            <td><?= $sqr_err = pow($abs_err, 2) ?></td>
            <td><?= $errYt = ($abs_err / $yt) ?></td>
          </tr>
        <?php endif; ?>
      <?php if ($i == 0) {
                $thPertama = $DA['jumlah_penduduk'];
              }
              if ($i > 0) {
                $thSebelum = $DA['jumlah_penduduk'];
              }
              if ($i > 1) {
                // dd([$ftSebelum, $thSebelum]);
                // dd($ftSebelum);
                $ftSebelum = ($_GET['pilih_alpha'] * $thSebelum) + ((1 - $_GET['pilih_alpha']) * $ftSebelum);
              }
              $i++;
            endforeach; ?>
        </table>
        <h1>Prediksi penduduk miskin pada tahun X adalah ....</h1>
      </div>
    </div>
  </div>
</main> -->