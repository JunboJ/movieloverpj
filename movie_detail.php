<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link href="//amp.azure.net/libs/amp/2.2.4/skins/amp-default/azuremediaplayer.min.css" rel="stylesheet">

</head>
<body id="body">
        <nav id="topnavbar" class="navbar navbar-expand-lg">
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
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
    <?php
        session_start();

        $_SESSION['movieID'] = 4;
        $_SESSION['userID'] = 2;
        $movieID = $_SESSION['movieID'];
        $userID = $_SESSION['userID'];

        include 'connection.php';
        
        // for showing movie info
        $sql = "SELECT title, poster, releasedate, trailerURL, description FROM movies WHERE movieID = $movieID";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    ?>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
    <div id="trailerdiv" class="text-xm-center text-sm-center text-md-left text-lg-left">
        <!-- <video id="azuremediaplayer" class="azuremediaplayer amp-default-skin amp-big-play-centered" tabindex="0"></video> -->
        <div id="videodiv">
            <video id="video" autoplay loop>
                    <!-- $vpath = "video/";
                    // echo '<source src='.$vpath.$row[3].'>'; -->
                    <source src="video/thelionking.mov">
            </video>
        </div>

        <div id="controlset" class="text-right">
            <button id="vbtn" class="btn btn-outline-light" onclick="vbtn();">pause</button>
        </div>

        <div id="contentonvideo" class="text-xm-center text-sm-center text-md-left text-lg-left">
            <div id="postercol" class="row videoinfo">
                <div class="col-xm-4 col-sm-4 col-md-3 col-lg-1">
                    <?php 
                        $imgpath = 'img/';
                            echo '<img src='.$imgpath.$row[1].' style = "width: 100%; max-width:160px; height:auto"> <br>';
                    ?>
                </div>
                <div class="col-xm-8 col-sm-8 col-md-9 col-lg-11">
                    <h1 id="movieTitle"><?php echo $row[0]?></h1>
                    <?php echo "<p>".$row[2]."</p>"; ?>
                    <button class = "btn btn-default" id = "atl_btn"></button>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#bookticketform" onclick="getareDropitem();">
                        Book Ticket
                    </button>
                </div>
            </div>
        </div>
    </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!-- Button trigger modal -->
<div class="modal fade" data-backdrop="false" id="bookticketform" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <a href="#" id="testfield">test</a> -->

                <?php
                    $abt = 'areabtntext';
                    
                ?>
                <!-- choose area -->
                <div class="row">
                    <div class="col-xm-4 col-sm-4 col-md-4 col-lg-4 text-right">
                        Choose your lacation: 
                    </div>
                    <div class="col-xm-8 col-sm-8 col-md-8 col-lg-8 text-left">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="#" id="areabtntext">Location list</a>
                            </button>
                            <div class="dropdown-menu" id="areadrop">
                                <!-- generated in bookingform_onload.php -->
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- choose theater -->
                <div class="row">
                    <div class="col-xm-4 col-sm-4 col-md-4 col-lg-4 text-right">
                        Theater:
                    </div>
                    <div class="col-xm-8 col-sm-8 col-md-8 col-lg-8 text-left">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="#" id="theaterbtntext">Theater list</a>
                            </button>
                            <div class="dropdown-menu" id="theater_dropdown">
                                <!-- generated in theatername_onclick.php -->
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- choose session -->
                <div class="row">
                    <div class="col-xm-4 col-sm-4 col-md-4 col-lg-4 text-right">
                        Session:
                    </div>
                    <div class="col-xm-8 col-sm-8 col-md-8 col-lg-8 text-left">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="#" id="sessionbtntext">Session list</a>
                            </button>
                            <div class="dropdown-menu" id="sessiondrop">
                                <!-- generated in session_onclick.php -->
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- choose seats -->
                <div class="row">
                    <div class="col-xm-4 col-sm-4 col-md-4 col-lg-4 text-right">
                        How many seats? 
                    </div>
                    <div class="col-xm-8 col-sm-8 col-md-8 col-lg-8 text-left">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="#" id="seatbtntext">0</a>
                            </button>
                            <div class="dropdown-menu" id="seatsdrop">
                                <!-- generated in seats_onclick.php -->
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="bookthisticket()">Save changes</button>
            </div>
            </div>
        </div>
    </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->


    <div class="row">
        <div class="col-xm-2 col-sm-2 col-md-2 col-lg-2"></div>
        <div class="col-xm-8 col-sm-8 col-md-8 col-lg-8">
            <div id="poster_synopsis" class="row">
                
                <div class="col-xm-9 col-sm-9 col-md-9 col-lg-9">

                    <h1>Synopsis</h1><br><br>
                    <?php 
                        echo "<h4>".$row[3]."<h4>";
                    ?>
                </div>
            </div>
            <hr>
            <div class="news" class="row">
                <h2>News</h2>
                <ul>
                    <li><a>asdf</a></li>
                    <li><a>asdf</a></li>
                </ul>
            </div>
        </div>
        <div class="col-xm-2 col-sm-2 col-md-2 col-lg-2"></div>
    </div>
    <!-- //////////////////////////////////////////////////////////// -->
    
    <!-- //////////////////////////////////////////////////////////// -->

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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="//amp.azure.net/libs/amp/2.2.4/azuremediaplayer.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>


</body>
</html>