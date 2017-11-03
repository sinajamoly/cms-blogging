

    <div id="wrapper">

        <!-- Navigation -->


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        
                        
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                                <label for="title">FirstName</label>
                                <input class="form-controll" type="text" name="user_firstname">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_category_id">Last Name</label>
                                <input type="text" class="form-control" name="user_lastname">
                            </div>
                            
                            <div class="form-group">
                                <label for="user_role">Role</label>
                                <select name="user_role" id="">
                                    <option value="subscriber">Select Option</option>
                                    <option value="admin">Admin</option>
                                    <option value="subscriber">Subscriber</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="post_auther">User Name</label>
                                <input class="form-controll" type="text" name="user_username">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_status">Email</label>
                                <input class="form-controll" type="email" name="user_email">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_status">Password</label>
                                <input class="form-controll" type="password" name="user_password">
                            </div>
                            
                            
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- /.row -->
                            <?php 
                            if(isset($_POST['create_user'])){
                                $user_firstname=$_POST['user_firstname'];
                                $user_lastname=$_POST['user_lastname'];
                                $user_role=$_POST['user_role'];
                                $user_username=$_POST['user_username'];
                                $user_email=$_POST['user_email'];

                                $user_password=$_POST['user_password'];
                                $user_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));  
                                $query="INSERT INTO users (user_firstname,user_lastname,user_role,user_username,user_email,user_password) ";
                                $query .="VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$user_username}','{$user_email}','{$user_password}') ";
                                $result=mysqli_query($connection,$query);
                                if(!$result){
                                    echo mysqli_error($connection);
                                }else{
                                    echo "user Created: ". " " . "<a href='users.php'>". " View Users" . " </a>";
                                }
                            }
                            
                            
                        ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"?>