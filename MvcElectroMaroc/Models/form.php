<?php
class form{

    static public function addinfo2($data)
    {
        $stmt = DataBase::connect()->prepare('INSERT INTO form (full_name,email,phone)
        VALUES (:full_name,:email,:phone)');
        $stmt->bindParam(':full_name', $data['full_name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':phone', $data['phone']);
      
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

}