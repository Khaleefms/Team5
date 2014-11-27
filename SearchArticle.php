<?php
 session_start();
    require_once('/protected/config.php');
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database</p" . $error;
        exit($output);
    }
    
    if (isset($_GET['search'])){
        $Search=$_GET['search'];
        

  ?>

<html>
    <html>
    <head>
        <meta charset="UTF-8">
        <link href="phpProject9.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="Javascript-project.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="css/ViewArticlecss.css" rel="stylesheet" type="text/css"/>
        <link href="http://fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>     
        <title>Hobby Union - View Search</title>
    </head>
    
    <body>
        <header>
            <?php include 'header.inc.php' ?>
        </header>
        <main>
            <?php include 'sidenav.inc.php' ?>
            <h1>Search results...</h1>
            <div class="table table-hover" style="background-color : #ffffff; width: 50%; margin-left: 5%; float: left">
                <table class="myTable">
                    <tr>
                        <th>Article Title</th><th>Interest</th><th>Image</th><th>Date Posted</th><th>View</th>
                    </tr>
                        <?php
                        require_once '/protected/config.php';
                        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                        $error = mysqli_connect_error();
                        $sql="SELECT * FROM article WHERE ArticleTitle LIKE '%".$Search."%' OR ArticleContent LIKE '%".$Search."%'ORDER BY DatePosted ";
                        if ($result = mysqli_query($connection, $sql)) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td> ';
                            echo $row['ArticleTitle'];
                            echo '</td>';
                            echo '<td> ';
                            echo $row['Interest'];
                            echo '</td>';
                            echo '<td> ';
                            echo '<img src=';
                            echo $row['ImgLocation'];
                            echo ' width="150" height="150" >';
                            echo '</td>';
                            echo '<td> ';
                            echo $row['DatePosted'];
                            echo '</td>';
                            echo '<td><form action = "ViewSearch.php" method = "post">
                                    <input type="hidden" name="ArticleID" value="'.$row["ArticleID"].'">
                                    <input type="submit" name="View" value="View" />
                                </form></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                   
                       
                   
                </table>
            </div>
  
        </main>
        
        <footer>
            <?php 
               }
            else{
         include 'header.inc.php';
         include 'sidenav.inc.php';
          echo "<div class=''>";
          echo "<h1>Please use the Search bar for this function</h1>";
          echo "</div>";
               }
            include 'footer.inc.php' ?>
        </footer>
    </body>
</html>
