<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500&display=swap');

        * {
            font-family: 'Source Sans Pro', sans-serif;
        }

        nav {
            background-color: whitesmoke;
        }

        body {
            background-color: #202124;
            color: white;
        }

        /* Dropdown Button */
        .dropbtn {
            background-color: purple;
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 1rem;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 140px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            top: 48px;
            right: 0;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 6px 15px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: darkmagenta;
        }

        span {
            margin-left: 5px;
        }
    </style>

</head>

<body>

    <?php require '../icons.php' ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: relative;align-items:center;justify-content:space-between">

            <div class="items">

                <a class="navbar-brand " href="../index.php">[ Navbar ]</a>
                <a class="navbar-brand" href="./Popular.php" style="font-size: 15px; font-weight:bold;">Anime</a>

            </div>


            <div class="dropdown" style="font-size: 11px;">
                <button class="dropbtn">Pazzles</button>
                <div class="dropdown-content shadow">
                    <a href="profile.php">
                        <?php echo $user ?>
                        <span>Profile</span>

                    </a>
                    <a href="#">
                        <?php echo $watchlist ?>
                        <span>Watch List</span>

                    </a>
                    <a href="#">
                        <?php echo $logout ?>

                        <span>
                            Logout
                        </span>
                    </a>
                </div>
            </div>



        </nav>
    </header>


    <?php

    $id = $_GET['id'];
    $movie = findObjectById($id);

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


    function findObjectById($id)
    {

        $movies = $_SESSION['movies'];
        $array = $movies->top;

        foreach ($array as $element) {
            if ($id == $element->mal_id) {
                return $element;
            }
        }

        return false;
    }

    ?>


    <style>
        @media screen and (min-width: 500px) and (max-width: 5000px) {
            .detail{
                margin: 1rem auto;
                box-sizing: border-box;
                width: 90%;
                position: relative;
                font-weight: 300 !important;
                font-size: 15px;
                display: grid;
                grid-template-columns: 200px 1fr 100px;
                grid-column-gap: 1rem;
                justify-content: center;
                align-items: center;
            }
        }
       
        @media screen and (min-width:200px) and (max-width:490px) {
            .detail {

                margin: 1rem auto;
                box-sizing: border-box;
                width: 90%;
                position: relative;
                font-weight: 300 !important;
                font-size: 15px;
                display: grid;

                grid-template-columns: 1fr repeat(auto-fit,minmax(80px,1fr));
                grid-column-gap: 1rem;
                justify-content: center;
                align-items: center;


                }
        }
        

        .detail span {
            margin: 0;
            word-wrap: break-word;
            word-break: break-all;
        }

        .detail img {
            width: 100%;
            height: 100%;
            border-radius: 8px;
            object-fit: cover;
        }

        h6 {
            color: red;
        }

        .detail a:hover {
            text-decoration: none;
            color: red;
        }

        .props {
            width: 100%;
            height: 100%;
        }
        a{
            word-break: break-all;
        }
    </style>
    <!-- details -->

    <div class="detail">
        <img src="<?php echo $movie->image_url ?>" alt="">
        <div class="text">
            <h6><?php echo $movie->title ?></h6>

            <span>rank : <?php echo $movie->rank ?? 'null' ?></span><br>
            <span>start_date : <?php echo $movie->start_date ?? 'null' ?></span><br>
            <span>end_date : <?php echo $movie->end_date ?? 'null'  ?></span><br>
            <span>type : <?php echo $movie->type ?></span><br>
            <span>episodes : <?php echo $movie->episodes ?? 'null' ?></span><br>
            visit : <a href="<?php echo $movie->url ?? 'null' ?>"><?php echo $movie->url ?? 'null' ?></a><br>
            <span>episodes : <?php echo $movie->episodes ?? 'null' ?></span><br>
            <span>members : <?php echo $movie->members ?? 'null' ?></span><br>
            <span>score : <?php echo $movie->score ?? 'null' ?></span><br>

            <hr style="border-top: 1px solid red;">


        </div>

        <div class="props">

            <div class="item">
                <a href="">
                    <?php echo $addwishlist; ?>
                    <span style="margin-left: 5px;">Add to List</span>
                </a>
            </div>

        </div>

    </div>