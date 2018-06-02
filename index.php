<?php
session_start();
$flag  = false;
$vale;
if (isset($_SESSION['USER_GRANTED_ACCESS']) and isset($_GET['token']) and $flag == false )
{
    $accss = mysql_real_escape_string(strip_tags($_GET['token']));
    
    function get_user_inf_using_access($accss__){
        require_once("connect_.php");
        $q = "SELECT * FROM `users` WHERE `ACCESS` = '$accss__'";
        $execution__ = mysql_query($q);
        $fff = mysql_fetch_array($execution__);
        if (!$fff ){
            return false;
        }else {
			return $fff;
		}
        
    }
    $arr = get_user_inf_using_access($accss);
    if($arr == false ){
        echo "<script>alert('THERE WAS A PROBLEM !! LOL');</script>";
        header("location:http://localhost:8080/website/register.php");
    }else {
		$vale = $arr;
		$flag == true;	
	}
}
else if ($flag == true){
    
    }
else {header("location://localhost:8080/website/register.php");}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $vale["USER_NAME"];?></title>
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/Animate.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <style>
            .txte{
                border:none;
                background-color:#17AA56;
                outline:none;
                height:80px;
                width:550px;
                color:#fff;
                font-family: Arial;
                padding: 15px;
                font-size: 1.2em;
                resize: none;
            }
            
            #form_wrapper{
                position: absolute;
                text-align: center;
                width:60%;
                height:auto;
                left:21.8%;
                top:70%;
            }
            #submit{
                position: relative;
                bottom:43px;
                right:15px;
                height:77px;
            }
            .btn-icon-only:before{
                    top: 14px;
                    left: 0;
            }
            #Messages_BOX{
                height:300px;
                width:50%;
                position: absolute;
                left:25%;
                top:20%;
                background-color: #17AA56;
                color:white;
                font-size: 1.1em;
                padding:15px;
                overflow-y: scroll;
                overflow-x: hidden;
            }
            
        </style>
    </head>
    <body style="background-color:#2ac56c;">
        <div id="Messages_BOX">
            
        
        </div>
        <div id="form_wrapper">
            <textarea id='data_' type='text' class='txte' style='transition-duration:100ms;'></textarea>
                <button id='submit' class="btn btn-7 btn-7c btn-icon-only icon-arrow-right btn-activated" value="true"><span id="ff">Submit</span></button>
           
        </div>
    </body>
    <script type='text/javascript' src="useful.js"></script>
    <script type="text/javascript">
    //SCRIPT FROM AJAX AND OTHER STUFF
    function AJAXdataEX(target, DivId,data1,data2,data3){
                        var xmlhttp;
                        if (window.XMLHttpRequest){
                            xmlhttp = new XMLHttpRequest();
                        }
                        else {
                            if(new ActiveXObject)
                                {
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
                                }
                            else {
                                alert("Unsupported Browser ! Please use the Latest Version of a modern Web Browser like Chrome, FireFox, Opera ...etc ");
								}                                   
                        }
                        xmlhttp.onreadystatechange = function (){
                            if(xmlhttp.readyState == 4 & xmlhttp.status == 200){
                                var page = xmlhttp.responseText;
                                document.getElementById(DivId).innerHTML = page;
                                

                            }
                            else if(xmlhttp.readyState < 4){
                            }
                            else if (xmlhttp.status == 404){
                                document.getElementById(DivId).innerHTML = "<font id='bad-response'>Error 404 : Page Not Found ! <font>";
                                $("#submit").addClass("btn-error");
                            }
                        } 
                        xmlhttp.open("GET",target+"?sbmt="+data1+"&data__="+data2+"&name__="+data3,true);
                        xmlhttp.send();
            }
            
        
        $("#submit").click(function (){
            var value_data = document.getElementById("data_").value;
            var req = document.getElementById("submit").value;
            AJAXdataEX("ajax_req.php","Messages_BOX",req,value_data,"<?php echo $vale["ACCESS"];?>");
        });
        
        
        function GET_MSG_REPEATELY(){
                        var xmlhttpy;
                        if (window.XMLHttpRequest){
                            xmlhttpy = new XMLHttpRequest();
                        }
                        else {
                            if(new ActiveXObject)
                                {
                                xmlhttpy = new ActiveXObject("Microsoft.XMLHTTP")
                                }
                            else {
                                alert("Unsupported Browser ! Please use the Latest Version of a modern Web Browser like Chrome, FireFox, Opera ...etc ");
								}                                   
                        }
                        xmlhttpy.onreadystatechange = function (){
                            if(xmlhttpy.readyState == 4 & xmlhttpy.status == 200){
                                var pagee = xmlhttpy.responseText;
                                document.getElementById("Messages_BOX").innerHTML = pagee;

                            }
                            else if(xmlhttpy.readyState < 4){
                            }
                            else if (xmlhttpy.status == 404){
                                document.getElementById(DivId).innerHTML = "<font id='bad-response'>Error 404 : Page Not Found ! <font>";
                            }
                        } 
                        xmlhttpy.open("GET","connect_refresh_get_data.php?get_msgs=true",true);
                        xmlhttpy.send();
            }
            
            window.setInterval(GET_MSG_REPEATELY,500);
			GET_MSG_REPEATELY();
    </script>
    
</html>