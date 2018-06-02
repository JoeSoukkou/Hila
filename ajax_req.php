<?php
if(isset($_GET["sbmt"]) and isset($_GET["name__"]) and isset($_GET["data__"])){
    $msg = mysql_real_escape_string(strip_tags($_GET['data__']));
    $sender_access_code = mysql_real_escape_string(strip_tags($_GET['name__']));
    if(!empty($msg) and !empty($sender_access_code)){
        require_once("connect_.php");
        $_check = "SELECT * FROM users WHERE ACCESS = '$sender_access_code'";
        $quick_exec = mysql_query($_check);
        $result = mysql_fetch_array($quick_exec);
        $sender = $result['USER_NAME'];
        $qry = @sprintf("INSERT INTO data VALUE(NULL ,'%s', NULL, '%s')",$sender,$msg);
        $exe = mysql_query($qry);
    }
    
    
}


?>