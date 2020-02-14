<?php
include 'Blackjack.php';
session_start();
$playerGame = new Blackjack();
$dealerGame = new Blackjack();

?>


<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<h3>Gooooooo </h3>

<?php



if (isset($_POST['NewGame'])) {
    $stopHits= 0;
    $stopStand = 0 ;
    $stopSurrender = 0;

    $playerGame->newGame();
}

    if (isset($_POST['morePoints'])) {
        //$_SESSION["whoNow"] = "player";
        $_SESSION["whoNow"] = "player";
        //$randomNum = $playerGame->Hit();
       // $_SESSION["playerTotalPoint"] += $randomNum;

        $resultPlayer = $playerGame->Stand();
        // you are lose
        if($resultPlayer == 0){
            $stopHits = 0;
            $stopStand = 0 ;
            $stopSurrender = 0;
        }
        // you can play again
        if($resultPlayer == 1){

        }
        // black jack
        if($resultPlayer == 2){
            $stopHits = 0;
            $stopStand = 0 ;
            $stopSurrender = 0;
        }

    }

    if (isset($_POST['Stand'])) {
        $_SESSION["whoNow"] = "dealer";
        $stopHits = 0;
       $resultDealer = $dealerGame->Stand();

        // you are lose
        if($resultDealer == 0){
            $stopHits = 0;
            $stopStand = 0 ;
            $stopSurrender = 0;
        }
        // you can play again
        if($resultDealer == 1){

        }
        // black jack
        if($resultDealer == 2){
            $stopHits = 0;
            $stopStand = 0 ;
            $stopSurrender = 0;
        }

    }

    if (isset($_POST['Surrender'])) {
        $stopHits = 0;
        $stopStand = 0;
        $playerGame->Surrender();
    }

?>


<form method="POST">
    <button type="submit" class="btn btn-primary" name="morePoints" id="morePoints" <?php if ($stopHits == '0') { ?> disabled <?php } ?> > Hits Hits Hits</button>
    <button type="submit" class="btn btn-primary" name="Stand" id="Stand" <?php if ($stopStand == '0') { ?> disabled <?php } ?> > Stand -_-</button>
    <button type="submit" class="btn btn-primary" name="Surrender" id="Surrender" <?php if ($stopSurrender == '0') { ?> disabled <?php } ?> > Surrender *-*</button>
    <button type="submit" class="btn btn-primary" name="NewGame" id="NewGame"> NewGame O_o </button>
</form>


</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</html>
