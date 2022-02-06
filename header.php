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
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap');

        * {
            font-family: 'Source Sans Pro', sans-serif;
        }
        body{
            background-color: #202124;
        }
        nav{
            background-color: whitesmoke;
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
        span{
            margin-left: 5px;
        }
    </style>

</head>

<body>

    <?php require 'icons.php' ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: relative;align-items:center;justify-content:space-between">

            <div class="items">

                <a class="navbar-brand " href="index.php">[ Navbar ]</a>
                <a class="navbar-brand" href="./Anime/Popular.php" style="font-size: 15px; font-weight:bold;">Anime</a>

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