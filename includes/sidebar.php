            <div class="col-md-4">
                <?php
                    if(isset($_POST['submit'])){
                         $search=$_POST['search'];
                        $query ="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                        $searchQyery=mysqli_query($connection,$query);
                        if(!search_query){
                            die("QUERY FAILED" . mysqli_error($connection));
                        }
                    }
                    
                ?>
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                    </div>
                    </form> <!--search form-->
                    <!-- /.input-group -->
                </div>
                
                
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                        <div class="form-group">
                           <label for="username">User Name</label>
                            <input name="username" type="text" class="form-control" placeholder="Enter User Name">
                        </div>
                        <div class="input-group">
                           <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">
                                    Submit
                                </button>
                            </span>
                        </div>
                    </form> <!--search form-->
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                   <?php
                        $query="SELECT * FROM categories LIMIT 3";
                        $selectAllCategoriesQuery=mysqli_query($connection,$query);
                        
                    ?>
                   
                   
                   
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                                    while($row=mysqli_fetch_assoc($selectAllCategoriesQuery)){
                                        $catTitle=$row['cat_title'];
                                        $cat_id=$row['cat_id'];
                                        echo "<li><a href='category.php?category=$cat_id'>{$catTitle}</a></li>";
                                    }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
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
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php
                 include "widget.php";
                ?>

            </div>