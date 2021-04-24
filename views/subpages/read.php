<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forum</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
    <div id="read_div">
        <main >
            <h1>Read</h1>
            <?php
            echo("<div id='tresc'><h3>$tresc</h3></div>");
            ?>
            <div id ="read">
                <form action="" method="post">
                    <input type="submit" name="table" value="Characters" />
                </form>
                <form action="" method="post">
                    <input type="submit" name="table" value="Forum" />
                </form>
                <form action="" method="post">
                    <input type="submit" name="table" value="Users" />
                </form>
            </div>

        </main>
    
    
    </div>

    </body>
</html>

