<!DOCTYPE html>
<html>
<head>
    <title>Forum</title>
    <meta charset="utf-8"/>    
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>  
    <main id="account">  
        <h1>Account: <?php echo($user);?></h1>
        <?php
        $character_info= array();
        $character_info=$dane->account_info($user);
        $class_img = ''.$character_info[1].'.jpg';
        echo("<img id='character_img'src='images/classes/$class_img' alt='class_img'/><br/><br/>");?>
        <ul id="character_info">
        <?php
        
        echo('<li> <strong>Character: </strong>'.$character_info[0].'</li>');
        echo('<li> <strong>Class: </strong>'.$character_info[1].'</li>');
        echo('<li> <strong>Level: </strong>'.$character_info[2].'</li>');
        echo('<li> <strong>XP: </strong>'.$character_info[3].'</li>');
        echo('<li> <strong>Profession1: </strong>'.$character_info[4].'</li>');
        echo('<li> <strong>Profession2: </strong>'.$character_info[5].'</li>');
        
        ?>
        <?php ;?>
    </ul>
    </main>

    
  

</body>
</html>
