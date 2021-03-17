<?php
require './utilities/connection.php';
require 'setenv.php';

session_start();

if(!isset($_SESSION['loggedin'])){
    header('Location: login.php');
    exit;
} ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
     <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<nav class="navbar is-light">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="login.html">
                    <span class="icon is-large">
                <i class="fas fa-home"></i>
              </span>
                    <span>Home</span>
                </a>
                <div class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <!-- navbar link go here -->
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                        <a href="movie_insert_form.php" class="button">
                                <span class="icon"><i class="fas fa-user"></i></span>
                                <span>Add New Show</span>
                            </a>
                            <a href="login.php" class="button">
                                <span class="icon"><i class="fas fa-user"></i></span>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>




    <main role="main" class="container">
        <h1>Natalie's Favorite Shows</h1>


<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./show/show.php');

    $show = new show();
    $shows = $show->getMyTvshows();

    $arrlength = count($shows);

    for($x = 0; $x < $arrlength; $x++) {
        echo '<div class="card">
                <div class="card-content">
                <header class="content">' . $shows[$x]->getTvshowTitle() . '</header>
                    <div class="content">' . $shows[$x]->getTvshowCreator() . '</div>
                    <div class="content">' . $shows[$x]->getTvshowDate() . '</div>
                    
                    <button onClick="window.location.href=\'edit.php?id=' . $shows[$x]->getTvshowId() . '\'" class="button">Edit
                </div>
            </div>';
    }
?>

    </main>

