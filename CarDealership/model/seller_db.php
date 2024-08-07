<?php
class SellerDB {
    public static function getSellers() {
        $db = Database::getDB();
        $query = 'SELECT * FROM sellers';
        $result = $db->query($query);
        $sellers = [];
        foreach ($result as $row) {
            $seller = new Seller($row['name'], $row['contact_info']);
            $seller->setID($row['id']);
            $sellers[] = $seller;
        }
        return $sellers;
    }

    public static function addSeller($seller) {
        $db = Database::getDB();
        $query = 'INSERT INTO sellers (name, contact_info)
                  VALUES (:name, :contact_info)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $seller->getName());
        $statement->bindValue(':contact_info', $seller->getContactInfo());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function deleteSeller($seller_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM sellers
                  WHERE id = :seller_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':seller_id', $seller_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>
