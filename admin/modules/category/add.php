<?php
require_once __DIR__."\..\..\autoload\autoload.php";
$category = $db->fetchAll("category");



?>
<?php require_once __DIR__."\..\..\layouts\header.php" ?>
<div id="content-wrapper">

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Thêm mới danh mục

        </h1>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <i class="fa fa-dashboard"></i><a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Danh mục</li>
        </ol>

      </div>
    </div>


    <!-- Page Content -->                
    <div class="row">
      <div class="col-md-12">
        <form method="POST">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-offset-2 col-sm-2 col-form-label">Tên danh mục</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Tên danh mục">
            </div>
          </div>   
          <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Lưu</button>
            </div>
          </div>
        </form>
      </div>
    </div>




  </div>
  <!-- /.container-fluid -->

  <!-- Sticky Footer -->
  <footer class="sticky-footer">
    <div class="container my-auato">
      <div class="copyright text-center my-auto">
        <span>Copyright © Your Website 2019</span>
      </div>
    </div>
  </footer>

</div>
<!-- /.content-wrapper -->

<?php require_once __DIR__."\..\..\layouts\\footer.php" ?>