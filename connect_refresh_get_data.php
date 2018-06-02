<?php
//THIS FILE WILL BE CALLED REGULARLY THROUGH AJAX WITH A DELAY OF 3s
//IT WILL GET THE DATA "MESSAGES" AND DISPLAY THEM IN THE TABLE 

if(isset($_GET['get_msgs']))
    {
        // GET REQUEST OBTAINED FROM THE FUNCTION  / CALLED EVERY 3 SECONDS 
        require("connect_.php");
        function display_messages(){
            global $dude;
            $query__ = "SELECT * FROM `data` ORDER BY `data`.`SENDING_DATE` DESC";
            $execute__query__ = mysql_query($query__);
            return $execute__query__;
        }
        $arr = display_messages();
        while ($data___ = mysql_fetch_array($arr)){
            echo "<div style='padding:10px;'><span style='background-color:#444;padding:5px;border-radius:17px;width:auto;'>".$data___['USER_NAME']."</span> <span style='color:#eee;padding:5px;'>".$data___['DATA_CONTENT']."</span><br /></div>"; 
        }


}
else {echo "ERRORE!";}
?>
