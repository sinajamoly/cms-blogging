                    <?php include("delete_modal.php");?>
                        <form action="" method="post">                        
                           <table class="table table-bordered table-hover">
                           <div id="bulkOptionContainer" class="col-xs-4">
                               <select name="bulk_option" id="">
                                   <option value="">Select Option</option>
                                   <option value="published">Published</option>
                                   <option value="draft">Draft</option>
                                   <option value="delete">Delete</option>
                                   <option value="clone">Clone</option>
                               </select>
                            </div>
                            <div class="col-xs-4">
                                <input type="submit" class="btn btn-success" value="apply" name="submit">
                                <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
                            </div>   
                            <thead>
                               
                               <?php
                                    $query="SELECT * FROM posts";
                                    $selectCategories=mysqli_query($connection,$query);
                                    
                                ?>
                               
                                <tr>
                                    <th><input id="selectAllBoxes" type="checkbox"></th>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Categories</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>View Count</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    while($row=mysqli_fetch_assoc($selectCategories)){
                                         $post_id=$row['post_id'];
                                         $post_category_id=$row['post_category_id'];
                                         $post_title=$row['post_title'];
                                         $post_author=$row['post_author'];
                                         $post_date=$row['post_date'];
                                         $post_image=$row['post_image'];
                                         $post_tags=$row['post_tags'];
                                         $post_Comment_count=$row['post_comment_count'];
                                         $post_status=$row['post_status'];
                                         $post_views_count=$row['post_views_count'];
                                         $commentsQuery="SELECT * FROM comments WHERE comment_post_id={$post_id}";
                                         $result=mysqli_query($connection,$commentsQuery);
                                         $numberOfComments=mysqli_num_rows($result);
                                        echo "
                                        <tr>
                                        <td><input id='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>
                                        <td>$post_id</td>
                                        <td>$post_author</td>
                                        <td>$post_title</td>
                                        <td>$post_category_id</td>
                                        <td>$post_status</td>
                                        <td><img class='img-responsive' width='100'  src='../images/$post_image' alt='image'></td>
                                        <td>$post_tags</td> 
                                        <td><a href='comments.php?source=post_comments&post_id=$post_id'>$numberOfComments</a></td>
                                        <td>$post_date</td>
                                        <td><a onClick=\" javascript: return confirm('Are you sure?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>
                                        <td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>
                                        <td><a href='../post.php?p_id={$post_id}'>View Post</a></td>
                                        <td><a href='posts.php?reset={$post_id}'>$post_views_count</a></td>
                                        </tr>";
                                }
                                ?>
                                <?php 
                                    if(isset($_GET['delete'])){
                                        $the_post_id=$_GET['delete'];
                                        $query="DELETE FROM posts WHERE post_id = {$the_post_id}";
                                        $deleteResult=mysqli_query($connection,$query);
                                        if($deleteResult){
                                            echo "the data have been deleted succesfully";
                                            header("Location: posts.php");
                                        }
                                        
                                    }
                                
                                    if(isset($_GET['reset'])){
                                        $the_post_id=$_GET['reset'];
                                        $query="UPDATE posts SET post_views_count=0 WHERE post_id = {$the_post_id}";
                                        $deleteResult=mysqli_query($connection,$query);
                                        if($deleteResult){
                                            echo "the data have been reseted succesfully";
                                            header("Location: posts.php");
                                        }
                                        
                                    }
                                ?>
                                <?php
                                    if(isset($_POST['checkBoxArray'])){
                                        foreach($_POST['checkBoxArray'] as $checkBoxValue){
                                            $bulk_option=$_POST['bulk_option'];
                                            switch($bulk_option){
                                                case 'published':
                                                    $query="UPDATE posts SET post_status='{$bulk_option}' WHERE post_id={$checkBoxValue}";
                                                    $result=mysqli_query($connection,$query);
                                                    header("Location: posts.php");
                                                    break;
                                                    
                                                case 'draft':
                                                    $queryDraft="UPDATE posts SET post_status='{$bulk_option}' WHERE post_id={$checkBoxValue}";
                                                    $result=mysqli_query($connection,$queryDraft);
                                                    header("Location: posts.php");
                                                    break;
                                                    
                                                case 'delete':
                                                    $queryDraft="DELETE FROM posts WHERE post_id={$checkBoxValue}";
                                                    $result=mysqli_query($connection,$queryDraft);
                                                    header("Location: posts.php");
                                                    break;
                                                
                                                case 'clone':
                                                    
                                                    
                                                    ///////////////////////////getting clonning
                                                    
                                                    $query="SELECT * FROM posts WHERE post_id={$checkBoxValue}";
                                                    $select_post_by_id=mysqli_query($connection,$query);
                                                    if($select_post_by_id){
                                                        $row=mysqli_fetch_array($select_post_by_id);
                                                            $post_id=$row['post_id'];
                                                            $post_category_id=$row['post_category_id'];
                                                            $post_title=$row['post_title'];
                                                            $post_author=$row['post_author'];
                                                            $post_date=$row['post_date'];
                                                            $post_image=$row['post_image'];
                                                            $post_tags=$row['post_tags'];
                                                            $post_Comment_count=$row['post_comment_count'];
                                                            $post_status=$row['post_status'];
                                                            $post_content=$row['post_content']; 
                                                            $copy_query="INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
                                                            $copy_query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}',0,'{$post_status}') ";
                                                            $result=mysqli_query($connection,$copy_query);  
                                                            header("Location: posts.php");
                                                    }
                                                    
                                                    
                                                    
                                                    //////////////////////////
                                            }
                                        }
                                    }    
                                ?>
                               
                            </tbody>
                        </table>
                    </form>
                    
                   