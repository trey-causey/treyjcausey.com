<?php
require __DIR__ . '/vendor/autoload.php';
use GuzzleHttp\Client;

$baseURI = 'https://api.weather.com/v2/pws/dailysummary/';
$queryString = '7day?stationId=KTNCHATT191&format=json&units=e&apiKey=e61ff8b86b5f4eba9ff8b86b5feebaf0';

$client = new Client(['base_uri' => $baseURI]);
$request = $client->request('GET', $queryString);
$body = $request->getBody();
$data_string = $body->getContents();
$temps = json_decode($data_string);

$dewptArray = Array();

for($i = 0; $i<7; $i++) {
    $dewptArray[$i] = $temps->summaries[$i]->imperial->dewptAvg;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Starter Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href=https://api.weather.com/v2/pws/dailysummary/7day?stationId=KTNCHATT191&format=json&units=e&apiKey=e61ff8b86b5f4eba9ff8b86b5feebaf0">wunderground link</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Portfolio Page<br> </p>
        <div class="container">
            <div class="row">
                <div class="col"><h4><?php echo date("D M d Y"). ', sunrise time : ' .date_sunrise(time(), SUNFUNCS_RET_STRING, 35.025543, -85.132431, 90, -4);?></h4></div>
                <div class="col"><h4><?php echo date("D M d Y"). ', sunset time : ' .date_sunset(time(), SUNFUNCS_RET_STRING, 35.025543, -85.132431, 90, -4);?></h4></div>
        <section class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col">Dew Point Temps By Day</div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">Sunday</div>
                <div class="col">Monday</div>
                <div class="col">Tuesday</div>
                <div class="col">Wednesday</div>
                <div class="col">Thursday</div>
                <div class="col">Friday</div>
                <div class="col">Saturday</div>
            </div>

            <div class="row">

                <div class="col"><?php echo $dewptArray[0] ?></div>
                <div class="col"><?php echo $dewptArray[1] ?></div>
                <div class="col"><?php echo $dewptArray[2] ?></div>
                <div class="col"><?php echo $dewptArray[3] ?></div>
                <div class="col"><?php echo $dewptArray[4] ?></div>
                <div class="col"><?php echo $dewptArray[5] ?></div>
                <div class="col"><?php echo $dewptArray[6] ?></div>
            </div>
            <div class="row">1</div>
            <div class="row">2</div>
            <div class="row">3</div>
        </section>

            </div>
                <div class="row">
                    <div class="col-sm">1<?php ?> </div>
                    <div class="col-sm">2<?php ?> </div>
                </div>
            <div class="">
            </div>

        </div>
    </div>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script></body>
</html>
