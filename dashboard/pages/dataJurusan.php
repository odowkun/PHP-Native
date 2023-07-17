<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginForm\login.php");
    exit;
}
?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Data Jurusan - SIPENMARU PNB</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link
      rel="icon"
      type="image/x-icon"
      href="../assets/img/avatars/logoPNB.png"
    />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link
      rel="stylesheet"
      href="../assets/vendor/css/core.css"
      class="template-customizer-core-css"
    />
    <link
      rel="stylesheet"
      href="../assets/vendor/css/theme-default.css"
      class="template-customizer-theme-css"
    />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link
      rel="stylesheet"
      href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"
    />

    <link
      rel="stylesheet"
      href="../assets/vendor/libs/apex-charts/apex-charts.css"
    />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside
          id="layout-menu"
          class="layout-menu menu-vertical menu bg-menu-theme"
        >
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2"
                >SIPENMARU</span
              >
            </a>

            <a
              href="javascript:void(0);"
              class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none"
            >
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="MasterData">Master Data</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a
                    href="dataJurusan.php"
                    class="menu-link"
                  >
                    <div data-i18n="Basic">Data Jurusan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="pages-maintenance.html"
                    class="menu-link"
                  >
                    <div data-i18n="Basic">Data Prodi</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="pages-maintenance.html"
                    class="menu-link"
                  >
                    <div data-i18n="Account">Setting Account</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="CalonMahasiswa">Calon Mahasiswa</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pages-maintenance.html" class="menu-link">
                    <div data-i18n="DataCalonMHS">Data Calon Mahasiswa</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-maintenance.html" class="menu-link">
                    <div data-i18n="RiwayatPendidikan">Riwayat Pendidikan</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="pages-maintenance.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="DataSipenmaru">Data Sipenmaru</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="pages-maintenance.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="LaporanData">Laporan Data</div>
              </a>
            </li>
            <!-- Logout -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text"></span>
            </li>
            <li class="menu-item">
              <a
                href="..\..\loginForm\logout.php"
                class="menu-link"
              >
                <i class="bx bx-power-off me-2"></i>
                <div data-i18n="Logout">Log Out</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div
              class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none"
            >
              <a
                class="nav-item nav-link px-0 me-xl-4"
                href="javascript:void(0)"
              >
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div
              class="navbar-nav-right d-flex align-items-center"
              id="navbar-collapse"
            >
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                  >
                    <div class="avatar avatar-online">
                      <img
                        src="../assets/img/avatars/avatar2.png"
                        alt="user"
                        class="w-px-40 h-auto rounded-circle"
                      />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img
                                src="../assets/img/avatars/avatar2.png"
                                alt=""
                                class="w-px-40 h-auto rounded-circle"
                              />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="..\..\loginForm\logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <center><h1 class="h3 mb-2 text-gray-800">Data Jurusan</h1></center>
                <hr>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable">
                    <thead align="center">
                      <tr>
                        <th>NO</th>
                        <th>Kode Jurusan</th>
                        <th>Nama Jurusan</th>
                        <th>SK Jurusan</th>
                        <th>Ketua Jurusan</th>
                        <th>Keterangan</th>
                        <th>OPSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../../config.php';
                      $no = 1;
                      $data = mysqli_query($link, "select * from tb_jurusan");
                      while ($dataArray = mysqli_fetch_array($data)) :
                        $_GET['Kode_Jurusan'] = $dataArray['Kode_Jurusan'];
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $dataArray['Kode_Jurusan']; ?></td>
                          <td><?php echo $dataArray['Nama_jurusan']; ?></td>
                          <td><?php echo $dataArray['SK_Jurusan']; ?></td>
                          <td><?php echo $dataArray['Ketua_Jurusan']; ?></td>
                          <td><?php echo $dataArray['Keterangan']; ?></td>
                          <td align="center">
                            <div style='width: 68px; margin-bottom: 6px;'>
                              <a type="button" class="btn btn-primary btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editData<?= $dataArray['Kode_Jurusan'] ?>">
                                EDIT
                              </a>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm">
                              <a style=" text-decoration:none; color: white" href="hapus_jurusan.php?Kode_Jurusan=<?= $dataArray['Kode_Jurusan']; ?>" >DELETE</a>
                            </button>
                          </td>
                        </tr>
                        <div class="modal fade" id="editData<?= $dataArray['Kode_Jurusan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="update_jurusan.php">
                                  <div class="mb-2">
                                    <label class="form-label">Kode Jurusan</label>
                                    <input class="form-control" type="text" name="Kode_Jurusan" value="<?= $dataArray['Kode_Jurusan']; ?>" readonly>
                                  </div>
                                  <div class="mb-2">
                                    <label class="form-label">Nama Jurusan</label>
                                    <input class="form-control" type="text" name="Nama_jurusan" value="<?= $dataArray['Nama_jurusan']; ?>">
                                  </div>
                                  <div class="mb-2">
                                    <label class="form-label">SK Jurusan</label>
                                    <input class="form-control" type="text" name="SK_Jurusan" value="<?= $dataArray['SK_Jurusan']; ?>">
                                  </div>
                                  <div class="mb-2">
                                    <label class="form-label">Ketua Jurusan</label>
                                    <input class="form-control" type="text" name="Ketua_Jurusan" value="<?= $dataArray['Ketua_Jurusan']; ?>">
                                  </div>
                                  <div class="mb-2">
                                    <label class="form-label">Keterangan</label>
                                    <input class="form-control" type="text" name="Keterangan" value="<?= $dataArray['Keterangan']; ?>">
                                  </div>
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php
                      endwhile;
                      ?>
                    </tbody>
                  </table>
                </div>
              
              <div class="buttontrigered">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahData">
                  <i class="fas fa-plus "> Tambah Data</i>
                </button>
              </div> 
              <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Jurusan</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="tambah_jurusan.php">
                        <div class="mb-2">
                          <label class="form-label">Nama Jurusan</label>
                          <input type="text" name="Nama_jurusan" class="form-control">
                        </div>
                        <div class="mb-2">
                          <label class="form-label">SK_Jurusan</label>
                          <input type="text" name="SK_Jurusan" class="form-control">
                        </div>
                        <div class="mb-2">
                          <label class="form-label">Ketua Jurusan</label>
                          <input type="text" name="Ketua_Jurusan" class="form-control">
                        </div>
                        <div class="mb-2">
                          <label class="form-label">Keterangan</label>
                          <input type="text" name="Keterangan" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            </div>
            
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div
                class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column"
              >
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , Modified with ❤️ by
                  <a
                    href="https://themeselection.com"
                    class="footer-link fw-bolder"
                    >Anan</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
