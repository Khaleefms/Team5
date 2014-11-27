<?php
require_once '/protected/config.php';
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
$error = mysqli_connect_error();
$sql="SELECT * FROM article a ,user u WHERE a.UserID=u.UserID AND a.Flag='No' ORDER BY a.DatePosted DESC";
                    if ($result = mysqli_query($connection, $sql)){
                        
                        while($row= mysqli_fetch_assoc($result)){
                            echo '<li';
                            echo '>';
                            echo '<a href="SQL_TEST.php?id=';
                            echo $row['ArticleID'];
                            echo '">';
                            echo $row['ArticleTitle'];
                            echo '</a>';
                            echo 'Date Posted:   ';
                            echo $row['DatePosted'];
                            echo 'User Who Posted:  ';
                            echo $row['UserName'];
                            echo 'View Count:  ';
                            echo $row['ViewCount'];
                            echo 'Img:   <img src="';
                            echo $row['ImgLocation'];
                            echo '" name ="';
                            echo $row['ImgName'];
                            echo '">';
                            echo '</li>';
                                                                }
                        }        
        
        
        
?>

