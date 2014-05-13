<?php

session_start();

include("../includes/header.php");

if(!isset($_SESSION['uid'])){

    echo "You must be logged in to view this page!";

}else{

    if(isset($_POST['gold'])){

        $turns = protect($_POST['turns']);

        $id = protect($_POST['id']);

        $user_check = mysql_query("SELECT * FROM `stats` WHERE `id`='".$id."'") or die(mysql_error());

        if(mysql_num_rows($user_check) == 0){

            output("There is no user with that ID!");

        }elseif($turns < 1 || $turns > 10){

            output("You must attack with 1-10 turns!");

        }elseif($turns > $stats['turns']){

            output("You do not have enough turns!");

        }elseif($id == $_SESSION['uid']){

            output("You cannot attack yourself!");

        }else{

            $enemy_stats = mysql_fetch_assoc($user_check);

            $attack_effect = $turns * 0.1 * $stats['attack']; //10% attack power per turn

            $defense_effect = $enemy_stats['defense'];

            

            echo "You send your warriors into battle!<br><br>";

            echo "Your warriors dealt " . number_format($attack_effect) . " damage!<br>";

            echo "The enemy's defenders dealt " . number_format($defense_effect) . " damage!<br><br>";

            if($attack_effect > $defense_effect){

                $ratio = ($attack_effect - $defense_effect)/$attack_effect * $turns;

                $ratio = min($ratio,1);

                $gold_stolen = floor($ratio * $enemy_stats['gold']);

                echo "You won the battle! You stole " . $gold_stolen . " gold!";

                $battle1 = mysql_query("UPDATE `stats` SET `gold`=`gold`-'".$gold_stolen."' WHERE `id`='".$id."'") or die(mysql_error()); //take their gold

                $battle2 = mysql_query("UPDATE `stats` SET `gold`=`gold`+'".$gold_stolen."',`turns`=`turns`-'".$turns."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error()); //update our gold

                $battle3 = mysql_query("INSERT INTO `logs` (`attacker`,`defender`,`attacker_damage`,`defender_damage`,`gold`,`food`,`time`) 

                                        VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defense_effect."','".$gold_stolen."','0','".time()."')") or die(mysql_error()); //create a log

                $stats['gold'] += $gold_stolen;

                $stats['turns'] -= $turns;

            }else{

                echo "You lost the battle!";

            }

        }

    }elseif(isset($_POST['food'])){

        $turns = protect($_POST['turns']);

        $id = protect($_POST['id']);

        $user_check = mysql_query("SELECT * FROM `stats` WHERE `id`='".$id."'") or die(mysql_error());

        if(mysql_num_rows($user_check) == 0){

            output("There is no user with that ID!");

        }elseif($turns < 1 || $turns > 10){

            output("You must attack with 1-10 turns!");

        }elseif($turns > $stats['turns']){

            output("You do not have enough turns!");

        }elseif($id == $_SESSION['uid']){

            output("You cannot attack yourself!");

        }else{

            $enemy_stats = mysql_fetch_assoc($user_check);

            $attack_effect = $turns * 0.1 * $stats['attack'];

            $defense_effect = $enemy_stats['defense'];

            

            echo "You send your warriors into battle!<br><br>";

            echo "Your warriors dealt " . number_format($attack_effect) . " damage!<br>";

            echo "The enemy's defenders dealt " . number_format($defense_effect) . " damage!<br><br>";

            if($attack_effect > $defense_effect){

                $ratio = ($attack_effect - $defense_effect)/$attack_effect * $turns;

                $ratio = min($ratio,1);

                $food_stolen = floor($ratio * $enemy_stats['food']);

                echo "You won the battle! You stole " . $food_stolen . " food!";

                $battle1 = mysql_query("UPDATE `stats` SET `food`=`food`-'".$food_stolen."' WHERE `id`='".$id."'") or die(mysql_error());

                $battle2 = mysql_query("UPDATE `stats` SET `food`=`food`+'".$food_stolen."',`turns`=`turns`-'".$turns."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());

                $battle3 = mysql_query("INSERT INTO `logs` (`attacker`,`defender`,`attacker_damage`,`defender_damage`,`gold`,`food`,`time`) 

                                        VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defense_effect."','0','".$food_stolen."','".time()."')") or die(mysql_error());

                $stats['food'] += $food_stolen;

                $stats['turns'] -= $turns;

            }else{

                echo "You lost the battle!";

            }

        }

    }else{

        output("You have visited this page incorrectly!");

    }
}

include("../includes/footer.php");

?>
