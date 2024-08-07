<?php
class ModelDB {
    public static function getModels() {
        $db = Database::getDB();
        $query = 'SELECT * FROM models';
        $result = $db->query($query);
        $models = [];
        foreach ($result as $row) {
            $model = new Model($row['manufacturer_id'], $row['name']);
            $model->setID($row['id']);
            $models[] = $model;
        }
        return $models;
    }

    public static function addModel($model) {
        $db = Database::getDB();
        $query = 'INSERT INTO models (manufacturer_id, name)
                  VALUES (:manufacturer_id, :name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':manufacturer_id', $model->getManufacturerID());
        $statement->bindValue(':name', $model->getName());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function deleteModel($model_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM models
                  WHERE id = :model_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':model_id', $model_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>
