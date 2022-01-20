<?php
include 'klantcontroller.php';
$update = false;

if(isset($_GET['id']) && $_GET['action'] === 'edit'){
    include 'connection.php';
     $update = true;
     $id = $_GET['id'];
     $query = $conn->query("SELECT * FROM events WHERE id=$id");
     $row = $query->fetch();
     $naam = $row['naam'];
     $genre = $row['genre'];
     $date = $row['datum'];
     $locatie = $row['locatie'];
     $tijdsduur = $row['tijdsduur'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulier</title>
</head>
<body>
    <h1>formulier</h1>
    <form method="POST">
        <table name="invullen">
            <tr>
                <th><label for="naam">Naam event</label></th>
                <td><input type="text" name="txtnaam" value="<?php echo $naam ?? ''; ?>" ></td>
            </tr>
            <tr>
                <th><label for="genre">genre</label></th>
                <td><input type="text" name="txtgenre" value="<?php echo $genre ?? ''; ?>" ></td>
            </tr>
            <tr>
                <th><label for="date">datum</label></th>
                <td><input type="date" name="date" value="<?php echo $date ?? ''; ?>"></td>
            </tr>
            <tr>
                <th><label for="locatie">locatie</label></th>
                <td><input type="text" name="txtlocatie" value="<?php echo $locatie ?? ''; ?>"></td>
            </tr>
            <tr>
                <th><label for="tijdsduur">tijdsduur</label></th>
                <td><input type="time" name="tijdsduur" value="<?php echo $tijdsduur ?? ''; ?>" ></td>
            </tr>
            <tr>
                <th></th>

            </tr>
        </table>


    <br>
    <br>
    <?php


    // als er op de knop word gedrukt...
     if(isset($_POST['btnSubmit'])){
        $naam = $_POST['txtnaam']??""; // ??"" is vom de warning "Undefined array key" weg te halen
        $genre = $_POST['txtgenre']??"";
        $date = $_POST['date']??"";
        $locatie = $_POST['txtlocatie']??"";
        $tijdsduur = $_POST['tijdsduur']??"";
    //opject aan maken
        $kc = new klantencontroller();
    // de function aan spreken
        $kc->toevoegen($naam, $genre, $date, $locatie, $tijdsduur);
    }

    if(isset($_GET['id']) && $_GET['action'] === 'delete'){
        $kc = new klantencontroller();
        $kc->delete();
    }



    if(isset($_POST['btnUpdate'])){
        include 'connection.php';
        $id = $_GET['id'];
        $naam = $_POST['txtnaam']??""; // ??"" is vom de warning "Undefined array key" weg te halen
        $genre = $_POST['txtgenre']??"";
        $date = $_POST['date']??"";
        $locatie = $_POST['txtlocatie']??"";
        $tijdsduur = $_POST['tijdsduur']??"";
        $kc = new klantencontroller();
        $kc->wijzigen($id, $naam, $genre, $date, $locatie, $tijdsduur);
    }

    $kc = new klantencontroller();
    $kc->bekijken();

    ?>
    <?php
     if ($update ==true){ 
        echo '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full" input name="btnUpdate" type="submit" class="gt-button">Product updaten</button>';
        }else{
             echo '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full" input name="btnSubmit" type="submit" class="gt-button">Product invoeren</button>';
        }
 
    ?>
    </form>
</body>
</html>