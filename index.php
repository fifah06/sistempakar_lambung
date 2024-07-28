<?php
session_start();
// koneksi data base
include "config.php"
?>

<!-- awal html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
        <link rel="stylesheet" href="style.css">
    <!-- hover -->
        <style>
        .nav-link:hover {
        color: aqua !important;
        }
        </style>
    <!-- bootstrap  css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- datatables css -->
        <link rel="stylesheet" href="assets/css/datatables.min.css">
    <!-- font awesome css -->
        <link rel="stylesheet" href="assets/css/all.css">
    <!-- chosen css -->
        <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
<title>Pakar</title>
</head>
<!-- navbar -->
    <body class="vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
            <a class="navbar-brand fs-5" href="#"><span style="color: biru">SISTEM</span> PAKAR</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul  class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
    <!-- setting hak akses -->
      <?php 
        if($_SESSION['role']=="Admin") {
      ?>

          <li class="nav-item active">
            <a class="nav-link" href="?page=users">Users</a>
          </li>  
          <li class="nav-item active">
              <a class="nav-link" href="?page=gejala">Gejala</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="?page=penyakit">Penyakit</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="?page=aturan">Basis Aturan</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="?page=diagnosa_adm">Diagnosa</a>
          </li>

        <?php  
           }else { 
        ?>

            <li class="nav-item active">
              <a class="nav-link" href="?page=diagnosa">Diagnosa</a>
            </li>

        <?php
           }
        ?>
            <li class="nav-item active">
              <a class="nav-link" href="?page=logout">Logout</a>
            </li>
  </ul>
</nav>
        
        <!-- setting menu -->
<div class="container mt-5 mb-5">


<!--cek status login-->
<?php 
    if($_SESSION['status']!="y"){
        header("Location:login.php");
    }
?>

    <?php

        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page==""){
            include "welcome.php";
        }elseif ($page=="gejala"){
            if ($action==""){
                include "tampil_gejala.php";
            }elseif ($action=="tambah"){
                include "tambah_gejala.php";
            }elseif ($action=="update"){
                include "update_gejala.php";
            }else{
                include "hapus_gejala.php";
            }
        }elseif ($page=="penyakit"){
            if ($action==""){
                include "tampil_penyakit.php";
            }elseif ($action=="tambah"){
                include "tambah_penyakit.php";
            }elseif ($action=="update"){
                include "update_penyakit.php";
            }else{
                include "hapus_penyakit.php";
            }    
        }elseif ($page=="aturan"){
            if ($action==""){
                include "tampil_aturan.php";
            }elseif ($action=="tambah"){
                include "tambah_aturan.php";
            }elseif ($action=="detail"){
                include "detail_aturan.php";
            }elseif ($action=="update"){
                include "update_aturan.php";
            }elseif ($action=="hapus_gejala"){
                include "hapus_detail_aturan.php";
            }else{
                include "hapus_aturan.php";
            }
        }elseif ($page=="diagnosa"){
            if ($action==""){
                include "tampil_diagnosa.php";
            }else{
                include "hasil_diagnosa.php";
            } 
        }elseif ($page=="diagnosa_adm"){
            if ($action==""){
                include "tampil_diagnosa_adm.php";
            }else{
                include "detail_diagnosa_adm.php";
            }
        }elseif ($page=="users"){
            if ($action==""){
                include "tampil_users.php";
            }elseif ($action=="tambah"){
                include "tambah_users.php";
            }elseif ($action=="update"){
                include "update_users.php";
            }else{
                include "hapus_users.php";
            }               
        }else{
            include "logout.php";
        }
    ?>
</div>

<!-- jquery -->
    <script src="assets/js/jquery-3.7.0.min.js"></script>
<!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
<!-- datatables js -->
    <script src="assets/js/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable()
            });        
        </script>
<!-- Font awesome js -->
    <script src="assets/js/all.js"></script>
<!-- chosen js -->
    <script src="assets/js/chosen.jquery.min.js"></script>
        <script>
            $(function() {
                $('.chosen').chosen();
            });
        </script>

    </body>
</html>