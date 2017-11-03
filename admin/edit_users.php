<?php
    if(isset($_GET['user_id'])){
        $u_id =$_GET['user_id'];
            $query="SELECT * FROM users WHERE user_id='{$u_id}'";
    $select_user_by_id=mysqli_query($connection,$query);
    if($select_user_by_id){
        while($row=mysqli_fetch_assoc($select_user_by_id)){
                                        $user_id=$row['user_id'];
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
                                <select name="user_role" id="">
                                    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                                    <?php 
                                        if($user_role=='admin'){
                                            echo "<option value='subscriber'>subscriber</option>";
                                        }else{
                                            echo "<option value='admin'>admin</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="edit_user" value="Publish">
                            </div>
                            
                        </form>
                        <?php
                            if(isset($_POST['edit_user'])){
                                $u_id =$_GET['user_id'];
                                       
                                        $user_username=$_POST['user_username'];
                                        $user_password=$_POST['user_password'];
                                        $user_firstname=$_POST['user_firstname'];
                                        $user_lastname=$_POST['user_lastname'];
                                        $user_email=$_POST['user_email'];
                                        $user_role=$_POST['user_role'];
                                if(!empty($user_password)){
                                    $query_password="SELECT user_password FROM users WHERE user_id={$u_id}";
                                    $get_users=mysqli_query($connection,$query_password);
                                    $row=mysqli_fetch_array($get_users);
                                    $db_user_password=$row['user_password'];
                                    if( $user_password != $db_user_password){
                                        $user_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));  
                                    }
                                
                                $queryUpdate="UPDATE users SET ";
                                $queryUpdate .="user_username='{$user_username}', ";
                                $queryUpdate .="user_firstname='{$user_firstname}', ";
                                $queryUpdate .="user_lastname='{$user_lastname}', ";
                                $queryUpdate .="user_password='{$user_password}', ";
                                $queryUpdate .="user_email='{$user_email}', ";
                                $queryUpdate .="user_role='{$user_role}' ";
                                $queryUpdate .="WHERE user_id=$u_id";
                                $resultBool=mysqli_query($connection,$queryUpdate);
                            }
                            }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

