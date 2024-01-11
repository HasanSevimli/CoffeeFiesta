<!DOCTYPE html>
<html lang="en">
<?php
session_start();

$kullaniciID = isset($_SESSION['Kullanici']) ? $_SESSION['Kullanici'] : null;

if ($kullaniciID === null) {

    echo "Hata: Kullanıcı ID tanımlı değil.";
    exit();
}

include 'db.php';

$siparislerQuery = $DBConnection->prepare("SELECT * FROM siparis WHERE kullaniciID = ?");
$siparislerQuery->execute([$kullaniciID]);

if ($siparislerQuery->rowCount() > 0) {
    $siparisler = $siparislerQuery->fetchAll(PDO::FETCH_ASSOC);
} else {

    echo "Hata: Kullanıcıya ait sipariş bulunamadı.";
    header("refresh:3, url=dashboard.php");
    exit();
}
?>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Now UI Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

</head>
<body class="">
    <div class="wrapper">
        <?php
        require "sidebar.php";
        require "navbar.php";
        ?>
        <div class="content" style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;">
    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfB58KTOyxQxDCOjOD4AJSXnjIudrEXPN-U1Cz2CewawtAtbA/viewform?embedded=true" width="80%" height="80%" frameborder="0" marginheight="0" marginwidth="0" style="display: block; margin: 0 auto;">Yükleniyor…</iframe>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <div class="table-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require "footer.php";
        ?>
    </div>

    <!-- Core JS Files -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Notifications Plugin -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
</body>
</html>