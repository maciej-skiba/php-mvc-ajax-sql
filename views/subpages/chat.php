<?php
    
    $db = new SQLite3('models/database.db');
    $message = isset($_POST['message']) ? $_POST['message'] : null;

    date_default_timezone_set("Europe/Warsaw");
    if(!empty($message) && !empty($user)){
        //echo("<script> alert('123'); </script>");
        $time=time();
        $query = "INSERT INTO chat(`message`, `from`, `created`)  VALUES ('$message', '$user', '$time')";
        $queryid = $db->query($query);
    }
    
?>


<html>
<head>
    <title>Forum</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <?php
     if(isset($_SESSION['logged_in']))
    {
        echo('    <main id="chat_main">
        <form method="POST">
        <input type="text" id="msg" name="message" autocomplete="off"   style="height:30%; width: 40%"placeholder="Type message..." autofocus="on"/>
        <input name = "submit" type="submit" id="submit" value="Send" style="height:30%; width: 10%"/>   
        </form> 
        </main>');
    }
    ?>

    <div id="chat_div"></div>
</body>
</html>

<script>
    
    $(document).ready(function(){
        $('#submit').click(function(){
            
            var message_txt= $('#msg').val();
            
            if($.trim(message_txt) !== '')
            {
                
                $.ajax({                    
                    url:"views/subpages/chatsql.php",
                    method:"POST",
                    data:{msg:message_txt},
                    dataType:"text",
                    success:function(data)
                    {   
                        $('#msg').val("");
                    }
                });
            }
        });
        setInterval(function(){
            $('#chat_div').load("views/subpages/load_chat.php").fadeIn("slow");
            
        },500);
    });
 </script>



