<?php
    if(isset($_GET['p_id'])){
        $p_id =$_GET['p_id'];
    
    $query="SELECT * FROM posts WHERE post_id={$p_id}";
    $select_post_by_id=mysqli_query($connection,$query);
    if($select_post_by_id){
        while($row=mysqli_fetch_assoc($select_post_by_id)){
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
        }
    }else{
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
                                <label for="title">Post Title</label>
                                <input class="form-controll" type="text" name="post_title" value='<?php echo $post_title ?>'>
                            </div>
                            
                            <div class="form-group">
                                <label for="post_category_id">Post Category ID</label>
                                <input class="form-controll" type="text" name="post_category_id" value='<?php echo $post_category_id ?>'>
                            </div>
                            
                            <div class="form-group">
                                <label for="post_auther">Post Auther</label>
                                <input class="form-controll" type="text" name="post_author" value='<?php echo $post_author ?>'>
                            </div>
                            
                            <div class="form-group">
                                <label for="post_status">Post Status</label>
                                <select name="post_status" id="">
                                    <option value="<?php echo $post_status ?>"><?php echo $post_status ?></option>
                                    <?php 
                                        if($post_status == 'published'){
                                            echo "<option value='draft'>Draft</option>";
                                        }else{
                                            echo "<option value='post'>Post</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                           
                           <div class="form-group">
                                <label for="post_image">Post Image</label>
                                <input class="form-controll" type="file" name="post_image" value='<?php echo $post_image ?>'>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label for="post_tags">Post Tags</label>
                                <input class="form-controll" type="text" name="post_tags" value='<?php echo $post_tags ?>'>
                            </div>
                            
                            <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea class="form-controll" name="post_content" cols="30" rows="10"><?php echo $post_content ?> 
                            </textarea>
                            </div>
                            
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="edit_post" value="Publish">
                            </div>
                            
                        </form>
                        
                        <?php
                            if(isset($_POST['edit_post'])){
                                
                                $p_id =$_GET['p_id'];
                                $post_category_id=$_POST['post_category_id'];
                                $post_title=$_POST['post_title'];
                                $post_author=$_POST['post_author'];
                                //$post_image=$_POST['post_image'];
                                $post_tags=$_POST['post_tags'];
                                $post_status=$_POST['post_status'];
                                $post_content=$_POST['post_content'];
                                
                                $queryUpdate="UPDATE posts SET ";
                                $queryUpdate .="post_category_id=$post_category_id , ";
                                $queryUpdate .="post_title='{$post_title}', ";
                                $queryUpdate .="post_author='{$post_author}', ";
                                $queryUpdate .="post_tags='{$post_tags}', ";
                                $queryUpdate .="post_status='{$post_status}', ";
                                $queryUpdate .="post_content='{$post_content}' ";
                                
                                $queryUpdate .="WHERE post_id={$p_id}";
                                $resultBool=mysqli_query($connection,$queryUpdate);
                                if($resultBool){
                                    echo "<p>Post Updated. <a href='../post.php?p_id={$post_id}'>Show the Updated information</a></p>";
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

                        