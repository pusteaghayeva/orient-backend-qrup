<?php
session_start();
if($_SESSION['logged_in'] == 1)
{
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
                    <h1 class="h3 mb-2 text-gray-800">Rəssamlar Siyahı</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rəssamlar Siyahı</h6>
                        </div>
                        
                        <div class="card-body">
                           <div class="table-responsive">
                              <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                 <div class="col-12 col-sm-6 col-md-8">
                                            Siyahı
                                        </div>
                                        <div class="col-6 col-md-4">
                                        
                                            <a href="form-slides.php" ><img src="../uploads/add9.png" style="width: 40px; height:40px; margin:  20px; margin-left:80px;"></a>
                                            <a href="#" ><img src="../uploads/delete2.jpg" style="width: 40px; margin:  20px;  margin-left:90px;"></a>
                                            
                                        </div>
                                    <div class="col-sm-12">
                                       <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                          <thead>
                                             <tr role="row">
                                               
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 38px;">Ad</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 38px;">Soyad</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 288px;">Şəkil</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 288px;">Əsər</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 179px;">Məlumat</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 163px;">Əməliyyatlar</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                                include '../config/config.php';
                                                include '../config/vars.php';
                                                $select_sql = "SELECT * FROM orient_ressamlar.slider_translation xy 
                                                               INNER JOIN orient_ressamlar.slider x ON xy.slider_id=x.id 
                                                               Where xy.lang_id = 1 and x.status=1;";
                                                $result     = mysqli_query($conn,$select_sql);
                                                while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
                                                    ?>
                                                <tr role="row" class="even">
                                                
                                                <td><?=$row['name'];?></td>
                                                <td><?=$row['surname'];?></td>
                                                <td><img src="../uploads/<?=$row['image'];?>" class="img-thumbnail" width="150px" height="150px"></td>
                                                <td class="sorting_1"><?=$row['text'];?></td>               
                                                <td><?=$row['about'];?></td>

                                                <td>
                                                  <a href="edit-news.php?news=<?=$row['id'];?>"   class="btn btn-success">Redakte et</a>
                                                  <a href="delete-news.php?news=<?=$row['id'];?>" class="btn btn-danger">Sil</a>
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