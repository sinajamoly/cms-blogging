<?php include "include/admin_header.php";?>

    <div id="wrapper">
    <?php if($connection) echo "conn"; ?>
        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>
                    <?php 
                            if(isset($_GET['source'])){
                                $source=$_GET['source'];    
                            }else{
                                $source='';
                            }
                            switch($source){ 
                                    case 'view_all_post';
                                    include "include/view_all_post.php";
                                    break;
                                    
                                    case 'post_comments';
                                    include "include/post_comments.php";
                                    break;
                                    
                                default:
                                    include "include/view_all_comments.php";
                                    break;
                                    
                            }
                            
                        ?>
   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"?>