<?php
include("dbcon.php");
if(isset($_REQUEST['submit']))
{
  $sql="insert into tbl_cakes (CAKEID,Name,PRICE) values('". $_REQUEST["CAKEID"] ."',
      '". $_REQUEST["Name"] ."',". $_REQUEST["Price"] .")";
  mysqli_Query($conn,$sql);
  if(mysqli_affected_rows($conn))
  {
    echo "<script>alert('New Cake added succesfully!!!');</script>";
  }
  else
  {
    echo "<script>alert('New Cake not added!!');</script>";
  }  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KDBacks | Cake</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar  elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
          <b><span class="BrandLink" style="color:red">KDBACKS</span></b>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="index.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Cake.php" class="nav-link active">
                <i class=" fas fa-birthday-cake nav-icon"></i>
                <p>Cake</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Cake</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Cake </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Add New</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">New Cake</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal" action="Cake.php" method="post">
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="CAKEID " class="col-sm-2 col-form-label">ID</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="CAKEID" name="CAKEID" placeholder="CAKE ID" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="CAKEName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="CAKE Name" required>
                          </div>
                        </div>
                        <div class="form-group row">
                         <label for="CAKEPrice " class="col-sm-2 col-form-label"> Price</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" id="Price" name="Price" placeholder="CAKE Price" required>
                         </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-info">Save</button>
                      </div>
                    </form>
                    </div>
                 </div>
               </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="jumbotron">
                <table id="cake" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("dbcon.php");
                    $sql2 = "SELECT CakeID, Name, Price FROM tbl_cakes";
                    $result = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result) > 0) 
                    {
                      while($row = mysqli_fetch_assoc($result))
                      {
                        echo "<tr>
                                <td>". $row["CakeID"] ."</td>
                                <td>". $row["Name"] . "</td>
                                <td>". $row["Price"] . "</td>
                              </tr>";
                      }
                    } 
                    else 
                    {
                      echo "<tr>
                             <td colspan='3'>No Data Found</td>
                           </tr>";
                    }
                      
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script>
      $(document).ready(function(){
        $("#cake").DataTable();
      });
    </script>
    <style>
      #cake_length{
        float:right;
      }
      #cake_paginate{
        float:right;
      }
    </style>
</body>

</html>