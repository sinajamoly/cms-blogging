

    <div id="wrapper">

        <!-- Navigation -->


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <?php 
                            if(isset($_POST['create_post'])){
                                echo "shod";
                                $post_category_id=$_POST['post_category_id'];
                                $post_title=$_POST['post_title'];
                                $post_author=$_POST['post_auther'];
                                $post_date=date("d-m-y");

                                $post_image=$_FILES['image']['name'];
                                $post_image_temp=$_FILES['image']['tmp_name'];
                                $post_image_error=$_FILES['image']['error'];

                                $post_tags=$_POST['post_tags'];                                
                                $post_Comment_count=$_POST['post_content'];
                                $post_status=$_POST['post_status'];
                                $post_comment_count=4;
                                $post_content=$_POST['post_content'];
                                //echo $post_image_temp;
                                
                                if(move_uploaded_file($post_image_temp,"../images/$post_image")){
                                    echo "done";
                                }
                                
                                $query="INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
                                $query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}',{$post_comment_count},'{$post_status}') ";
                                $result=mysqli_query($connection,$query);
                                if($result){
                                    $last_id=mysqli_insert_id($connection);
                                    echo "<p>Post uploaded. <a href='../post.php?p_id={$last_id}'>Show Posts</a></p>";
                                }
                            }
                            $query1="SELECT * FROM categories";
                            $updatedQueryResult=mysqli_query($connection,$query1);
                            
                        ?>
                        
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                                <label for="title">Post Title</label>
                                <input class="form-controll" type="text" name="post_title">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_category_id">Post Category ID</label>
                                <select name="post_category_id">
                                    <?php
                                    while($row=mysqli_fetch_assoc($updatedQueryResult)){
                                        $cat_id1=$row['cat_id'];
                                        $cat_title1=$row['cat_title'];
                                        echo "<option value='$cat_id1'>
                                                $cat_title1
                                            </option>";
                                    }
                                        ?>
                                </select>
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="post_auther">Post Auther</label>
                                <input class="form-controll" type="text" name="post_auther">
                            </div>
                            
                            <div class="form-group">
                                <label for="post_status">Post Status</label>
                                <select name="post_status" id="">
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                           
                           <div class="form-group">
                                <label for="post_image">Post Image</label>
                                <input class="form-controll" type="file" name="image">
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label for="post_tags">Post Tags</label>
                                <input class="form-controll" type="text" name="post_tags">
                            </div>
                            
                            <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea class="form-controll" name="post_content" cols="30" rows="10">
                            </textarea>
                            </div>
                            
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="create_post" value="Publish">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"?>