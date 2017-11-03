                        <table class="table table-bordered table-hover">
                            
                        
                               <thead>
                               
                                <tr>
                                    <th>IDDDDDDDDDDDDDDDDDDDDDDDD</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response To</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <?php
                                if(isset($_GET['delete'])){
                                    $commentId=$_GET['delete'];
                                    $queryDelete="DELETE FROM comments WHERE comment_id={$commentId}";
                                    $deleteQuery=mysqli_query($connection,$queryDelete);
                                    if($deleteQuery){
                                        echo "it has been done";
                                    }
                                }
                            ?>
                            
                            
                            <?php
                                if(isset($_GET['unapprove'])){
                                    $comment_id=$_GET['unapprove'];
                                    $queryUpdate="UPDATE comments SET comment_status='unapproved' WHERE comment_id={$comment_id}";
                                    $QueryUpdate=mysqli_query($connection,$queryUpdate);
                                    if($QueryUpdate){
                                        echo "it has been done";
                                    }
                                }
                            ?>
                            
                            <?php
                                if(isset($_GET['approve'])){
                                    $comment_id=$_GET['approve'];
                                    $queryUpdate="UPDATE comments SET comment_status='approved' WHERE comment_id={$comment_id}";
                                    $QueryUpdate=mysqli_query($connection,$queryUpdate);
                                    if($QueryUpdate){
                                        echo "it has been done";
                                    }
                                }
                            ?>
                            
                            
                            
                               <?php
                                    if(isset($_GET['post_id'])){
                                        $post_id=$_GET['post_id'];
                                        $query1="SELECT * FROM comments WHERE comment_post_id={$post_id}";
                                        $selectComments=mysqli_query($connection,$query1);    
                                        while($row=mysqli_fetch_assoc($selectComments)){
                                        $comments_id=$row['comment_id'];
                                        $comments_status=$row['comment_status'];
                                        $comments_post_id=$row['comment_post_id'];
                                        $comments_author=$row['comment_author'];
                                        $comments_email=$row['comment_email'];
                                        $comments_content=$row['comment_content'];
                                        $comments_date=$row['comment_date'];
                                        $queryPostId="SELECT * FROM posts WHERE post_id=$comments_post_id";
                                        $selectPostId=mysqli_query($connection,$queryPostId);
                                        while($row=mysqli_fetch_assoc($selectPostId)){
                                            $postTitle=$row['post_title'];
                                        }
                                        
                                        echo "<tr>
                                                <td>$comments_id</td>
                                                
                                                <td>$comments_author</td>
                                                <td>$comments_content</td>
                                                <td>$comments_email</td>
                                                <td>$comments_status</td>
                                                <td><a href=../post.php?p_id=$comments_post_id>$postTitle</a></td>
                                                <td>$comments_date</td>
                                                <td><a href='comments.php?approve=$comments_id'>Approve</a></td>
                                                <td><a href='comments.php?unapprove=$comments_id'>Unapprove</a></td>
                                                <td><a href='comments.php?delete=$comments_id'>Delete</td>
                                              </tr>";
                                    }
                                    }

                                ?>
                               
                            
                        </table>