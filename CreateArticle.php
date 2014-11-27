<!DOCTYPE html>
<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/CreateArticlecss.css" rel="stylesheet" type="text/css"/>
<script src="js/CreateArticlejs.js" type="text/javascript"></script>

<?php
session_start();
if(isset($_SESSION["USERNAME"])){
if (isset($_SESSION['CreateArticleError'])) {
    if ($_SESSION['ArticleTitleValid']) {
        /* To be place into value */
        $ArticleTitle = $_SESSION['ArticleTitle'];
        /* To be place into palceholder */
        $ArticleTitleValid = '';
        $ArticleTitleValidColor = 'alert-success';
    } else {
        /* To be place in value */
        $ArticleTitle = '';
        /* To be place into palceholder */
        $ArticleTitleValid = 'Please enter a Valid Title';
        $ArticleTitleValidColor = 'alert-danger';
    }
    if ($_SESSION['ArticleContentValid']) {
        /* To be place into value */
        $ArticleContent = $_SESSION['ArticleContent'];
        /* To be place into palceholder */
        $ArticleContentValid = '';
        $ArticleContentValidColor = 'alert-success';
    } else {
        /* To be place in value */
        $ArticleContent = '';
        /* To be place into palceholder */
        $ArticleContentValid = 'Article Content is Empty ';
        $ArticleContentValidColor = 'alert-danger';
    }

    if ($_SESSION['InterestValid']) {
        /* To be place into value */
        $Interest = $_SESSION['Interest'];
        /* To be place into palceholder */
        $InterestValid = '';
        $InterestValidColor = 'alert-success';
    } else {
        /* To be place into */
        /* To be place into palceholder */
        $Interest='0';
        $InterestValid = 'Please Select An Interest';
        $InterestValidColor = 'alert-danger';
    }
    if($_SESSION['ImageValid']==false){
         $ImgErrorMsg=$_SESSION['ImageError'];
         $ImageError="<div class='alert alert-danger' role='alert'>".$ImgErrorMsg."</div>";
    }
    
    /* Here it unset the createArticleError in case the user refreash here */
    unset($_SESSION['CreateArticleError']);
    unset($_SESSION['ArticleTitleValid']);
    unset($_SESSION['ArticleContentValid']);
    unset($_SESSION['InterestValid']);
    unset($_SESSION['ImageValid']);
} else {
    $ArticleTitle = '';
    $ArticleTitleValid = 'Title';
    $ArticleTitleValidColor = '';
    $ArticleContent = '';
    $ArticleContentValid = 'Content';
    $ArticleContentValidColor = '';
    $Interest = '0';
    $InterestValid = '';
    $InterestValidColor = '';
    $ImageError='';
}
?>
<?php include 'header.inc.php' ?>
<?php include 'sidenav.inc.php' ?>


<div class="container"> 
    <div class="col-md-9">

        <h2>Create Article</h2>
        <form name="category" enctype="multipart/form-data" action="CreateArticle-process.php" method ="POST" class="form-horizontal" role="form">           

            <div class="form-group">
                <label for="inputTitle" class="col-md-3 control-label">Title</label>
                <div class="col-md-9">
                    <input value="<?php echo $ArticleTitle?>" placeholder='<?php echo $ArticleTitleValid?>' 
                    type="text"  name="inputTitle" 
                    class="form-control <?php echo $ArticleTitleValidColor?>"
                    required >
                </div>
            </div>

            <div class="form-group">
                <label for="inputContent" class="col-md-3 control-label">Content</label>
                <div class="col-md-9">
                    <textarea required rows="10" name="inputContent" 
                    class="form-control <?php echo $ArticleContentValidColor?>" 
                    ><?php echo $ArticleContent?></textarea>
                </div>
            </div>        

            <div class="col-md-offset-3 col-md-9">
                <select name="inputCategory" id="inputCategory" >
                    <option <?php if ($Interest=="0"){echo "selected='selected'";}?>value="0" >Select any Category...</option>
                    <option <?php if ($Interest=="Books"){echo "selected='selected'";}?>value="Books" >Books</option>
                    <option <?php if ($Interest=="Games"){echo "selected='selected'";}?>value="Games">Games</option>
                    <option <?php if ($Interest=="Movies"){echo "selected='selected'";}?>value="Movies">Movies</option>
                    <option <?php if ($Interest=="Modelkits"){echo "selected='selected'";}?>value="Modelkits">Model Kits</option>
                    <option <?php if ($Interest=="Others"){echo "selected='selected'";}?>value="Others">Others</option>
                </select>
            </div>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <label for="file">Upload Image</label>
                    <input required type="file" name="file" id="file" required>
                    <?php echo $ImageError;?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <button type="register" class="btn btn-info" class="btn btn-default" onclick="val()">Create Article</button>
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

