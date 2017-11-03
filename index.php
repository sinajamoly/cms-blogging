<?php 
include "includes/db.php";
?> 

<?php 
include "includes/header.php";
?>

    <!-- Navigation -->
 <?php
include "includes/navigation.php";
?>
   
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                $page=1;
                if(isset($_GET['page'])){
                   $page= $_GET['page'];
                }
                $page=($page*5)-5;
                    $post_query_count="SELECT * FROM posts";
                    $numberOfPosts=mysqli_query($connection,$post_query_count);
                    $numberOfRows=mysqli_num_rows($numberOfPosts);
                    $numberOfRows=ceil($numberOfRows/5);
                    
                
                    $query="SELECT * FROM posts LIMIT $page, 5";
                    $selectAllPostsQuery=mysqli_query($connection,$query);
                    
                    while($row=mysqli_fetch_assoc($selectAllPostsQuery)){
                        $postid=$row['post_id'];
                        $postTitle=$row['post_title'];
                        $postAuthor=$row['post_author'];
                        $postDate=$row['post_date'];
                        $postImage=$row['post_image'];
                        $postContent=substr($row['post_content'],0,100);
                    ?>
                      
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $postid; ?>"><?php echo $postTitle; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?post_author=<?php echo $postAuthor; ?>&p_id=<?php echo $postid; ?>"><?php echo $postAuthor; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $postDate; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $postid; ?>">
                <img class="img-responsive" src="images/<?php echo $postImage; ?>" alt="">
                </a>
                <hr>
                <p><?php echo $postContent; ?></p>

                <hr>                        
                <?php } ?>
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
<?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>
        <ul class="pager">
            <?php
                $bolder=1;
                if(isset($_GET['page'])){
                    $bolder=$_GET['page'];
                }
                for($i=1;$i<=$numberOfRows;$i++){
                    if($i==$bolder){
                        echo "<li><a href='index.php?page=$i'><font color='red'>$i</font></a></li>";
                    }else{
                        echo "<li><a href='index.php?page=$i'>$i</a></li>";    
                    }
                    
                }
            ?>
            <li><a href=""></a></li>
        </ul>

       