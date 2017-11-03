
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat-title">Edit Category Title</label>
                                   
                                   <?php 
                                            $query="SELECT * FROM categories WHERE cat_id = '{$catId}'";
                                            $selectCategorie=mysqli_query($connection,$query);
                                            $editCatTitle=null;
                                            while($row=mysqli_fetch_assoc($selectCategorie)){
                                                $editCatTitle=$row["cat_title"];
                                            }
                                    ?>
                                        <input value="<?php echo $editCatTitle; ?>" type="text" class="form-class" name="catTitle">
                                    
                                    <?php
                                        if(isset($_POST['edit1'])){
                                        //$catId=$_GET['edit'];   
                                        $editCatTitle=$_POST['catTitle'];
                                        $query="UPDATE categories SET cat_title='{$editCatTitle}' WHERE cat_id='{$catId}'";
                                        $UpdateQuery=mysqli_query($connection,$query);
                                        //header("Location: index.php");
                                        }
                                    ?>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="edit1" value="update">
                                </div>
                            </form>