<?php
session_start();
?>
<html>
<head>
    <script src="https://kit.fontawesome.com/f864103c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= WEBROOT.'asset/styles/Styles.css' ?>" />
    <script type="text/javascript" src="<?= WEBROOT.'asset/js/script.js'?>"></script>
    <script src="<?= WEBROOT ?>asset/js/jquery.min.js"></script>
    <script src="<?= WEBROOT ?>asset/js/panier.js"></script>

    <meta charset="utf-8" />
    <meta name="description" content="Neko & Inu site de vente de produit pourchien et chat" />
    <meta name="keywords" content="Inu, Neko, Chien, Chat" />
    <meta name="author" content="Emerick Dion,Nathan Barré" />
    <meta name="copyright" content="BTS SIO Neko&INU" />
    <meta name="viewport" />
</head>

<body>
    <header>
        <nav>
            <div class="navbar">
                <img src="<?= WEBROOT.'asset/Image/Logo.PNG' ?>" alt="logo">
                <div class="navbar-list">
                    <a href="<?= WEBROOT.'articles/article'?>">Article</a>
                    <a href="#">A propos</a>
                    <a href="#">Contact</a>
                    <a href="<?= WEBROOT.'utilisateur/connexion'?>">Se connecter</a>
                    <a class="nav-link" href="<?= WEBROOT ?>panier"><i class="fas fa-shopping-basket" style="padding: 10px; text-align: center;"></i>
                    <span id="total">
                        <?php
                            if(isset($_SESSION['totalpanier'])) 
                            {
                                if ($_SESSION['totalpanier']!=0)
                                {
                                    echo '<i class="badge badge-light">';
                                    echo $_SESSION['totalpanier'];
                                    echo '</i>';
                                }
                            }
                        ?>
                    </span>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="slogan">
        <?php 
        echo $content_for_layout; 
        ?>
    </div>
    <footer class="footerclass">
        <img id="logofooter" src="<?= WEBROOT.'asset/Image/Logo.PNG'?>" alt="logo">
        <div class="navbar-footer ">
            <a href="# ">Acheter</a>
            <a href="# ">A propos</a>
            <a href="# ">Contact</a>
        </div>
        <div class="footertext ">
            <h3>Conçu par Emerick.D et Nathan.B</h3>
        </div>
    </footer>
</body>

</html>