<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php
    $message=null;
    if(isset($_POST['submit'])){
        $to=$_POST['email'];
        $subject=$_POST['subject'];
        $body=$_POST['body'];
        //if(!empty($username) && !empty($email) && !empty($password)){
            //////////////////////////////////////////////////

// the message
            $msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 character s
            $msg = wordwrap($msg,70);

// send email
            mail("sinajamoly@gmail.com","My subject",$msg,"sinajamoly@gmail.com");
            
            
            /////////////////////////////////////////////////////
        //}
        
    }
?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       <h6 class="text-center"></h6>
                        <div class="form-group">
                            <label for="email" class="sr-only">username</label>
                            <input type="text" name="email"  id="email" class="form-control" placeholder="Enter your email">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Emailll</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
