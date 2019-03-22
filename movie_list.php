<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link href="//amp.azure.net/libs/amp/2.2.4/skins/amp-default/azuremediaplayer.min.css" rel="stylesheet">

</head>

<body>
    <!-- nav part///////////////////////////////////////////////////////////// -->
    <nav id="topnavbar" class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img id="logo_pic" src="img/logomovielover.png"></a>
            

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">MOVIES</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">NEWS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">LOGIN</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    <!-- nav end///////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="row text-center">
        <div>
            <?php
            session_start();
            $_SESSION['userid'] = 1;

            include 'connection.php';
            
            // for showing movie info
            $sql = "SELECT movieID, title, poster, releasedate FROM movies";
            $result = mysqli_query($conn,$sql);

            //movie info store here as 2d array
            $row = mysqli_fetch_all($result);
            
                //check how many movies are in DB
                for ($a = 0; $a < count($row); $a++) {
                    //show 4 movies in a row
                    //echo col
                    echo "<div class='movieUnit text-center'>";//a2

                    //layout in one col -poster
                    $imgpath = 'img/';
                    echo "<div class='text-center posterunit' onclick='gotomoviedetail(".$row[$a][0].")'>";
                    echo '<img src='.$imgpath.$row[$a][2].' onclick="gotomoviedetail('.$row[$a][0].')"> <br>';
                    echo "</div>";

                    //layout in one col -title
                    echo "<div class='text-center'>";
                    echo "<p>".$row[$a][1]."</p>";
                    echo "</div>";

                    //layout in one col -release date
                    echo "<div class='text-center'>";
                    echo "<p>".$row[$a][3]."</p>";
                    echo "</div>";

                    //layout in one col -button set
                    echo "<div>";//a3

                    //add to list btn
                    echo "<div class='btnset text-center'>";
                    // echo "<button class = 'btn btn-default' id = 'atl_btn_".$row[$a][0]."'></button>";
                    // echo "<button type='button' class='btn btn-default' data-toggle='modal' data-target='#bookticketform' onclick='getareDropitem();'>Book Ticket</button>";
                    echo "</div><br>";

                    echo "</div>";//a3

                    echo "</div>";//a2

                    function gotomoviedetail ($mid) {
                        $_SESSION['movieid'] = $mid;
                    };

                }
            ?>
        </div>
    </div>
    <div>
        <footer id="footer" class="">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <br>
                <p>Copyright © 2019 Movie Lover, All Rights Reserved </p></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <br>  
                <img src="img/socialmedia.png" width="100px">
                </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="//amp.azure.net/libs/amp/2.2.4/azuremediaplayer.min.js"></script>
    <script type="text/javascript" src="js/movielist.js"></script>

</body>

</html>