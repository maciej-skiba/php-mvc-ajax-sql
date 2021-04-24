<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forum</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

    <main id="gallery">
        <h2>Gallery <img src="images/camera.png" alt="camera_icon"/></h2>
        <?php   
                $database = new SQLite3('models/database.db');
                
                //----------------UPLOAD IMAGE-------------------
                if(isset($_POST["submit"])) {
                    include 'views/subpages/image.php';
                }

               
                //----------------DELETE IMAGE------------------
                if(isset($_POST['delete_image'])){
                    $id=$_POST['delete_image'];
                    $query="DELETE FROM gallery WHERE id IS $id";
                    
                    if(file_exists('images/gallery/'.$id.'.jpg'))
                    {
                        unlink('images/gallery/'.$id.'.jpg');
                        echo '<h5>Image nr ' . $id . ' has been deleted</h5><br/>';
                        $delete_image = $database->query($query);
                    }
                    elseif(file_exists('images/gallery/'.$id.'.jpeg'))
                    {
                        unlink('images/gallery/'.$id.'.jpeg');
                        echo '<h5>Image nr ' . $id . ' has been deleted</h5><br/>';
                        $delete_image = $database->query($query);
                    }
                    elseif(file_exists('images/gallery/'.$id.'.png'))
                    {
                        unlink('images/gallery/'.$id.'.jpg');
                        echo '<h5>Image nr ' . $id . ' has been deleted</h5><br/>';
                        $delete_image = $database->query($query);
                    }
                    else
                    {   
                        echo '<h5>Could not delete image' . $id . ', it does not exist</h5><br/>';
                    }
                }

                if(isset($_SESSION['admin'])){
                            echo("
                            <form method='post' action=''>
                                Delete image nr:
                                <input type='text' name='delete_image'/>                         
                                <input type='submit' id='submit' value='DELETE'>
                            </form>
                            <form action='' method='post' enctype='multipart/form-data'>
                            Select image to upload:
                            <input type='file' name='fileToUpload' id='fileToUpload'>  
                            <input type='submit' id='submit' value='Upload Image' name='submit'>
                            </form>
");
                        }
                ?>
        <div id="gallery_div"
         <?php if(isset($_SESSION['admin']))
         {
             echo("style='height: 45%'");
         }?>>
            <?php
                        

                        $readsql = 'SELECT * FROM gallery ORDER BY id';

                        $result = $database->query($readsql);

                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                            $id = $row['ID'];
                            //echo($id);
                            if(file_exists('images/gallery/'.$id.'.jpg'))
                            {
                                $format = '.jpg';
                            }
                            elseif(file_exists('images/gallery/'.$id.'.jpeg'))
                            {
                                $format = '.jpeg';
                            }
                            elseif(file_exists('images/gallery/'.$id.'.png'))
                            {
                                $format = '.png';
                            }
                            else
                            {
                                continue;
                            }
                            
                        

                            if(isset($_SESSION['admin'])){
                                $index= "<h2>$id)</h2>";
                            }
                            else{
                                $index= '';
                            }

                            echo '&nbsp&nbsp&nbsp'.$index.' 
                            <img src="images/gallery/'.$id.''.$format.'" id= "'.$id.'" class="picture" onclick="zoom_image('.$id.')" alt="image'.$id.'" />
                            ';
                        }

                        ?>
        </div>
        <div id="zoom">
            <img src="images/gallery/1.jpg" id="zoom_image" alt="zoom_image"/>
            <img src="images/cross.png" id="cross" alt="school_icon" onclick="unzoom_image()"/>
        </div>
    </main>
</body>

</html>