<?php

/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-05-28
 * Time: 20:44
 */
class userServices
{
    public $id;
    public $name;
    public $description;
    public $comment;
    public $price;
    public $date;

    function UserService( $id, $name, $description, $comment, $price, $date ){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->comment = $comment;
        $this->price = $price;
        $this->date = $date;
    }
}

require_once ('dbconfig.php');

if( $_SERVER['REQUEST_METHOD'] == "POST" ){
    //w przypadku 'posta' nic się nie dzieje
}elseif( $_SERVER['REQUEST_METHOD'] == "GET" ){
    //jeżeli zapytanie przesłane zostanie 'getem', to zostaną pobrane zaksięgowane usługi zalogowanego użytkownika
    try {
        $loggedUser = $_SESSION['loggedUser'];
        $userServicesArray = array();

        //nawiązanie połączenia z bazą danych
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //pozyskanie z bazy danych ID zalogowanego użytkownika
        $stmt2 = $conn->prepare("SELECT id FROM users WHERE username=?");
        $stmt2->execute(array($loggedUser));
        $result = $stmt2->fetchAll();
        $userId = $result[0]['id'];

        //pobranie danych o zaksięgowanych usługach użytkownika
        $stmt = $conn->prepare("SELECT service_id, user_comment, service_date FROM user_services WHERE user_id=?");
        $stmt->execute(array($userId));

        //przygotowanie komendy pobierającej dodatkowe informacje o każdej usłudze
        $stmt2 = $conn->prepare("SELECT service_name, service_description, price FROM services WHERE id=:id");

        foreach ( $stmt->fetchAll() as $k=>$row ){
            /**
            Dla każdej zaksięgowanej usługi następuje bindowanie jej ID do parametru z komendy $stmt2
             * oraz jej wykonanie w celu pozyskania dodatkowych danych o usłudze.
             * Dla każdej usługi tworzony jest obiekt klasy UserService, który jest umieszczany w tablicy.
             */
            $stmt2->bindParam(':id', $row['service_id']);
            $stmt2->execute();
            $result = $stmt2->fetchAll();

            $obj = new UserService(
                $row['service_id'], $result[0]['service_name'], $result[0]['service_description'], $row['user_comment'],
                $result[0]['price'], $row['service_date']
            );

            array_push($userServicesArray, $obj);
        }

        //Na koniec tablica obiektów z usługami przesyłana jest do 'klienta'
        echo json_encode($userServicesArray);
        $conn = null;
        exit();
    }
    catch(PDOException $e) {
        echo json_encode( "Error: " . $e->getMessage());
        $conn = null;
        exit();
    }

}