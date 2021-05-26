<?php
session_start();
if($_SESSION['logged_in'] == 1)
{
    include "../config/config.php"; 
    if(isset($_GET['id']) and !empty($_GET['id']))
    {
        $menu_id = intval($_GET['id']);
        mysqli_query($conn,"DELETE FROM `menu` WHERE `id`=$menu_id");
        mysqli_query($conn,"DELETE FROM `menu_translation` WHERE `menu_id`=$menu_id");
        header('menu.php');
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <?php include 'includes/head.php'; ?>

    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'includes/sidebar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'includes/topbar.php'; ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"> Menyu </h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> Menyu Siyahı</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                        <div class="col-12 col-sm-6 col-md-8">
                                            <a href="form-menu.php" ><img src="../uploads/create1.png" style="width: 40px; float:left; "></a>
                                        </div>
                                        <div class="col-6 col-md-4">
                                           
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 255px;">Menyu adı</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 163px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 163px; text-align:center;">Əməliyyatlar</th>
                                                </tr>
                                                </thead>
                                               
                                                <tbody>
                                                <?php
                                                include '../config/config.php';
                                                include '../config/vars.php';
                                                $select_sql = "SELECT * FROM orient_ressamlar.menu_translation mt 
                                                               INNER JOIN orient_ressamlar.menu m ON mt.menu_id=m.id 
                                                               Where mt.lang_id=1 and m.status=1;";
                                                $result     = mysqli_query($conn,$select_sql);
                                                while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
                                                    ?>
                                                    <tr role="row" class="even">
                                                     
                                                        <td class="sorting_1"><?=$row['name'];?></td>
                                                        <td class="sorting_1"><?=$row['status'];?></td>

                                                        <td>
                                                            <a href="form-menu.php?id=<?=$row['id'];?>" ><img style="width: 60px; height:50px; margin-left:  90px;" src="../uploads/edit8.jpg" alt=""></a>
                                                            <a href="menu.php?id=<?=$row['id'];?>" ><img style="width: 30px; height:30px;" src="../uploads/delete11.jpg" alt=""></a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include 'includes/content-footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'includes/footer.php'; ?>


    </body>

    </html>

    <?php
}else{
    header('Location: login.php');
}
?>