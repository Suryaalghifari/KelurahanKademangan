<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
  <div class="row">
    <!-- Card 1 -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Today's Money</p>
              <h4 class="mb-0">$53,000</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-primary shadow-primary text-center border-radius-lg">
              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0 text-sm">
            <span class="text-success text-sm font-weight-bolder">+55%</span> than last week
          </p>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Today's Users</p>
              <h4 class="mb-0">2,300</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-success shadow-success text-center border-radius-lg">
              <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0 text-sm">
            <span class="text-success text-sm font-weight-bolder">+3%</span> than yesterday
          </p>
        </div>
      </div>
    </div>

    <!-- Tambahkan card 3 & 4 jika diperlukan -->
  </div>
</div>

<?= $this->endSection() ?>
