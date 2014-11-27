<!--
Hiu Fung
This page for is inserting the Article into the database
-->
<?php
session_start();
?>
        <header>
            <?php  include 'header.inc.php' ?>
        </header>
        
        <main>
            <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/CreateArticlecss.css" rel="stylesheet" type="text/css"/>
<script src="js/CreateArticlejs.js" type="text/javascript"></script>
        <nav class="md-col-3" id="mainnavbar">
            <?php  include 'sidenav.inc.php' ?>
            </nav>
<?php                
     if ($_SERVER["REQUEST_METHOD"]== "POST"){
         
                $ArticleTitle=$_POST['inputTitle'];
                
                 $ArticleContent=$_POST['inputContent'];
                
                $UserID=$_SESSION["USERID"];
                
                $Interest=$_POST['inputCategory'];
                $ImageCheck=false;
                // Check uploaded Image
                if($_FILES['file']['size']>50000000){
                    $ImageError="Please Keep Your File below 5MB.";
                    $ImageCheck=TRUE;
                }
                if($_FILES['file']['type'] != "image/jpg" && $_FILES['file']['type']!= "image/png" && $_FILES['file']['type'] != "image/jpeg"
                && $_FILES['file']['type'] != "image/gif" ){
                     $ImageError="Sorry, Only Upload jpg,png,jpeg or gif file";
                     $ImageCheck=TRUE;
                    
                } 
                if ($ImageCheck==TRUE)
                   {
                    $ImageValid=false;
                    echo $_SESSION['ImageValid']=$ImageValid;
                    echo $_SESSION['ImageError']=$ImageError;
                   }
                else
                    {
                    $ImageValid=True;
                    }

                if (trim($ArticleTitle) == '')
                   {

                    $ArticleTitleValid = false;
                    $_SESSION['ArticleTitleValid']=$ArticleTitleValid;
                   }
                else
                    {
                    $ArticleTitleValid = True;
                    $_SESSION['ArticleTitleValid']=$ArticleTitleValid ;
                    $_SESSION['ArticleTitle']=$ArticleTitle;
                    }
                if(trim($ArticleContent) == '')
                   {
                      $ArticleContentValid = false;
                      $_SESSION['ArticleContentValid']=$ArticleContentValid;
                   }
                else
                    {
                    $ArticleContentValid = True;
                    $_SESSION['ArticleContentValid']=$ArticleContentValid;
                    $_SESSION['ArticleContent']=$ArticleContent;
                    }
                if($Interest == '0')
                   {
                      $InterestValid= false;
                      $_SESSION['InterestValid']=$InterestValid;
                   }
                else
                    {
                    $InterestValid = True;
                    $_SESSION['InterestValid']=$InterestValid;
                    $_SESSION['Interest']=$Interest;
                    }

                    if($ArticleTitleValid&&$ArticleContentValid&&$InterestValid&&$ImageValid)
                        {
                            //insert the time uploaded
                            (date_default_timezone_set("Asia/Singapore"));
                            $DatePosted=date("Y-m-d H:i:s");
                            //Setting the location the image uploads to
                            $target_location ="img/";
                            $target = $target_location.($_FILES['file']['name']);
                            //Move the uploaded file to the img folder
                            move_uploaded_file ($_FILES['file'] ['tmp_name'],"$target");
                            $ImgName=$_FILES['file']['name'];
                            $ImgLocation=$target;
                            
                            require_once('/protected/config.php');
                            
                            $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                            $error = mysqli_connect_error();
                            if ($error != null) {
                                $output = "<p>Unable to connect to database</p" . $error;
                                exit($output);
                            }
                            //insertting into the database
                            $sql="INSERT INTO article (`ArticleTitle`, `ArticleContent`, `Interest`, `UserID`, `ImgName`, `ImgLocation`, `DatePosted`, `ViewCount`, `Flag`) 
                                            VALUES ('".$ArticleTitle."', '".$ArticleContent."', '".$Interest."', '".$UserID."', '".$ImgName."', '".$ImgLocation."', '".$DatePosted."', '0', 'No')";
                                $result = mysqli_query($connection, $sql);
                                if($result){
                                    $msg = 'You have Successfully Created Your Article <br>you will be redirected in 5 second if not.</br><a href="index.php">Click to acess main page</a></p>';
                                    echo "<div class='col-md-3'>";
                                    echo "<div class='alert alert-success' role='alert'>".$msg."</div>";
                                    echo "</div>";
                                echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5; URL=index.php\">";}
                                else{
                                    include 'header.inc.php';
                                    include 'sidenav.inc.php';
                                    $msg = 'Article Creating Error <br>you will be redirected in 5 second if not.</br><a href="index.php">Click to acess main page</a></p>';
                                    echo "<div class='col-md-3'>";
                                    echo "<div class='alert alert-danger' role='alert'>".$msg."</div>";
                                    echo "</div>";
                                echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5; URL=index.php\">";}
                         }
        else
            {
            /*Return to previous page*/
            $_SESSION['CreateArticleError']='True';
            
            header('Location:CreateArticle.php');
        }
     }
        else{
         include 'header.inc.php';
         include 'sidenav.inc.php';
          echo "<div class=''>";
          echo "<h1>You are not allowed on this Page</h1>";
          echo "</div>";
        }
?>
