<?php


    function user_online(){
        global $connection;
        $session=session_id();
        $time=time();
        $time_out_in_seconds=20;
        $time_out=$time -$time_out_in_seconds;
        $query="SELECT * FROM user_online WHERE session='{$session}'";
        $send_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($send_query);
        if($count == null){
            mysqli_query($connection,"INSERT INTO user_online(session, time) VALUES('$session','$time')");
        }else{
            mysqli_query($connection,"UPDATE user_online SET time='$time' WHERE session='$session'");
        }
        $users_online=mysqli_query($connection,"SELECT * FROM user_online WHERE time > '$time_out'");
        return $count_user=mysqli_num_rows($users_online);
    }
    
?>