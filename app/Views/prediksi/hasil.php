<main>
  <div class="container-fluid">
    <h1 class="mt-4">Peramalan</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
      <li class="breadcrumb-item active">Peramalan</li>
    </ol>

    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Peramalan Penduduk Miskin
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th> </th>
                <th>Periode</th>
                <th>Jumlah Penduduk</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($dataAktual as $DA) : ?>
                <tr>
                  <td> <?= $no++; ?> </td>
                  <td><?= $DA['tahun'] ?></td>
                  <td><?= $DA['jumlah_penduduk'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

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
            <tbody>
              <?php
              foreach ($dataAktual as $DA) :
              ?>
                <tr>
                  <td><?= $DA['tahun'] ?></td>
                  <td><?= ceil((int)$DA['jumlah_penduduk']) ?></td>
                  <td><?= $DA['alpha'] ?></td>
                  <td><?= $DA['sum'] ?></td>
                  <td><?= $DA['n1'] ?></td>
                  <td><?= round($DA['ft'], 2) ?></td>
                  <td><?= $DA['err'] ?></td>
                  <td><?= $DA['absErr'] ?></td>
                  <td><?= $DA['sqrErr'] ?></td>
                  <td><?= $DA['errYt'] ?></td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>

            </thead>
            <tbody>
              <?php
              foreach ($extras as $x => $v) :
              ?>
                <tr>
                  <td><?= $x ?></td>
                  <td><?= $v ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            Prediksi penduduk miskin pada Tahun <?= $dataAktual[count($dataAktual) - 1]['tahun'] ?> adalah <?= ceil($dataAktual[count($dataAktual) - 1]['ft']) ?>.
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Area Chart Example
              </div>
              <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';

  // Area Chart Example
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: <?php echo json_encode($ths); ?>,
      datasets: [{
        label: "Sessions",
        lineTension: 0.3,
        backgroundColor: "rgba(2,117,216,0.2)",
        borderColor: "rgba(2,117,216,1)",
        pointRadius: 5,
        pointBackgroundColor: "rgba(2,117,216,1)",
        pointBorderColor: "rgba(255,255,255,0.8)",
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(2,117,216,1)",
        pointHitRadius: 50,
        pointBorderWidth: 2,
        data: <?php echo json_encode($cart); ?>,
      }],
    },
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false
          },
          ticks: {
            maxTicksLimit: 7
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 200000,
            maxTicksLimit: <?php echo count($cart); ?>
          },
          gridLines: {
            color: "rgba(0, 0, 0, .125)",
          }
        }],
      },
      legend: {
        display: false
      }
    }
  });
</script>


<?= $this->include('layout/footer') ?>