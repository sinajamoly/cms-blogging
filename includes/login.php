<?php include "db.php";?>
<?php session_start(); ?>
<?php
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $username=mysqli_real_escape_string($connection,$username);
        $password=mysqli_real_escape_string($connection,$password);
        $query="SELECT * FROM users WHERE user_username='{$username}'";
        $selectUserQuery=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($selectUserQuery)){
            $db_id=$row['user_id'];
            $db_password=$row['user_password'];
            $db_firstname=$row['user_firstname'];
            $db_lastname=$row['user_lastname'];
            $db_role=$row['user_role'];
            $db_username=$row['user_username'];
            //$password=crypt($password,$db_password);
            
            if(password_verify($password,$db_password)){
                $_SESSION['username']=$db_username;
                $_SESSION['firstname']=$db_firstname;
                $_SESSION['lastname']=$db_lastname;
                $_SESSION['role']=$db_role;
                header("Location:../admin");
            }
            else{
                header("Location:../index.php");
            }
            
        }
        
        
    }
?>

