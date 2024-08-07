<?php
class CarDB {
    public static function getCars($make_id = null, $model_id = null, $seller_id = null) {
        $db = Database::getDB();
        $query = 'SELECT cars.*, manufacturers.name AS make_name, models.name AS model_name, sellers.name AS seller_name
                  FROM cars
                  JOIN manufacturers ON cars.make_id = manufacturers.id
                  JOIN models ON cars.model_id = models.id
                  JOIN sellers ON cars.seller_id = sellers.id
                  WHERE 1=1';

        if ($make_id !== null) {
            $query .= ' AND cars.make_id = :make_id';
        }
        if ($model_id !== null) {
            $query .= ' AND cars.model_id = :model_id';
        }
        if ($seller_id !== null) {
            $query .= ' AND cars.seller_id = :seller_id';
        }

        $statement = $db->prepare($query);

        if ($make_id !== null) {
            $statement->bindValue(':make_id', $make_id);
        }
        if ($model_id !== null) {
            $statement->bindValue(':model_id', $model_id);
        }
        if ($seller_id !== null) {
            $statement->bindValue(':seller_id', $seller_id);
        }

        $statement->execute();
        $cars = [];
        foreach ($statement as $row) {
            $car = new Car($row['make_id'], $row['model_id'], $row['seller_id'], $row['year'], $row['price'], $row['description']);
            $car->setID($row['id']);
            $car->setMakeName($row['make_name']);
            $car->setModelName($row['model_name']);
            $car->setSellerName($row['seller_name']);
            $cars[] = $car;
        }
        $statement->closeCursor();
        return $cars;
    }

    public static function getCar($car_id) {
        $db = Database::getDB();
        $query = 'SELECT cars.*, manufacturers.name AS make_name, models.name AS model_name, sellers.name AS seller_name
                  FROM cars
                  JOIN manufacturers ON cars.make_id = manufacturers.id
                  JOIN models ON cars.model_id = models.id
                  JOIN sellers ON cars.seller_id = sellers.id
                  WHERE cars.id = :car_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':car_id', $car_id);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if ($row) {
            $car = new Car($row['make_id'], $row['model_id'], $row['seller_id'], $row['year'], $row['price'], $row['description']);
            $car->setID($row['id']);
            $car->setMakeName($row['make_name']);
            $car->setModelName($row['model_name']);
            $car->setSellerName($row['seller_name']);
            return $car;
        }
        return null;
    }

    public static function addCar($car) {
        $db = Database::getDB();
        $query = 'INSERT INTO cars (make_id, model_id, seller_id, year, price, description)
                  VALUES (:make_id, :model_id, :seller_id, :year, :price, :description)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $car->getMakeID());
        $statement->bindValue(':model_id', $car->getModelID());
        $statement->bindValue(':seller_id', $car->getSellerID());
        $statement->bindValue(':year', $car->getYear());
        $statement->bindValue(':price', $car->getPrice());
        $statement->bindValue(':description', $car->getDescription());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function updateCar($car) {
        $db = Database::getDB();
        $query = 'UPDATE cars
                  SET make_id = :make_id, model_id = :model_id, seller_id = :seller_id, year = :year, price = :price, description = :description
                  WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $car->getMakeID());
        $statement->bindValue(':model_id', $car->getModelID());
        $statement->bindValue(':seller_id', $car->getSellerID());
        $statement->bindValue(':year', $car->getYear());
        $statement->bindValue(':price', $car->getPrice());
        $statement->bindValue(':description', $car->getDescription());
        $statement->bindValue(':id', $car->getID());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function deleteCar($car_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM cars WHERE id = :car_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':car_id', $car_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>

