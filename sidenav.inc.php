<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
<nav class="nav nav-tabs pull-left" id="mainnav">
    <ul class="nav navbar-form" id="sidenav">
            <li <?php if ($currentPage == "index.php") {echo 'id="here"';}?>> 
                <a href="index.php" class="active"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <li <?php if ($currentPage == "movies.php") {echo 'id="here"';}?>> 
                <a href="movies.php" class="active"><span class="glyphicon glyphicon-film"></span> Movies</a>
            </li>
            <li <?php if ($currentPage == "model.php") {echo 'id="here"';}?>>
                <a href="model.php" class="active"><span class="glyphicon glyphicon-gift"></span> Model Kits</a>
            </li>
            <li <?php if ($currentPage == "book.php") {echo 'id="here"';}?>>
                <a href="book.php" class="active"><span class="glyphicon glyphicon-book"></span> Books</a>
            </li>
            <li <?php if ($currentPage == "games.php") {echo 'id="here"';}?>>
                <a href="games.php" class="active"><span class="glyphicon glyphicon-headphones"></span> Games</a>
            </li>
            <li <?php if ($currentPage == "random.php") {echo 'id="here"';}?>>
                <a href="random.php" class="active"><span class="glyphicon glyphicon-globe"></span> Anything Under The Sun</a>
            </li>
    </ul>
    <form action="SearchArticle.php" method="GET" class="navbar-form navbar-right">      
            <div class="form-group">
                <input name='search' id ='search' type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <h4><font size="5" face="Georgia, Arial" color="Red">Upcoming Events<font></h4>
    <div id="event" class="carousel slide" data-interval="3000" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#event" data-slide-to="0" class="active"></li>
            <li data-target="#event" data-slide-to="1"></li>
            <li data-target="#event" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <a href="http://animefestival.asia/afa2014/">
                     <img src="images/afa.png" alt="First slide"/>
                </a>
            </div>
            <div class="item">
                <a href="http://www.imdb.com/title/tt2310332/">
                    <img src="images/movie.jpg" alt="Second slide"/>
                </a>
            </div>
            <div class="item">
                <a href="http://zoukout.com/2014/">
                    <img src="images/zouk.jpg" alt="Third slide"/>
                </a>
            </div>
        </div>

        <a class="left carousel-control" href="#event" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#event" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</nav>
