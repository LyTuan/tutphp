<?php
    require_once __DIR__."\..\..\autoload\autoload.php";
    $category = $db->fetchAll("category");
    


?>
<?php require_once __DIR__."\..\..\layouts\header.php" ?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Danh mục</li>
        </ol>

        <!-- Page Content -->
        <h1>Danh sách danh muc</h1>
        <hr>
        <p>This is a great starting point for new custom pages.</p>
        <?php var_dump($category) ?>
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