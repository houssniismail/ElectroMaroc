<?php
class infoCount
{
    static public function info($data)
    {
        $stmt = Database::connect()->prepare('SELECT prixTotal,  SUM(prixTotal) FROM commande WHERE id_client = :id_client;');
        $stmt->bindParam(':id_client', $data['id_client']);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    static public function aficherToutprix($data)
    {
        $stmt = Database::connect()->prepare('SELECT prixTotal FROM `commande` WHERE id_client = :id_client;');
        $stmt->bindParam(':id_client', $data['id_client']);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    static public function commend($data)
    {
        $stmt = Database::connect()->prepare('SELECT * FROM `commande` WHERE id_client = :id_client');
        $stmt->bindParam(':id_client', $data['id_client']);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    static public function status($data)
    {
        $stmt = Database::connect()->prepare('SELECT * FROM `commande`WHERE id_client = :id_client AND status = :status');
        $stmt->bindParam(':id_client', $data['id_client']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
?>