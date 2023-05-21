<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/Calendar.css">
    <link rel="stylesheet" href="./../styles/header.css">
    <link href="./../styles/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<header class="HeaderHomepage">

<?php include './../scr/menu.php';?>
  
</header>

    <h1>Calendrier du mois</h1>

    <div class="container py-7">
        <h2 class="text-uppercase text-letter-spacing-xs my-0 text-primary font-weight-bold">
            Liste des factures
        </h2>
        <div class="row">
          <div class="col-lg-4 mb-3" id="Friday, Nov 13th">
            <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
              Friday, Nov 13th
            </h4>
            <ul class="list-timeline list-timeline-primary">
              <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">09:00 - 10:00</span> - Registration</p>
              </li>
              <li class="list-timeline-item show p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse" data-target="#day-1-item-2">
                <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-primary font-weight-bold op-8 infinite animated flash" data-animate="flash" data-animate-infinite="1" data-animate-duration="3.5" style="animation-duration: 3.5s;">Now</span> - Vitaly Friedmann</p>
                <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8 show" id="day-1-item-2"> Talk: Wireframing / <span class="text-primary">Room 19</span> </p>
              </li>
              <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">12:00 - 13:00</span> - Lunch Break</p>
              </li>
              <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse" data-target="#day-1-item-4">
                <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">13:00 - 15:00</span> - Anthony Jonas</p>
                <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-1-item-4"> Talk: OpenData / <span class="text-primary">Room 31</span> </p>
              </li>
              <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">15:00 - 16:00</span> - Coffee Break</p>
              </li>
              <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse" data-target="#day-1-item-6">
                <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">16:00 - 18:00</span> - Jesscia Lawrence</p>
                <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-1-item-6"> Talk: Ninja coding / <span class="text-primary">Room 31</span> </p>
              </li>
              <li class="list-timeline-item p-0 pb-3 d-flex flex-wrap flex-column">
                <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">18:00 - 23:00</span> - After conference</p>
              </li>
            </ul>
          </div>
        </div>
    </div>

<!--footer-->
<?php include './../scr/footer.php'; ?>
</body>
</html>