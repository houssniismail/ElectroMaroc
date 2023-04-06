
<?php
class cards{
      static public function ShowAllcards($data){
         $stmt = Database::connect()->prepare('SELECT * FROM `cards` WHERE id_client = :id_client');
         $stmt->bindParam(':id_client',$data['id_cline']);
         $stmt->execute();
         $result = $stmt->fetchAll();
         return $result;
      }
      static public function addtocards($data){
        $stmt = DataBase::connect()->prepare('INSERT INTO `cards`(`id_client`, `id_products_coposant`, `quentity`, `prixTotal`, `image`,`prix`,`name`,`date_de_creation`)
         VALUES (:id_client, :id_product_composant, :quentity, :prix_totale, :image, :prix, :name,NOW())');
        $stmt->bindParam(':id_client',$data['id_client']);
        $stmt->bindParam(':id_product_composant',$data['id_product_composant']);
        $stmt->bindParam(':quentity',$data['quentity']);
        $stmt->bindParam(':image',$data['image']);
        $stmt->bindParam(':prix',$data['prix']);
        $stmt->bindParam(':prix_totale',$data['prix_totale']);
        $stmt->bindParam(':name',$data['name']);
        $stmt->execute();
      }
      static public function delettocards($data){
        $stmt = DataBase::connect()->prepare('DELETE FROM `cards` where id=:id');
        $stmt->bindParam(':id',$data['id']);
        $stmt->execute();
      }
}
?>