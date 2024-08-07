<?php
require_once('manufacturer.php');  

class ManufacturerDB {
    public static function getManufacturers() {
        $db = Database::getDB();
        $query = 'SELECT * FROM manufacturers';
        $result = $db->query($query);
        $manufacturers = [];
        foreach ($result as $row) {
            $manufacturer = new Manufacturer($row['name']);
            $manufacturer->setID($row['id']);
            $manufacturers[] = $manufacturer;
        }
        return $manufacturers;
    }

    public static function addManufacturer($manufacturer) {
        $db = Database::getDB();
        $query = 'INSERT INTO manufacturers (name)
                  VALUES (:name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $manufacturer->getName());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function deleteManufacturer($manufacturer_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM manufacturers
                  WHERE id = :manufacturer_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':manufacturer_id', $manufacturer_id);
        $statement->execute();
        $statement->closeCursor();
    }

    
}
?>

