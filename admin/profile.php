<?php include "include/admin_header.php";?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>
        <?php
            if(isset($_SESSION['username'])){
                $username =$_SESSION['username'];
                    $query="SELECT * FROM users WHERE user_username='{$username}'";
            $select_user_by_id=mysqli_query($connection,$query);
            if($select_user_by_id){
                while($row=mysqli_fetch_assoc($select_user_by_id)){
                                            
                                                $user_username=$row['user_username'];
                                                $user_password=$row['user_password'];
                                                $user_firstname=$row['user_firstname'];
                                                $user_lastname=$row['user_lastname'];
                                                $user_email=$row['user_email'];
                                                $user_role=$row['user_role'];

                            }
                }
                else{
                    echo "notting have been found";
                }
            }

    
        ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php echo $user_username; ?></small>
                        </h1>
   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
<!--        _____________________________________-->
       
       

    <div id="wrapper">

        <!-- Navigation -->
 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


                        
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                                <label for="title">User Name</label>
                                <input class="form-controll" type="text" name="user_username" value='<?php echo $user_username; ?>'>
                            </div>
                            
                            <div class="form-group">
                                <label for="post_category_id">Password</label>
                                <input class="form-controll" type="text" name="user_password" value='<?php echo $user_password; ?>'>
                            </div>
                            
                            <div class="form-group">
                                <label for="post_auther">First Name</label>
                                <input class="form-controll" type="text" name="user_firstname" value='<?php echo $user_firstname; ?>'>
                            </div>
                            
                            <div class="form-group">
                                <label for="post_status">last name</label>
                                <input class="form-controll" type="text" name="user_lastname" value='<?php echo $user_lastname; ?>'>
                            </div>
                           
                           <div class="form-group">
                                <label for="post_status">email</label>
                                <input class="form-controll" type="text" name="user_email" value='<?php echo $user_email; ?>'>
                            </div> 
                            
                            <div class="form-group">
                                <label for="post_tags">Role</label>
                                <input class="form-controll" type="text" name="user_role" value='<?php echo $user_role; ?>'>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile Picture">
                            
                            </div>
                            
                        </form>
                        <?php
                            if(isset($_POST['edit_user'])){
                                
                                $username =$_SESSION['username'];
                                echo $username;       
                                        $user_username=$_POST['user_username'];
                                        $user_password=$_POST['user_password'];
                                        $user_firstname=$_POST['user_firstname'];
                                        $user_lastname=$_POST['user_lastname'];
                                        $user_email=$_POST['user_email'];
                                        $user_role=$_POST['user_role'];
                                $queryUpdate="UPDATE users SET ";
                                $queryUpdate .="user_username='{$user_username}', ";
                                $queryUpdate .="user_firstname='{$user_firstname}', ";
                                $queryUpdate .="user_lastname='{$user_lastname}', ";
                                $queryUpdate .="user_password='{$user_password}', ";
                                $queryUpdate .="user_email='{$user_email}', ";
                                $queryUpdate .="user_role='{$user_role}' ";
                                $queryUpdate .="WHERE user_username='{$username}'";
                                $resultBool=mysqli_query($connection,$queryUpdate);
                            }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       
<!--       _______________________________________-->
        
        
        
        
        

<?php include "include/admin_footer.php"?>