<!DOCTYPE html>
<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<?php
session_start();

if(isset($_SESSION["USERNAME"])){
    if(isset($_SESSION['EditError'])){
        $ArticleID=$_SESSION['EditID'];
    if($_SESSION['ImageValid']==false){
         $ImgErrorMsg=$_SESSION['ImageError'];
         $ImageError="<div class='alert alert-danger' role='alert'>".$ImgErrorMsg."</div>";
    }
    else{
          $ImageError = '';
    }
    }
    require_once('/protected/config.php');
    $Admin='Yes';
    $ArticleID=$_POST['ArticleID'];    
    $ImageError = '';

    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    $error = mysqli_connect_error();
    $sql="SELECT * FROM article WHERE ArticleID='".$ArticleID."';";
    $result = mysqli_query($connection, $sql);
                $row= mysqli_fetch_assoc($result);
                $ArticleTitle=$row['ArticleTitle'];
                $ArticleContent=$row['ArticleContent'];
                $Interest=$row['Interest'];
                $ImageLocation=$row['ImgLocation'];
                $Flag=$row['Flag'];
            
    
//}
//
//?>


<?php  include 'header.inc.php' ?>
<?php include 'sidenav.inc.php' ?>

    
<div class="container"> 
    <div class="col-md-9">
        
        <h2>Edit Article</h2>
                 
        <form enctype="multipart/form-data" action="Editarticle-process.php" method="POST" class="form-horizontal" role="form">
            <input type="hidden" name="ArticleID" value="<?php echo $ArticleID?>">
            <div class="form-group">
                <label for="inputTitle" class="col-md-3 control-label">Title</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="inputTitle" 
                    value="<?php echo $ArticleTitle?>" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputContent" class="col-md-3 control-label">Content</label>
                <div class="col-md-9">
                    <textarea class="form-control" rows="10" name="inputContent" id='inputContent' required><?php echo $ArticleContent?>
                    </textarea>
                </div>
            </div>        
            <label for="inputCategory" class="col-md-3 control-label" >Category</label>
            <div class="col-md-offset-3 col-md-9">
                <select name="inputCategory" id="inputCategory">                   
                    <option <?php if ($Interest=="Books"){echo "selected='selected'";}?>value="Books" >Books</option>
                    <option <?php if ($Interest=="Games"){echo "selected='selected'";}?>value="Games">Games</option>
                    <option <?php if ($Interest=="Movies"){echo "selected='selected'";}?>value="Movies">Movies</option>
                    <option <?php if ($Interest=="Modelkits"){echo "selected='selected'";}?>value="Modelkits">Model Kits</option>
                    <option <?php if ($Interest=="Others"){echo "selected='selected'";}?>value="Others">Others</option>
                </select>
            </div>
                        <div class="col-md-offset-3 col-md-9">
                            <label for="Image">Previous Image</label>
                                <img src=" <?php echo $ImageLocation;?>" width="150" height="150" class="img-responsive " alt="" class="thumbnail"/>                
                            </div>
                        <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <label for="Image">Upload Image</label>
                    <input type="file" name="Image" id="Image" >
                    <?php echo $ImageError;?>
                </div>
            </div>
                 <?php
                 //If user is admin than this will appear
                 if($Admin=='Yes'){ ?>
                <label for="inputFlag" class="col-md-3 control-label" >Flag</label>
               <div class="col-md-offset-3 col-md-9">
                <select name="inputFlag" id="inputFlag">                   
                    <option <?php if ($Flag=="Yes"){echo "selected='selected'";}?>value="Yes" >Yes</option>
                    <option <?php if ($Flag=="No"){echo "selected='selected'";}?>value="No">No</option>
                </select>
                </div>    
                 <?php }?>

            
            


            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-info" value='submit'>Edit Article</button>
                </div>
            </div>      
            
        </form>        
    </div>
</div>

<?php      }
        else{
         include 'header.inc.php';
         include 'sidenav.inc.php';
          echo "<div class=''>";
          echo "<h1>You are not allowed on this Page</h1>";
          echo "</div>";
        } ?>
