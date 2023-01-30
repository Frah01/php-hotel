<?php
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];


    function parkings($hotels){
        $newHotels = [];
        $parkings= null;
        if(isset($_GET['parking'])){
            $parkings = $_GET['parking'];
        }   
       
        if($parkings == '1'){
            $newHotels= [];
            foreach($hotels as $hotel){
                if($hotel['parking']){
                    array_push($newHotels, $hotel);
                }
            }
            return $newHotels;
        }
        elseif ($parkings == '2'){
            $newHotels= [];
            foreach($hotels as $hotel){
                if(!$hotel['parking']){
                    array_push($newHotels, $hotel);
                }
            }
            return $newHotels;
        }
        else{
            return $hotels;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="mt-5 d-flex justify-content-center align-items-center">
        <form action="index.php" methods="GET" >
            <div>
                <input class="form-check-input" type="radio" name="parking"  value="1">
                <label class="form-check-label" for="park"><h5>Hotel Con Parcheggio</h5></label>
            </div>
            <div>
                <input class="form-check-input" type="radio" name="parking"  value="2">
                <label class="form-check-label" for="park"><h5>Hotel Senza Parcheggio</h5></label>
            </div>
            <button type="submit" class="btn btn-light border">Cerca</button>
        </form>
    </div>

    <table class="table table-bordered mt-5">
        <thead class="text-center ">
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Parcheggio</th>
            <th>Voto</th>
            <th>Distanza dal centro</th>

            <!--iclo per titoli delle colonne --> 
            <!-- <?php
            // foreach($hotels as $key => $hotel){
            //     foreach($hotel as $key_two => $item){ ?>
                <th><?php //echo ($key_two) ?></th>
            <?php //}} ?> -->
        </thead>
        <tbody> 
        <?php foreach(parkings($hotels) as $hotel){?>
                <tr class="text-center">
                    <td><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php 
                        if($hotel['parking']){
                            echo 'Hotel con Parcheggio'; 
                        }
                        else{
                            echo 'Hotel Senza Parcheggio';
                        }
                        ?>
                    </td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel['distance_to_center'].' '.'Km'; ?></td>
                    <?php } ?>
                </tr>
        </tbody>
    </table>
</body>
</html>