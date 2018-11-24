 <!-- Required meta tags -->
    <meta charset="utf-8">
    <?php include './inc/mysql.class.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!--<link href="css/carousel.css" rel="stylesheet" type="text/css"/>-->
    <title>Come lo chiamo io</title>
    <body>
        <div class="group-input">
            <form name="cerca" method="post" action="<?php $_SERVER['SELF']; ?>">
                <input class="form-control" type="text" value="" required="" name="cerca">
            <input class="form-control" type="text" value="" name="titolo">
            <input class="form-control" type="date" value="dd/mm/yyyy" name="data">
            <select name="genere">
                <option value="Informatica">Informatica</option>
            </select>
            </form>
        </div>
    </body>