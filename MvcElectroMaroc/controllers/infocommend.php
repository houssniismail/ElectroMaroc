<?php
class infocommend{
    public static function infocommend(){
         
            $id = $_SESSION['Id'];
            $data = array(
                'id_client' => $id
            );
            return infoCount::info($data);
    }
    public static function aficher_tout_product(){
         
        $id = $_SESSION['Id'];
        $data = array(
            'id_client' => $id
        );
        return infoCount::aficherToutprix($data);
    }
    public static function gitcommend(){
        $id = $_SESSION['Id'];
        $data = array(
            'id_client' => $id
        );
        return infoCount::commend($data);
    }
    public static function showStatus(){
        if(isset($_POST['showStatu'])){
            $id_client = $_SESSION['Id'];
            $status=$_POST['status'];
            $data = array(
              'id_client'=>$id_client,
              'status'=> $status
            );
            return infoCount::status($data);
        }
    }
}
?>