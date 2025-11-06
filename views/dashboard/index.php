<?php include __DIR__. "/../layouts/header.php" ?>
<?php include __DIR__. "/../layouts/topbar.php" ?>
<?php include __DIR__. "/../layouts/sidebar.php"?>
      <!-- ========================
        Start Page Content
    ========================= -->
      <div class="page-wrapper">
        <!-- Start Content -->
        <div class="content pb-0">
          <!-- Page Header -->
          <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
              <h4 class="mb-1">Dashboard</h4>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
              <div id="reportrange" class="reportrange-picker d-flex align-items-center shadow">
                <i class="ti ti-calendar-due text-dark fs-14 me-1"></i>
                <span class="reportrange-picker-field">9 Jun 25 - 9 Jun 25</span>
              </div>
              <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                <i class="ti ti-refresh"></i>
              </a>
              <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Collapse" data-bs-original-title="Collapse" id="collapse-header">
                <i class="ti ti-transition-top"></i>
              </a>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Start Welcome Wrap -->
          <div class="welcome-wrap mb-4">
            <div class=" d-flex align-items-center justify-content-between flex-wrap gap-3 bg-dark rounded p-4">
              <div>
                <h2 class="mb-1 text-white fs-24">Welcome Back, Adrian</h2>
                <p class="text-light fs-14 mb-0">14 New Companies Subscribed Today !!!</p>
              </div>
              <div class="d-flex align-items-center flex-wrap gap-2">
                <a href="company.html" class="btn btn-danger btn-sm">Companies</a>
                <a href="packages.html" class="btn btn-light btn-sm">All Packages</a>
              </div>
            </div>
          </div>
          <!-- Endc Welcome Wrap -->
          <!-- start row -->
          <div class="row row-gap-3 mb-4">
            <!-- Total Companies -->
            <div class="col-xl-3 col-sm-6 d-flex">
              <div class="card flex-fill mb-0 position-relative overflow-hidden">
                <div class="card-body position-relative z-1">
                  <div class="d-flex align-items-start justify-content-between">
                    <div class="d-flex align-items-start justify-content-between">
                      <div>
                        <p class="fs-14 mb-1">Total Companies</p>
                        <h2 class="mb-1 fs-16">5468</h2>
                        <p class="text-success mb-0 fs-13">
                          <i class="ti ti-arrow-bar-up me-1"></i>5.62% <span class="text-body ms-1">from last month</span>
                        </p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <span class="avatar avatar-md rounded-circle bg-soft-primary border border-primary">
                        <i class="ti ti-building fs-16 text-primary"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <img src="assets/img/icons/elemnt-01.svg" alt="elemnt-04" class="img-fluid position-absolute top-0 Start-0">
              </div>
            </div>
            <!-- /Total Companies -->
            <!-- Total Companies -->
            <div class="col-xl-3 col-sm-6 d-flex">
              <div class="card flex-fill mb-0 position-relative overflow-hidden">
                <div class="card-body position-relative z-1">
                  <div class="d-flex align-items-start justify-content-between">
                    <div class="d-flex align-items-start justify-content-between">
                      <div>
                        <p class="fs-14 mb-1">Active Companies</p>
                        <h2 class="mb-1 fs-16">4598</h2>
                        <p class="text-danger mb-0 fs-13">
                          <i class="ti ti-arrow-bar-down me-1"></i>12% <span class="text-body ms-1">from last month</span>
                        </p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <span class="avatar avatar-md rounded-circle bg-soft-success border border-success">
                        <i class="ti ti-carousel-vertical fs-16 text-success"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <img src="assets/img/icons/elemnt-02.svg" alt="elemnt-04" class="img-fluid position-absolute top-0 Start-0">
              </div>
            </div>
            <!-- /Total Companies -->
            <!-- Total Companies -->
            <div class="col-xl-3 col-sm-6 d-flex">
              <div class="card flex-fill mb-0 position-relative overflow-hidden">
                <div class="card-body position-relative z-1">
                  <div class="d-flex align-items-start justify-content-between">
                    <div class="d-flex align-items-start justify-content-between">
                      <div>
                        <p class="fs-14 mb-1">Total Subscribers</p>
                        <h2 class="mb-1 fs-16">5468</h2>
                        <p class="text-success mb-0 fs-13">
                          <i class="ti ti-arrow-bar-up me-1"></i>6% <span class="text-body ms-1">from last month</span>
                        </p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <span class="avatar avatar-md rounded-circle bg-soft-warning border border-warning">
                        <i class="ti ti-chalkboard-off fs-16 text-warning"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <img src="assets/img/icons/elemnt-03.svg" alt="elemnt-04" class="img-fluid position-absolute top-0 Start-0">
              </div>
            </div>
            <!-- /Total Companies -->
            <!-- Total Companies -->
            <div class="col-xl-3 col-sm-6 d-flex">
              <div class="card flex-fill mb-0 position-relative overflow-hidden">
                <div class="card-body position-relative z-1">
                  <div class="d-flex align-items-start justify-content-between">
                    <div class="d-flex align-items-start justify-content-between">
                      <div>
                        <p class="fs-14 mb-1">Total Earnings</p>
                        <h2 class="mb-1 fs-16">$89,878,58</h2>
                        <p class="text-danger mb-0 fs-13">
                          <i class="ti ti-arrow-bar-down me-1"></i>16% <span class="text-body ms-1">from last month</span>
                        </p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <span class="avatar avatar-md rounded-circle bg-soft-danger border border-danger mb-3">
                        <i class="ti ti-businessplan fs-16 text-primary"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <img src="assets/img/icons/elemnt-04.svg" alt="elemnt-04" class="img-fluid position-absolute top-0 Start-0">
              </div>
            </div>
            <!-- /Total Companies -->
          </div>
          <!-- end row -->
          <!-- start row -->
          <div class="row">
            <!-- Companies -->
            <div class="col-xxl-3 col-lg-6 d-flex">
              <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                  <h6 class="mb-0">Companies</h6>
                  <div class="dropdown">
                    <a class="dropdown-toggle btn btn-outline-light shadow p-2" data-bs-toggle="dropdown" href="javascript:void(0);">
                      <i class="ti ti-calendar me-1"></i>This Week </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item"> This Month </a>
                      <a href="javascript:void(0);" class="dropdown-item"> This Week </a>
                      <a href="javascript:void(0);" class="dropdown-item"> Today </a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div id="company-chart"></div>
                  <p class="text-success mb-0 fs-13 text-center">
                    <i class="ti ti-arrow-bar-up me-1"></i>12.5% <span class="text-body ms-1">from last month</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- /Companies -->
            <!-- Revenue -->
            <div class="col-lg-6 d-flex">
              <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                  <h6 class="mb-0">Revenue</h6>
                  <div class="dropdown">
                    <a class="dropdown-toggle btn btn-outline-light shadow p-2" data-bs-toggle="dropdown" href="javascript:void(0);">
                      <i class="ti ti-calendar me-1"></i>2025 </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item"> 2025 </a>
                      <a href="javascript:void(0);" class="dropdown-item"> 2024 </a>
                      <a href="javascript:void(0);" class="dropdown-item"> 2023 </a>
                    </div>
                  </div>
                </div>
                <div class="card-body pb-0">
                  <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                    <div class="mb-1">
                      <h5 class="mb-2 fs-16 fw-bold">$89,878,58</h5>
                      <p class="mb-0 fs-13">
                        <span class="text-success fw-normal me-1">
                          <i class="ti ti-arrow-bar-up me-1"></i>40% </span>increased from last year
                      </p>
                    </div>
                    <p class="fs-14 text-dark d-flex align-items-center mb-1">
                      <i class="ti ti-circle-filled me-1 fs-6 text-teal"></i>Revenue
                    </p>
                  </div>
                  <div id="revenue-income"></div>
                </div>
              </div>
            </div>
            <!-- /Revenue -->
            <!-- Top Plans -->
            <div class="col-xxl-3 col-xl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                  <h6 class="mb-0">Top Plans</h6>
                  <div class="dropdown">
                    <a class="dropdown-toggle btn btn-outline-light shadow p-2" data-bs-toggle="dropdown" href="javascript:void(0);">
                      <i class="ti ti-calendar me-1"></i>Last 30 Days </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item"> Last 30 Days </a>
                      <a href="javascript:void(0);" class="dropdown-item"> Last 10 Days </a>
                      <a href="javascript:void(0);" class="dropdown-item"> Today </a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div id="plan-overview"></div>
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <p class="f-14 fw-medium text-dark mb-0">
                      <i class="ti ti-circle-filled text-info me-1"></i>Basic
                    </p>
                    <p class="f-14 fw-medium text-dark mb-0">60%</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <p class="f-14 fw-medium text-dark mb-0">
                      <i class="ti ti-circle-filled text-warning me-1"></i>Premium
                    </p>
                    <p class="f-14 fw-medium text-dark mb-0">20%</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-0">
                    <p class="f-14 fw-medium text-dark mb-0">
                      <i class="ti ti-circle-filled text-primary me-1"></i>Enterprise
                    </p>
                    <p class="f-14 fw-medium text-dark mb-0">20%</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Top Plans -->
          </div>
          <!-- end row -->
          <!-- start row -->
          <div class="row">
            <!-- Recent Transactions -->
            <div class="col-xxl-4 col-xl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                  <h5 class="mb-0 fs-16 fw-bold">Recent Transactions</h5>
                  <a href="purchase-transaction.html" class="btn btn-primary btn-xs">View All</a>
                </div>
                <div class="card-body pb-2">
                  <!-- Item-1 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-01.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">NovaWave LLC</a>
                        </h6>
                        <p class="fs-13 mb-0">14 Sep 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">+$245</h6>
                      <p class="fs-13 mb-0">Basic (Monthly)</p>
                    </div>
                  </div>
                  <!-- Item-2 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-02.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">BlueSky</a>
                        </h6>
                        <p class="fs-13 mb-0">20 Mar 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">+$395</h6>
                      <p class="fs-13 mb-0">Enterprise (Yearly)</p>
                    </div>
                  </div>
                  <!-- Item-3 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-03.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">Silver Hawk</a>
                        </h6>
                        <p class="fs-13 mb-0">26 Mar 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">+$145</h6>
                      <p class="fs-13 mb-0">Advanced (Monthly)</p>
                    </div>
                  </div>
                  <!-- Item-4 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-04.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">Summit Peak</a>
                        </h6>
                        <p class="fs-13 mb-0">10 Feb 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">+$758</h6>
                      <p class="fs-13 mb-0">Enterprise (Monthly)</p>
                    </div>
                  </div>
                  <!-- Item-5 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-0">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-05.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">RiverStone Ltd</a>
                        </h6>
                        <p class="fs-13 mb-0">10 Jan 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">+$977</h6>
                      <p class="fs-13 mb-0">Premium (Yearly)</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Recent Transactions -->
            <!-- Recently Registered -->
            <div class="col-xxl-4 col-xl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                  <h5 class="mb-0 fs-16 fw-bold">Recently Registered</h5>
                  <a href="purchase-transaction.html" class="btn btn-primary btn-xs">View All</a>
                </div>
                <div class="card-body pb-2">
                  <!-- Item-1 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-07.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">Bright Bridge Grp</a>
                        </h6>
                        <p class="fs-13 mb-0">Basic (Monthly)</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <p class="fs-14 mb-0">150 Users</p>
                      <h6 class="fw-normal text-truncate mb-0 fs-14">
                        <a href="https://crms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f1939396b19489909c819d94df929e9c">[email&#160;protected]</a>
                      </h6>
                    </div>
                  </div>
                  <!-- Item-2 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-08.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">CoastalStar Co.</a>
                        </h6>
                        <p class="fs-13 mb-0">2Enterprise (Yearly)</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <p class="fs-14 mb-0">200 Users</p>
                      <h6 class="fw-normal text-truncate mb-0 fs-14">
                        <a href="https://crms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="197a6a7a597c61787469757c377a7674">[email&#160;protected]</a>
                      </h6>
                    </div>
                  </div>
                  <!-- Item-3 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-09.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">HarborView</a>
                        </h6>
                        <p class="fs-13 mb-0">Advanced (Monthly)</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <p class="fs-14 mb-0">129 Users</p>
                      <h6 class="fw-normal text-truncate mb-0 fs-14">
                        <a href="https://crms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="066e7046637e676b766a632865696b">[email&#160;protected]</a>
                      </h6>
                    </div>
                  </div>
                  <!-- Item-4 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-10.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">Golden Gate Ltd</a>
                        </h6>
                        <p class="fs-13 mb-0">Enterprise (Monthly)</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <p class="fs-14 mb-0">103 Users</p>
                      <h6 class="fw-normal text-truncate mb-0 fs-14">
                        <a href="https://crms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e681818aa6839e878b968a83c885898b">[email&#160;protected]</a>
                      </h6>
                    </div>
                  </div>
                  <!-- Item-5 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-0">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-11.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">Redwood Inc</a>
                        </h6>
                        <p class="fs-13 mb-0">Premium (Yearly)</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <p class="fs-14 mb-0">109 Users</p>
                      <h6 class="fw-normal text-truncate mb-0 fs-14">
                        <a href="https://crms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d1a3a691b4a9b0bca1bdb4ffb2bebc">[email&#160;protected]</a>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Recent Registered -->
            <!-- Recent Plan Expired -->
            <div class="col-xxl-4 col-xl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                  <h5 class="mb-0 fs-16 fw-bold">Recently Plan Expired</h5>
                  <a href="purchase-transaction.html" class="btn btn-primary btn-xs">View All</a>
                </div>
                <div class="card-body pb-2">
                  <!-- Item-1 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-12.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">VK Pvt Ltd </a>
                        </h6>
                        <p class="fs-13 mb-0">14 Sep 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">
                        <a href="javascript:void(0);" class="text-decoration-underline text-info">Send Reminder</a>
                      </h6>
                      <p class="fs-13 mb-0">Basic (Monthly)</p>
                    </div>
                  </div>
                  <!-- Item-2 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-13.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">RiverStone Ltd</a>
                        </h6>
                        <p class="fs-13 mb-0">20 Mar 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">
                        <a href="javascript:void(0);" class="text-decoration-underline text-info">Send Reminder</a>
                      </h6>
                      <p class="fs-13 mb-0">Enterprise (Yearly)</p>
                    </div>
                  </div>
                  <!-- Item-3 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-14.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">Summit Peak</a>
                        </h6>
                        <p class="fs-13 mb-0">26 Mar 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">
                        <a href="javascript:void(0);" class="text-decoration-underline text-info">Send Reminder</a>
                      </h6>
                      <p class="fs-13 mb-0">Advanced (Monthly)</p>
                    </div>
                  </div>
                  <!-- Item-4 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-4">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-15.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">Redwood Inc</a>
                        </h6>
                        <p class="fs-13 mb-0">10 Feb 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">
                        <a href="javascript:void(0);" class="text-decoration-underline text-info">Send Reminder</a>
                      </h6>
                      <p class="fs-13 mb-0">Enterprise (Monthly)</p>
                    </div>
                  </div>
                  <!-- Item-5 -->
                  <div class="d-sm-flex justify-content-between flex-wrap mb-0">
                    <div class="d-flex align-items-center">
                      <a href="javscript:void(0);" class="avatar avatar-md border rounded-circle flex-shrink-0">
                        <img src="assets/img/icons/company-icon-16.svg" class="img-fluid w-auto h-auto" alt="img">
                      </a>
                      <div class="ms-2 flex-fill">
                        <h6 class="fw-medium text-truncate mb-1 fs-14">
                          <a href="javscript:void(0);">NovaWave LLC</a>
                        </h6>
                        <p class="fs-13 mb-0">10 Jan 2025</p>
                      </div>
                    </div>
                    <div class="text-sm-end mb-0">
                      <h6 class="fw-medium text-truncate mb-1 fs-14">
                        <a href="javascript:void(0);" class="text-decoration-underline text-info">Send Reminder</a>
                      </h6>
                      <p class="fs-13 mb-0">Premium (Yearly)</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Recent Plan Expired -->
          </div>
          <!-- end row -->
        </div>
        <!-- End Content -->
        <!-- Start Footer -->
        <footer class="footer d-block d-md-flex justify-content-between text-md-start text-center">
          <p class="mb-md-0 mb-1">Copyright &copy; <script data-cfasync="false" src="https://crms.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script type="757ec7b235694c75d7bee332-text/javascript">
              document.write(new Date().getFullYear())
            </script>
            <a href="javascript:void(0);" class="link-primary text-decoration-underline">CRMS</a>
          </p>
          <div class="d-flex align-items-center gap-2 footer-links justify-content-center justify-content-md-end">
            <a href="javascript:void(0);">About</a>
            <a href="javascript:void(0);">Terms</a>
            <a href="javascript:void(0);">Contact Us</a>
          </div>
        </footer>
        <!-- End Footer -->
      </div>
      <!-- ========================
        End Page Content
    ========================= -->
    </div>
    <!-- End Main Wrapper -->
    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.1.min.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <!-- Simplebar JS -->
    <script src="assets/plugins/simplebar/simplebar.min.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <!-- Daterangepicker JS -->
    <script src="assets/js/moment.min.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <script src="assets/plugins/flatpickr/flatpickr.min.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <!-- Apexchart JS -->
    <script src="assets/plugins/apexchart/apexcharts.min.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <script src="assets/plugins/apexchart/chart-data.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <!-- Chart JS -->
    <script src="assets/plugins/peity/jquery.peity.min.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <script src="assets/plugins/peity/chart-data.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <!-- Select2 JS -->
    <script src="assets/plugins/select2/js/select2.min.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <!-- Main JS -->
    <script src="assets/js/script.js" type="757ec7b235694c75d7bee332-text/javascript"></script>
    <script src="https://crms.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="757ec7b235694c75d7bee332-|49" defer></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"3ca157e612a14eccbb30cf6db6691c29","server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
  </body>
</html>