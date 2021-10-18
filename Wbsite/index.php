<?php session_start(); include"resourch.php";
if ($_SESSION['nama'] = "") {
    header("location:index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Earn To Money</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">EARN COINS</div>
                            <a class="nav-link" href="shortlink.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Shortlink
                            </a>
                            <a class="nav-link" href="view ads.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                View ads
                            </a>
                            <a class="nav-link" href="whidraw.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                withdraw
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Account</div>
                        <?php
                               $email =  $_SESSION['email'];
                               $nama = mysqli_query($conn, "SELECT `Nama` FROM `database-user` WHERE Email = '$email'" );
                               while ($tampil = mysqli_fetch_array($nama)) {
                                   echo "$tampil[Nama]";
                                   echo $email;
                               }
                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <?php
                                    // Weekly
                                        $Hasil = mysqli_query($conn, "SELECT `Email`, `Senin`, `Selasa`, `Rabu`, `Kamis`, `Jumat`, `Sabtu`, `Minggu` FROM `hasil mingguan` WHERE Email = '$email'" );
                                        while ($tampil2 = mysqli_fetch_array($Hasil)) {
                                            ?>
                                                <input type="hidden" name="Senin" id="Senin" value="<?php echo "$tampil2[Senin]"; ?>">
                                                <input type="hidden" name="Senin" id="Selasa" value="<?php echo "$tampil2[Selasa]"; ?>">
                                                <input type="hidden" name="Senin" id="Rabu" value="<?php echo "$tampil2[Rabu]"; ?>">
                                                <input type="hidden" name="Senin" id="Kamis" value="<?php echo "$tampil2[Kamis]"; ?>">
                                                <input type="hidden" name="Senin" id="Jumat" value="<?php echo "$tampil2[Jumat]"; ?>">
                                                <input type="hidden" name="Senin" id="Sabtu" value="<?php echo "$tampil2[Sabtu]"; ?>">
                                                <input type="hidden" name="Senin" id="Minggu" value="<?php echo "$tampil2[Minggu]"; ?>">
                                            <?php
                                        }
                                    ?>
                                    <div class="card-header">
                                        Data Hasil Mingguan
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="20"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Whidraw
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Prince</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Prince</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $sql = "SELECT `Email`, `Nama`, `Tanggal`, `Prince` FROM `withdraw` WHERE Email = '$email'";
                                                $view = mysqli_query($conn, $sql);
                                                while ($Table = mysqli_fetch_array($view)) {
                                                ?>
                                            <td><?php echo "$Table[Nama]"; ?></td>
                                            <td><?php echo "$Table[Tanggal]"; ?></td>
                                            <td><?php echo "$Table[Prince]"; ?></td>
                                        <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/jquery.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
