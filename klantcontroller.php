<?php
include 'connection.php';

class klantencontroller{


    function toevoegen($naam, $genre, $date, $locatie, $tijdsduur){
        include 'connection.php';
        //query schrijven
        $query = "INSERT INTO events (naam, genre, datum, locatie, tijdsduur)".
                "VALUES ('$naam','$genre','$date','$locatie','$tijdsduur')";
        //query inlezen
        $stm = $conn->prepare($query);
        //query uitvoeren op de database
        if($stm->execute()){
            echo"het is gelukt";
         }else{
            echo"het is niet gelukt";
        }
    }

    function delete()
    {
        include 'connection.php';
        $id = $_GET['id'];
        $query = "DELETE FROM events where id = $id";
        $stm = $conn->prepare($query);
        $stm->execute();

        if($stm == true){
            echo "Artikel is verwijderd <br>";
        }
    }

    function wijzigen($id, $naam, $genre, $date, $locatie, $tijdsduur)
    {
        include 'connection.php';
        $query = "UPDATE events SET naam='$naam', genre='$genre', datum='$date', locatie='$locatie', tijdsduur='$tijdsduur' WHERE id='$id'";
        $stm = $conn->prepare($query);
        $stm->execute();
        if($stm == true){
            echo "artikel is geupdate";
        }else{
            echo" hij doet nie";
        }
    }

    

    function bekijken(){
        include 'connection.php';
        $query = "SELECT * FROM events";
        $stm = $conn->query($query);
        echo '<table width="70%" border="1" cellpadding="10" cellspacing="10">
        <tr>
        <th>naam</th>
        <th>genre</th>
        <th>datum</th>
        <th>locatie</th>
        <th>tijdsduur</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>';


        foreach ($stm as $events)
        {
            echo '<tr>
            <td>'.$events["naam"].'</td>
            <td>'.$events["genre"].'</td>
            <td>'.$events["datum"].'</td>
            <td>'.$events["locatie"].'</td>
            <td>'.$events["tijdsduur"].'</td>
            <td><a href="?id=' . $events['id'] . '&action=edit"><div style="color:green">Edit</div></a></td>
            <td><a href="?id=' . $events['id'] . '&action=delete"><div style="color:red">Delete</div></a></td>
            </tr>';
        }

    echo '</table>';
    return $stm;
    }

    // function bekijken(){
    //     include 'connection.php';
    //     $query = "SELECT * FROM events";
    //     $stm = $conn->prepare($query);
    //     if ($stm->execute()){
    //         $result = $stm->fetchAll(PDO::FETCH_OBJ);
    //         echo "<table>
    //         <tr>
    //          <th>id</th>
    //          <th>Naam</th>
    //          <th>Genre</th>
    //          <th>Datum</th>
    //          <th>Locatie</th>
    //          <th>Tijdsduur</th>
    //         </tr>
    //         ";

    //         foreach ($result as $events){

    //             echo"
    //                 <tr>
    //                     <td>$events->id</id>
    //                     <td>$events->naam </td>
    //                     <td>$events->genre </td>
    //                     <td>$events->datum </td>
    //                     <td>$events->locatie </td>
    //                     <td>$events->tijdsduur </td>
                        


    //                 </tr>";
    //         }
    //         echo" </table>";
    //     }

    // }
}  
?>