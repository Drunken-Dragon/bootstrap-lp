<?php
    require_once("session.php");
    if(checkSession())
    {
        die(header("Location: login.php"));
    }

    session_start();

    if (empty($_SESSION['key'])) {
        $_SESSION['key'] = bin2hex(random_bytes(32));
    }

    $csrf = hash_hmac('sha256', 'this is the security token for task number five', $_SESSION['key']);

    $_SESSION['csrf'] = hash_hmac('sha256', 'this is the security token for task number five', $_SESSION['key']);
 ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Landingi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="background-image"></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="post">
                    <input type="submit" class="btn btn-danger" name="logout" value="LOGOUT"/>
                </form>
                <p class="header-top text-center">SIGN UP</p>
                <p class="h1 text-center">FOR MY FREE WEBINAR</p>
                <p class="h5 text-center">WHEN WE START</p>
                <div id="countdown" class="countdown">
                    <div class="row justify-content-center">
                        <div class="countdown-item">
                            <div id="countdown-days" class="countdown-number">&nbsp;</div>
                            <div class="countdown-label">Days</div>
                        </div>
                        <div class="countdown-item">
                            <div id="countdown-hours" class="countdown-number">&nbsp;</div>
                            <div class="countdown-label">Hours</div>
                        </div>
                        <div class="countdown-item">
                            <div id="countdown-minutes" class="countdown-number">&nbsp;</div>
                            <div class="countdown-label">Minutes</div>
                        </div>
                        <div class="countdown-item">
                            <div id="countdown-seconds" class="countdown-number">&nbsp;</div>
                            <div class="countdown-label">Seconds</div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="button" class="button1">REGISTER NOW</button>
                </div>
                <p class=" h6 text-center">Hurry up, the number of members is limited!</p>
            </div>
        </div>
    </div>

    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p class="h4 vertical-align">WHAT YOU GONNA LEARN</p>
                    <p class="auxiliary-heading">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
                <div class="col-sm-6">
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="h4 white">ABOUT ME</p>
                <p class="auxiliary-heading">Few words about me</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row about-me">
            <div class="col-sm-4">
                <img src="about_me.jpg" width="320" height="320" alt="George Wood">
            </div>
            <div class="col-sm-8 white-background">
                <p class="h4">George Wood</p>
                <p class="auxiliary-heading">CEO of Company.com</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a ex elit. Donec consectetur nunc id
                    venenatis luctus. Suspendisse metus turpis, mollis sit amet luctus vitae, mattis a ipsum. Proin vitae
                    maximus mauris. Integer sagittis ullamcorper commodo. Nullam at vehicula arcu. Vestibulum ante ipsum
                    primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque ut justo enim. Donec
                    vitae turpis aliquam, pretium ex eget, dignissim est. Cras risus risus, commodo sit amet arcu non,
                    interdum gravida est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                    himenaeos. Vivamus vulputate nec odio in ullamcorper. Curabitur nec diam dapibus, sodales nibh</p>
            </div>
        </div>
    </div>

    <div class="jumbotron no-margin-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="h4">LAST WEBINARS</p>
                    <p class="auxiliary-heading">Videos from my last webinars</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="player-left">
                    <iframe width=100% height=100% src="https://www.youtube.com/embed/_Qz5yhNAZps" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="player-right">
                    <iframe width=100% height=100% src="https://www.youtube.com/embed/_Qz5yhNAZps" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="h4 testimonials">TESTIMONIALS</p>
                    <p class="auxiliary-heading">What people say about me</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="background-box">
                        <p class="h5 black">Paul Smith</p>
                        <p class="auxiliary-heading">CEO of Company.com</p>
                        <p>Ut porta risus at feugiat malesuada. Phasellus tempor magna eu enim placerat mattis. Maecenas
                            rutrum tellus accumsan convallis fringilla. Mauris bibendum, est non lobortis tincidunt, leo
                            libero malesuada mauris, ut lobortis orci libero a enim. Morbi tincidunt tellus ac urna euismod
                            ultricies eu in magna. Phasellus id massa accumsan convallis fringilla.o malesuada mauris, ut
                            lobortis orci libero a enim. Morbi tincidunt tellus ac urna</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="background-box">
                        <p class="h5 black">Paul Smith</p>
                        <p class="auxiliary-heading">CEO of Company.com</p>
                        <p>Ut porta risus at feugiat malesuada. Phasellus tempor magna eu enim placerat mattis. Maecenas
                            rutrum tellus accumsan convallis fringilla. Mauris bibendum, est non lobortis tincidunt, leo
                            libero malesuada mauris, ut lobortis orci libero a enim. Morbi tincidunt tellus ac urna euismod
                            ultricies eu in magna. Phasellus id massa accumsan convallis fringilla.o malesuada mauris, ut
                            lobortis orci libero a enim. Morbi tincidunt tellus ac urna</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="h2 text-center">FOR MY FREE WEBINAR</p>
                <p class="text-center header-bottom">SIGN UP NOW!</p>
                <div class="row justify-content-center">
                    <form class="" action="formularz.php" method="post" accept-charset="utf8">
                        <div class="form-group">
                            <label for="nameSurname"></label>
                            <input type="text" class="form-control ghost rounded-0" id="nameSurname"
                                   placeholder="Name and Surname" name="name">
                            <label for="email"></label>
                            <input type="text" class="form-control ghost rounded-0" id="email" placeholder="E-mail address"
                                   name="email">
                            <label for="phone"></label>
                            <input type="text" class="form-control ghost rounded-0" id="phone" placeholder="Phone number"
                                   name="phone">
                            <input type="hidden" name="csrf" value="<?= $csrf ?>">
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" name="submit" class="button2">REGISTER NOW</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/jquery.countdown.min.js" type="text/javascript"></script>
    <script src="js/front.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>
<?php
    function sessionClose()
    {
        unset($_SESSION['username']);
        header("Location: login.php");
    }
    if(array_key_exists('logout',$_POST)){
        sessionClose();
    }
?>