<?php
class checkout{
    static public function checkout($data){
        $stmt = DataBase::connect()->prepare('INSERT INTO commande(id_client,prixTotal,date_de_creation) SELECT id_client,prixTotal,date_de_creation FROM cards WHERE id_client = :id_client LIMIT 1;
        SET @last_id = LAST_INSERT_ID();
        INSERT INTO produit_commend(id_commend,id_product,quentity) SELECT @last_id,id_products_coposant,quentity FROM cards where id_client = :id_client;
        DELETE FROM cards WHERE id_client = :id_client');
        $stmt->bindParam(':id_client',$data['id_client']); 
        $stmt->execute();
    }
}
?>