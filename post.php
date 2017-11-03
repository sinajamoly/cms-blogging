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
<?php
    if(isset($_GET['p_id'])){
        $p_id=$_GET['p_id'];
        $query="SELECT * FROM posts WHERE post_id=$p_id";
        $selectPostResult=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($selectPostResult)){
            $post_title=$row['post_title'];
            $post_author=$row['post_author'];
            $post_date=$row['post_date'];
            $post_image=$row['post_image'];
            $post_content=$row['post_content'];

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>

                <hr>                        
                <?php   } 
                            $queryUpdate="UPDATE posts SET ";
                                $queryUpdate .="post_views_count=post_views_count + 1 ";
                                
                                $queryUpdate .="WHERE post_id={$p_id}";
                                $resultBool=mysqli_query($connection,$queryUpdate);
                            
                        }else{
                            header("Location: index.php");
                        }
                ?>

                <!-- Blog Comments -->
                
                <?php
                    if(isset($_POST['create_comment'])){
                        $authorName=$_POST['comment_author'];
                        $p_id=$_GET['p_id'];
                        $commentAuthor=$_POST['comment_author'];
                        $commentEmail=$_POST['comment_email'];
                        $commentContent=$_POST['comment_content'];
                        $queryInsertComment="INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ";
                        $queryInsertComment .="($p_id,'{$commentAuthor}','{$commentEmail}','{$commentContent}','unapproved',now())";
                        $resultOfInsertComment=mysqli_query($connection,$queryInsertComment);
                        
                        if($resultOfInsertComment) {
                            ?>
                            <script><?php echo("Location.href=index.php"); ?></script>
                            <?php
                        }
                    }
                ?>
                
                
<!--       comments__________________________         -->
                
                <?php
                
                    $querySelectComments="SELECT * FROM comments WHERE comment_post_id={$p_id} AND comment_status='approved'";
                    $showComments=mysqli_query($connection,$querySelectComments);
                    while($row=mysqli_fetch_assoc($showComments)){
                        $commentDate=$row['comment_date'];
                        $commentContent=$row['comment_content'];
                        $commentAuthor=$row['comment_author'];
                ?>
                
                        <div class='media'>
                            <a href='#' class='pull-left'>
                                <img src='http://placehold.it/64*64' alt='' class='media-object'>
                            </a>
                            <div class='media-body'>
                                <h4 class='media-heading'>
                                    <?php echo $commentAuthor;  ?>
                                    <small><?php echo $commentDate;  ?></small>
                                </h4>
                                <?php echo $commentContent;  ?>
                            </div>
                        </div>
                
                <?php
                    }
                    ?>
                
                
                <div class="well">
                        
                            <h4>Leave comments</h4>
                            <form action="" method="post" role="from">
                                <div class="form-group">
                                   <label for="Author">Author</label>
                                    <input type="text" class="form-control" name="comment_author">
                                </div>
                                
                                <div class="form-group">
                                   <label for="Author">Email</label>
                                    <input type="email" class="form-control" name="comment_email">
                                </div>
                                
                                <div class="form-group">
                                   <label for="Author">Content</label>
                                    <textarea class="form-control" row="5" name="comment_content"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="create_comment">submit</button>
                            </form>
                        
                </div>
                <!-- Comments Form -->
               

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

        </div>
        <!-- /.row -->

        <hr>
