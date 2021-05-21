<?php
session_start();
if ($_SESSION['logged_in'] == 1) {
    include '../config/config.php';
    include 'functions/functions.php';
    $post_type = (isset($_GET['id'])) ? 'edit' : 'create';

    if ($_SERVER['REQUEST_METHOD'] = 'POST') {
        if (isset($_POST['post-type']) and !empty($_POST['post-type']) and $_POST['post-type'] == 'create') {
            $name           = (isset($_POST['name'])) ? trim($_POST['name']) : '';
            $surname        = (isset($_POST['surname'])) ? trim($_POST['surname']) : '';
            $image          = uploadImage($_FILES['image']);
            $status         = (isset($_POST['status'])) ? intval($_POST['status']) : 0;
            $translation    = (isset($_POST['translation'])) ? $_POST['translation'] : [];

            $insert_slider  = "INSERT INTO `slider`(`name`,`surname`,`image`,`status`) VALUES ('$name','$surname', '$image', '$status')";
            $result_insert  = mysqli_query($conn, $insert_slider);
            if ($result_insert) {
                $menu_id = mysqli_insert_id($conn);
                foreach ($translation as $key => $value) {
                    $insert_translation    = "INSERT INTO `slider_translation`(`slider_id`,`lang_id`,`text`,`about`) VALUES ('$menu_id','$key','" . $value['text'] . "','" . $value['about'] . "')";
                    mysqli_query($conn, $insert_translation);
                }
            }
        }
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
                        <h1 class="h3 mb-2 text-gray-800">Menyu əlavə et</h1>
                        <br>
                        <!-- DataTales Example -->
                        <form action="form-slides.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-4 form-section" style="margin: 30px 0;">
                                    <br>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="form-label">Rəssamın adı</label>
                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="form-label">Soyadı</label>
                                        <input type="text" name="surname" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Şəkil</label>
                                        <input id="uploadImage" style="align-items: center; margin: 10px;" onchange="PreviewImage();" type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                        <img onclick="clearImg();" src="../uploads/dlt.png" style="width:40px; height:40px; margin:10px; text-align:center;" alt="">
                                        <?php
                                        if (empty($row['image']))
                                            echo "<img id='previewImage' src='../uploads/noPhoto.png' class='img-thumbnail' width='250px'; height='250px'>";
                                        else
                                            echo "<img id='previewImage' src='../uploads/" . $row['image'] . "' class='img-thumbnail' width='250px'; height='250px'>";
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                                            <option value="0">Deaktiv</option>
                                            <option selected value="1">Aktiv</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <?php
                                            $select_sql  = "SELECT * FROM `languages` WHERE `status`=1";
                                            $result      = mysqli_query($conn, $select_sql);
                                            while ($row  = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            ?>
                                                <a class="nav-item nav-link <?php if ($row['code'] == 'az') echo 'active' ?>" id="nav-<?= $row['code']; ?>-tab" data-toggle="tab" href="#nav-<?= $row['code']; ?>" role="tab" aria-controls="nav-<?= $row['code']; ?>" aria-selected="true"><?= $row['name']; ?></a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <?php
                                        $select_sql  = "SELECT * FROM `languages` WHERE `status`=1";
                                        $result      = mysqli_query($conn, $select_sql);
                                        while ($row  = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        ?>
                                            <div class="tab-pane fade show <?php if ($row['code'] == 'az') echo 'active' ?>" id="nav-<?= $row['code']; ?>" role="tabpanel" aria-labelledby="nav-<?= $row['code']; ?>-tab">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1" class="form-label" style="margin: 10px 0;">Rəssamlar Birliyi</label>
                                                    <input type="text" name="translation[<?= $row['id'] ?>][text]" class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1" class="form-label">Rəssamın özü haqqında</label>
                                                    <input type="text" name="translation[<?= $row['id'] ?>][about]" class="form-control" id="exampleFormControlInput1">
                                                </div>


                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <input type="hidden" name="post-type" value="<?= $post_type; ?>">
                                    <div class="form-group" style="margin-top: 105px;">
                                        <button type="submit" class="btn btn-primary" style="margin-top:20px" value="Submit">Yadda saxla</button>
                                    </div>
                                </div>

                            </div>
                        </form>

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
        <script type="text/javascript">
            function PreviewImage() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                oFReader.onload = function(oFREvent) {
                    document.getElementById("previewImage").src = oFREvent.target.result;
                };
            };

            function clearImg() {
                document.getElementById("previewImage").src = '../uploads/noPhoto.png';
            }
        </script>

    </body>

    </html>

<?php

} else {
    header('Location: login.php');
}

?>