                        <table class="table table-bordered table-hover">
                            
                        
                               <thead>
                               
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>email</th>
                                    <th>user role</th>
                                </tr>
                            </thead>
                            <?php
                                if(isset($_GET['delete'])){
                                    $userId=$_GET['delete'];
                                    $queryDelete="DELETE FROM users WHERE user_id={$userId}";
                                    $deleteQuery=mysqli_query($connection,$queryDelete);
                                    if($deleteQuery){
                                        echo "it has been done";
                                    }
                                }
                            ?>
                            
                            
                            <?php
                                if(isset($_GET['changeSub'])){
                                    $user_id=$_GET['changeSub'];
                                    $queryUpdate="UPDATE users SET user_role='subscriber' WHERE user_id={$user_id}";
                                    $QueryUpdate=mysqli_query($connection,$queryUpdate);
                                    if($QueryUpdate){
                                        echo "it has been done";
                                    }
                                }
                            ?>
                            
                            <?php
                                if(isset($_GET['changeAdmin'])){
                                    $user_id=$_GET['changeAdmin'];
                                    $queryUpdate="UPDATE users SET user_role='admin' WHERE user_id={$user_id}";
                                    $QueryUpdate=mysqli_query($connection,$queryUpdate);
                                    if($QueryUpdate){
                                        echo "it has been done";
                                    }
                                }
                            ?>
                            
                            
                            
                               <?php
                                    $query="SELECT * FROM users";
                                    $selectUsers=mysqli_query($connection,$query);    
                                    while($row=mysqli_fetch_assoc($selectUsers)){
                                        $user_id=$row['user_id'];
                                        $user_username=$row['user_username'];
                                        $user_password=$row['user_password'];
                                        $user_firstname=$row['user_firstname'];
                                        $user_lastname=$row['user_lastname'];
                                        $user_email=$row['user_email'];
                                        $user_role=$row['user_role'];
                                        
                                        echo "<tr>
                                                <td>$user_id</td>
                                                <td>$user_username</td>
                                                <td>$user_password</td>
                                                <td>$user_firstname</td>
                                                <td>$user_lastname</td>
                                                <td>$user_email</td>
                                                <td>$user_role</td>
                                                <td><a href='users.php?delete=$user_id'>delete</a></td>
                                                <td><a href='users.php?changeSub=$user_id'>Subscriber</a></td>
                                                <td><a href='users.php?changeAdmin=$user_id'>Admin</a></td>
                                                <td><a href='users.php?source=edit_users&user_id=$user_id'>Edit</a></td>";
                                                
                                    }
                                ?>
                               
                            
                        </table>