<?php
session_start();
if($_SESSION['logged_in'] == 1)
{
    include "../config/config.php"; 
    if(isset($_GET['id']) and !empty($_GET['id']))
    {
        $slider_id = intval($_GET['id']);
        mysqli_query($conn,"DELETE FROM `slider` WHERE `id`=$slider_id");
        mysqli_query($conn,"DELETE FROM `slider_translation` WHERE `slider_id`=$slider_id");
        header("Location: slides.php");
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

            <div id="content">

               <?php include 'includes/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Siyahı Slayder</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Siyahı  Slayder</h6>
                        </div>
                        
                        <div class="card-body">
                           <div class="table-responsive">
                              <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                 <div class="col-12 col-sm-6 col-md-8">
                                            <a href="form-slides.php" ><img src="../uploads/create2.png" style="width: 40px; height:40px; margin:  15px; "></a>
                                </div>
                                    <div class="col-sm-12">
                                       <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                          <thead>
                                             <tr role="row">
                                             <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 288px;">Şəkil</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 38px;">Ad və soyad</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 288px;">Başlıq</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 163px;text-align:center;">Əməliyyatlar</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                                include '../config/config.php';
                                                // include '../config/vars.php';
                                                $select_sql = "SELECT * FROM orient_ressamlar.slider_translation xy 
                                                               INNER JOIN orient_ressamlar.slider x ON xy.slider_id=x.id 
                                                               Where xy.lang_id = 1 and x.status=1  ORDER BY `id` desc";
                                                $result     = mysqli_query($conn,$select_sql);
                                                while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)){
                                                    ?>
                                                <tr role="row" class="even">
                                                <td>
                                                <?php
                                                        if(empty($row['image']))
                                                            echo "<img id='previewImage' src='../uploads/noPhoto.png' class='img-thumbnail' width='150px'; height='150px'>" ;
                                                        else
                                                            echo "<img id='previewImage' src='../uploads/".$row['image']."' class='img-thumbnail' width='150px'; height='150px'>" ;
                                                        ?>
                                                <td><?=$row['name'];?><span>  </span><?=$row['surname'];?></td>
                                                <!-- <td><?=$row['surname'];?></td> -->
                                               
                                                <td class="sorting_1"><?=$row['text'];?></td>               
                                                <!-- <td><?=$row['about'];?></td> -->

                                                <td style="position: relative;">
                                                    <div style="position:absolute; top:50%; left:50%; transform: translate(-50%, -50%);">
                                                        <a href="form-slides.php?id=<?=$row['id'];?>"><img src="../uploads/edit5.jpg" style="width=30px; height:30px;"></a>
                                                        <a href="slides.php?id=<?=$row['id'];?>"><img src="../uploads/deleteb.png" style="width=30px; height:30px;"></a>          
                                                    </div>
                                                  
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

            <?php include 'includes/content-footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'includes/footer.php'; ?>


</body>

</html>

<?php

} else {
  header('Location: login.php');
}

?>