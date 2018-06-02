
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Register in HILA - CHAT WITH OTHERS FOR FREE !</title>
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/Animate.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <style>
            @font-face{
                font-family:"default11";
                src:url('css/Asap-Regular.ttf')format('truetype');
                }
             *{
                font-family: default11;
                 margin:0;
                }
            body{
                background-color:#9e54bd;
            }
            #Huge_middle_box{
                background-color: rgb(119, 31, 156);
                height: 500px;
                width:100%;
                position: absolute;
                left:0;
                top:18%;
            }#LOGO__BOX {
                text-align: center;
                color:white;
                
            }
            #LOGO{
                text-shadow: 3px 5px 5px rgb(119, 31, 156);
                letter-spacing: 5px;
                font-size: 4em;
            }
            #sec_logo{
                font-size: 1.2em;
                position: relative;
                bottom:0px;
            }
            #register_sm_box{
                text-align: center;
                height:50%;
                width:100%;
                position: relative;
                top:25%; 
            }
            .input_text{
                border: none;
                outline: none;
                height:50px;
                width:600px;
                padding:10px;
                color:white;
                background-color: rgb(94, 8, 130);
                font-size: 1.0em;
                
            }
            .input_text:focus{
                background-color: rgb(71, 3, 99);
                transition: background-color 500ms linear;
                
            }
            .button_text{
                border: none;
                outline: none;
                height:50px;
                width:600px;
                padding:10px;
                color:white;
                background-color: rgb(158, 84, 189);
                font-size: 1.0em;
            }
           .btn-4c:hover:before {
                left: 65%;
                top: -10px;
                opacity: 1;
                }
        </style>
        <script type="text/javascript" src="useful.js"></script>
    </head>
    <body>
        <header id="LOGO__BOX"><font id="LOGO">HILA.com</font><br />
        <font id="sec_logo">Free Online Chat Service</font></header>
        <div id="Huge_middle_box">
            <div id="register_sm_box">
                <input id='usern' type="text" name="username" style="transition-duration: 500ms;" placeholder="Enter a Username" class="input_text" /><br />
                <input id='cntry' type="text" name="country" style="transition-duration: 500ms;" placeholder="Your Country" class="input_text" /><br />
                <input id='age' type="text" name="age" style="transition-duration: 500ms;" placeholder="Your Age" class="input_text" /><br />
                <button id='new_session' type="submit" style="transition-duration: 150ms;" class="button_text btn btn-4 btn-4c icon-arrow-right">START CHATTING</button>
            </div>
        </div>
    </body>
    <script>
        $("#new_session").click(function (){
            var user_name = document.getElementById("usern").value;
            var country = document.getElementById("cntry").value;
            var Age = document.getElementById("age").value;
            var prv_num = "<?php echo md5(rand(0,500798996554990));?>";
            $("#Huge_middle_box").load("AJAX_start_new_chat.php?user="+user_name+"&country="+country+"&age="+Age+"&prv_token="+prv_num);
            
        });
    </script>
</html>