<!DOCTYPE html>
<html lang="en">



<body>

    <footer class="text-center text-white" style="background-color: #00ced1;">
        <!-- Grid container -->
        <div class="container p-4">
            <div class="col-lg-2">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                <a class="nav-link" href="./../Main/home-page.php"><img src="./../Main/logo_home.png" title="The worrisome optimist" alt="logo du site" class="img" /></a>
                </div>
            </div>
        </div>
        </div>
        <!-- Grid container -->
        <div class="text-center p-3" style="background-color: rgba(0, 150, 170, 0.2);">
            <?php
            $currentDate = date('j F Y');
            echo $currentDate;
            echo "<br> Il est " . date("H:i:s");
            ?>
        </div>

    </footer>

</body>

</html>