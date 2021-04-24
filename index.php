<script src="javascript/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="chat.js"></script>
<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'mainpage';

if(isset($_GET['read_search']))
{
    $page = 'read';
}

$valid_submit = true;

include('models/model.php');
$dane = new ModelDanych;

include('include/PHPTAL.php');

//CHECK FOR LOGOUT REQUEST
if(isset($_GET['logout'])){
    if($_GET['logout']==1) session_destroy();
}
$user = '';
$welcome = '';
$db = new SQLite3('models/database.db');

if(isset($_POST['login_username']) && isset($_POST['login_password'])){
    
    if($_POST['login_username'] == "admin" && $_POST['login_password'] =="admin"){
        $_SESSION['logged_in'] = "admin";
        $_SESSION['admin'] = 1;
        $user = "admin";
        $welcome = "Logged in as Admnistrator";
    }
    else{
        $user= $_POST['login_username'];
        $_SESSION['logged_in'] = $user;
        $query = "SELECT Password FROM Users WHERE Username = '$user'";
        $queryid = $db->query($query);
        $pass='';
        while($row = $queryid->fetchArray())
        {          
            $pass=$row['Password'];
        }
        if($_POST['login_password'] == $pass){
            $welcome = "Logged in as $user";
            
            $_SESSION['logged_in'] = $user;
        }
    }
    
}

if(isset($_SESSION['logged_in'])){
    $user = $_SESSION['logged_in'];
}


$menu_temp = new PHPTAL("views/subpages/menu.html"); 
$menu_temp->logged_in_as_user=false;

if(isset($_SESSION['logged_in'])){
    $menu_temp->logged_out = 0;
    $menu_temp->logged_in = 1;
    $menu_temp->logged_in_as_user=true;
}
else{
    $menu_temp->logged_out = 1;
    $menu_temp->logged_in = 0;
}
if(isset($_SESSION['admin'])){
    $menu_temp->admin_logged=true;  
    $menu_temp->logged_in_as_user=false;
}
else{
    $menu_temp->admin_logged=false;
}


echo $menu_temp->execute();

switch($page){
    
    case 'mainpage':
    case 'delete':
    case 'login':
    case 'create': 
    

        $template = new PHPTAL("views/subpages/$page.html"); 

        $tresc = $dane->pobierz($page,$welcome, $user);

        
        
        $template->tresc = $tresc;
        echo $template->execute();
        
        
        break;
    case 'account':
    case 'gallery':
    case 'update':
    case 'read':
    case 'chat':
        $tresc = $dane->pobierz($page,$welcome, $user);
        include "views/subpages/$page.php";     
        break;
    default:
        include "views/wrongsite.html";
        break;
}
include "views/footer.html";

?>

