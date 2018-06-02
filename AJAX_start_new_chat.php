<?php
session_start();
if(isset($_GET["user"]) and isset($_GET['country']) and isset($_GET['age']) and isset($_GET["prv_token"])){
    if (empty($_GET['user']) or empty($_GET['country']) or empty($_GET['age']) or empty($_GET['prv_token'])){
        echo "<script>alert('warning! PARAMATER(s) MISSING');</script>";
    }else {
        $user_name = mysql_real_escape_string(strip_tags($_GET["user"])); 
        $country = mysql_real_escape_string(strip_tags($_GET["country"])); 
        $age = mysql_real_escape_string(strip_tags($_GET["age"]));
        $access = mysql_real_escape_string(strip_tags($_GET["prv_token"]));    
        //SUCCESS OF PASSING THE PARAMETERS TO START A CHAT SESSION
        //REGISTERING THE USER DATA IN A DATABASE :: username, country, age , access_key
        
        function register_new_chatter($user_name__,$age__,$country__,$access__){
                require_once("connect_.php");
                $qry = sprintf("INSERT INTO users VALUE(NULL , '%s', '%s' , '%s', '%s')",$user_name__, $age__, $country__, $access__);
                $exec_qr = mysql_query($qry);
                return $exec_qr;
        }
        $rslt = register_new_chatter($user_name,$age,$country,$access);
        if ($rslt == 1){
            $_SESSION['USER_GRANTED_ACCESS'] = $access;
            echo "<p style='text-align:center;color=white;font-size:1.9em;'>click <a href='http://localhost:8080/website/index.php?token=$access'> Here </a>to access the chat room </p>";
        }  
    }
   
}


?>