<?php


class Blackjack
{
    // the total score
    public $score;

    public function __construct()
    {

    }
    // to return a random number
    public function Hit()
    {
        return $randomNum = rand(1, 11);
    }

    // end player turn and start the dealer's turn
    public function Stand()
    {
        //if($_SESSION["playerTotalPoint"] == 0 ){
            $point1 = $this->Hit();
            $point2 = $this->Hit();

            echo " <br/>   card 1 : ".$point1 ;
            echo " <br/>   card 2 : ".$point2 ;

            $total = $point1 + $point2 ;
  /*      }else{
            $total = $this->Hit();

            echo " <br/>   card 1 : ".$total ;
        }

        if($_SESSION["playerTotalPoint"] == 0 ){
            $point1 = $this->Hit();
            $point2 = $this->Hit();

            echo " <br/>   card 1 : ".$point1 ;
            echo " <br/>   card 2 : ".$point2 ;

            $total = $point1 + $point2 ;
        }*/

        if ("dealer" == $_SESSION["whoNow"] ){
            $this->score = $_SESSION["dealerTotalPoint"]  +=  $total;
            echo "<br/>The total dealer points ". $_SESSION["dealerTotalPoint"];
            echo "<br/>The total player points ". $_SESSION["playerTotalPoint"];

        }else{
            $this->score = $_SESSION["playerTotalPoint"]  +=  $total;
            echo "<br/>The total dealer points ". $_SESSION["dealerTotalPoint"] ;
            echo "<br/>The total player points ". $_SESSION["playerTotalPoint"];
        }

        return $this->status();

    }

    // surrender the game
    public function Surrender()
    {
      echo " <br/> your score is ". $_SESSION["playerTotalPoint"] . "<br/> my score is ".$_SESSION["dealerTotalPoint"]. " <br/> <a href='game.php'>hit more</a> <br/>";
    }

    public function newGame()
    {
        echo "next time :*  <br/> <a href='index.php'>Start again</a> <br/>";
        $_SESSION["playerTotalPoint"] = 0 ;
        $_SESSION["dealerTotalPoint"] = 0 ;

    }

    public function status (){
        if ($this->score > 21) {
            echo "<br/>looooose <br/>";
            $status = 0 ;
        }

        // you can play again
        if ($this->score < 21) {
            echo "<br/>you can play again<br/>";
            $status = 1 ;
        }

        // black jack
        if ($this->score == 21) {
            echo "<br/> OMG you did it <br/>";
            $status = 2 ;
        }
        return $status ;
    }

}