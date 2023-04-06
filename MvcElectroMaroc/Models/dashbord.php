<?php

class dashbord{
    static public function toutcommend(){
        $stmt = DataBase::connect()->prepare('SELECT * FROM `commande`');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static public function livrison($data){
        $stmt = DataBase::connect()->prepare('UPDATE `commande` SET`date_de_livraison`= NOW(),`status`= :status WHERE `id_client`=:id_client');
        $stmt->bindValue('status', $data['status']);
        $stmt->bindValue('id_client', $data['id_client']);
        $stmt->execute();   
    }
    static public function envoiyer($data){
        $stmt = DataBase::connect()->prepare('UPDATE `commande` SET `date_d_envoi`= NOW() ,`status`= :status WHERE `id_client`=:id_client');
        $stmt->bindValue('status', $data['status']);
        $stmt->bindValue('id_client', $data['id_client']);
        $stmt->execute();   
    }
}