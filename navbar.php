<?php
session_start();
require_once("db.php");
?>
<section id="header">
    <a href="index.php">
        <img src="img/logo.png" alt="homeLogo">
    </a>

    <div>
        <ul id="navbar">
            <li class="link">
                <a class="active " href="index.php"></a>
            </li>
            <li class="link">
                <a href="shop.php"></a>
            </li>
            <li class="link">
                <a href="blog.php">Blog</a>
            </li>
            <li class="link">
                <a href="about.php">About</a>
            </li>
            <li class="link">
                <a href="contact.php">Contact</a>
            </li>
            <?php
        if(isset($_SESSION['user_login']))
        {
            
        }
        else
        {
            echo '<li class="link">
                    <a href="signup.php">sign up</a>
                </li>';
        }
        ?>

            <li class="link">
                <a href="lang.php?lang=en">English</a>
            </li>
            <li class="link">
                <a href="lang.php?lang=ar">Arabic</a>
            </li>

            <?php
        if(isset($_SESSION['user_login']))
        {
            echo '<li class="link">
                    <a href="logout.php">Logout</a>
                </li>';
        }
        else
        {
            echo '<li class="link">
                    <a href="login.php">Login</a>
                </li>';
        }
        ?>


            <?php
             if ( isset($_SESSION['user_type']) && count_card($_SESSION['user_id']) > 0): ?>
            <a class="nav-icon position-relative text-decoration-none" href="cart.php">
                <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                    <?= count_card($_SESSION['user_id']); ?>
                </span>
            </a>
            <?php endif; ?>

            <a href="#" id="close"><i class="fas fa-times"></i> </a>
        </ul>

    </div>

    <div id="mobile">
        <a href="cart.html">
            <i class="fas fa-shopping-cart"></i>
        </a>
        <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
    </div>
</section>