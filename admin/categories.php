<?php include "include/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                           <?php
                                if(isset($_POST['submit'])){
                                    $catTitle="";
                                    $catTitle=$_POST['cat_title'];
                                    if($catTitle == "" || empty($catTitle)){
                                        echo "this feild should not be empty";
                                    }else{
                                        $query="INSERT INTO categories(cat_title) ";
                                        $query .="VALUE('{$catTitle}') ";
                                        $createCategoryQuery=mysqli_query($connection,$query);
                                        if(!$createCategoryQuery){
                                            die("query failed". mysqli_error($connection));
                                        }
                                    }
                                    
                                }
                            ?>
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                   <label for="cat-title">Category Title</label>
                                    <input type="text" class="form-class" name="cat_title">
                                </div>
                                
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                                </div>
                            </form>
                            
                            
<!--form for updating the information                            -->
                            <?php 
                                if(isset($_GET['edit'])){
                                    $catId=$_GET['edit'];
                                    include "update_category.php";
                                }

                            ?>
                            
<!-- END                            -->
                       
                       
                        </div>
                        <?php 
                            $query="SELECT * FROM categories";
                            $selectCategorie=mysqli_query($connection,$query);
                        ?>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category title</th>
                                    </tr>
                                </thead>
                                <tbody>
<!--     showing the table of categories                           -->
                                <?php
                                    while($row=mysqli_fetch_assoc($selectCategorie)){
                                        $cat_id=$row['cat_id'];
                                        $cat_title=$row['cat_title'];
                                        echo "
                                                <tr>
                                                    <td>{$cat_id}</td>
                                                    <td>{$cat_title}</td>
                                                    <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                                                    <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
                                                </tr>";
                                    }
//END                                    
                                ?>
                                <?php
                                    if(isset($_GET['delete'])){
                                        $deleteCatId=$_GET['delete'];
                                        $query="DELETE FROM categories WHERE cat_id={$deleteCatId}";
                                        $deleteQuery=mysqli_query($connection,$query);
                                        //header("Location: index.php");
                                    }    
                                ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"?>