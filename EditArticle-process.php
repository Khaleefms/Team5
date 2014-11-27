<?php 
session_start();?>

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
                 $Interest=$_POST['inputCategory'];
                 $file=$_FILES['Image']['name'];
                 $ImageCheck=false;
                if(isset($_POST['inputFlag']))
                {
                    $Flag=$_POST['inputFlag'];
                }
                else{
                    $Flag='No';
                }
                //for website to know the article id
                $ArticleID=$_POST['ArticleID'];
                if(trim($file) != ''){
                // Check uploaded Image                    
                        $ImageUpload=TRUE;
                            if($_FILES['Image']['size']>50000000){
                                $ImageError="Please Keep Your File below 5MB.";
                                $ImageCheck=TRUE;
                            }
                            if($_FILES['Image']['type'] != "image/jpg" && $_FILES['Image']['type']!= "image/png" && $_FILES['Image']['type'] != "image/jpeg"
                            && $_FILES['Image']['type'] != "image/gif" ){
                                 $ImageError="Sorry, Only Upload jpg,png,jpeg or gif file";
                                 $ImageCheck=TRUE;

                            } 
                            if ($ImageCheck==TRUE)
                               {
                                $ImageValid=false;
                                $_SESSION['ImageValid']=$ImageValid;
                                $_SESSION['ImageError']=$ImageError;
                               }
                            else
                                {
                                $ImageValid=True;
                                }
                }
                //When there is no file uploacted 
                else
                {
                    $ImageUpload=false;
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
                if(trim($Interest) == '')
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
                            //Setting the location the image uploads to
                            if($ImageUpload){
                            $target_location ="img/";
                            $target = $target_location.($_FILES['Image']['name']);
                            //Move the uploaded file to the img folder
                            move_uploaded_file ($_FILES['Image'] ['tmp_name'],"$target");
                            $ImgName=$_FILES['Image']['name'];
                            $ImgLocation=$target;
                            }
                            require_once('/protected/config.php');
                            
                            $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                            $error = mysqli_connect_error();
                            if ($error != null) {
                                $output = "<p>Unable to connect to database</p" . $error;
                                exit($output);
                            }
                            //insertting into the database
                            if($ImageUpload){  
                                $sql="UPDATE article "
                                 . "SET `ArticleTitle`='".$ArticleTitle."', "
                                 . "`ArticleContent`='".$ArticleContent."', "
                                 . "`Interest`='".$Interest."', "   
                                 ."`ImgName`='".$ImgName."', "
                                 ."`ImgLocation`='".$ImgLocation."', "                                     
                                 . "`Flag`='".$Flag."'"      
                                 . "WHERE `ArticleID`='".$ArticleID."'";
                            }
                            else{
                              $sql="UPDATE article "
                                 . "SET `ArticleTitle`='".$ArticleTitle."', "
                                 . "`ArticleContent`='".$ArticleContent."', "
                                 . "`Interest`='".$Interest."', "                                     
                                 . "`Flag`='".$Flag."'"      
                                 . "WHERE `ArticleID`='".$ArticleID."'";
                            }
                                $result = mysqli_query($connection, $sql);
                                    $msg = 'You have Successfully Editied Your Article <br>you will be redirected in 10 second if not.</br><a href="index.php">Click to acess main page</a></p>';
                                    echo "<div class='col-md-3'>";
                                    echo "<div class='alert alert-success' role='alert'>".$msg."</div>";
                                    echo "</div>";
                                    echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"10; URL=index.php\">";
                         }
        else
            {
            /*Return to previous page*/
            $_SESSION['EditError']=True;
            $_SESSION['EditID']=$ArticleID;
            header('Location:EditArticle.php');
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
