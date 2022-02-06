
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
            color: while;
        }

        body{
            background-color: #202124;
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
        .popular-movies{
        margin: 1rem;
        display: grid;
        grid-template-columns: repeat(auto-fit,minmax(80px,100px));
        grid-column-gap: .5rem;
        grid-row-gap: 1rem;
        justify-content: center;
    }
    img{
        width: 100%;
        height: 16vh;
        object-fit: cover;
        border-radius:8px;
        border-bottom: 1rem;
    }
    .card{
        position: relative;
        background-color: inherit;
        display: flex;
        flex-direction: column;
        border: none;
        justify-content: space-between;

    }
    .des{
        display: flex;
        justify-content: center;
    }
    h4{
        font-size: 10px;
        color: white;
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



<h5 style="margin:2rem 0 2rem 1rem;color:white;">Popular Movies</h5>

<div class="popular-movies">

<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://jikan1.p.rapidapi.com/top/anime/1/upcoming",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: jikan1.p.rapidapi.com",
		"x-rapidapi-key: a727be058fmsh14b361003c62d7ep10c3e6jsnadfedf1d19ef"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {

    $decord = json_decode($response);
    $sizePerpage = 12;
    $page =0;
    $pagecount = count($decord->top)/$sizePerpage;

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $startfrom = ($page -1) * $sizePerpage;
    $total = $page* $sizePerpage;

    
    if($total > count($decord->top)) $total = count($decord->top);

    for($x = $startfrom; $x < $total ; $x++){
        $movie = $decord->top[$x];
?>


        <!-- html here -->
        <a href="./Detail.php?id=<?php echo $movie->mal_id ?>  ">
            <div class="card" >
                    <img src="<?php echo $movie->image_url ?>" alt="">

                    <div class="des">
                        <h4>
                            <?php
                            if(strlen($movie->title) > 25){
                                echo substr($movie->title,0,15) .' ...';

                                $_SESSION['movies'] = $decord;

                            }else{
                                echo $movie->title; 

                            }
                           

                        ?>
                        </h4>
                    
                    </div>

            </div>
        </a>
            

<?php }}?>

</div>

<!-- style -->
<style>
    
    .pagination{
        border-radius: 0;
        margin: 0 auto;
        background-color: #eee;
        display: inline-block;
    }
    .pagination a {
  color: black;
  float: left;
  padding: 0px 10px;
  text-decoration: none;
}
    .pagination a:hover{
        background-color: purple;
    }

</style>

<div class="pagination" >

<!-- previus -->
    <?php 
        if($page != 1) 
            echo '<a href="./Popular.php?page=' .$page-1 .'">previous</a>';

    ?>

    <?php for($i = 0;$i<$pagecount;$i++){     
    ?>
    <a href="./Popular.php?page=<?php echo $i+1 ?>"><?php echo $i+1 ?></a>

    <?php }?>

    <!-- next -->
    <?php 
        if($page < $pagecount) 
            echo '<a href="./Popular.php?page=' .$page+1 .'">next</a>';
    ?>
</div>



<?php require '../footer.php' ?>
