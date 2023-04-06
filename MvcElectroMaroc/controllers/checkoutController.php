<?php
class checkoutController{
    static public function check(){
        if(isset($_POST['check'])){
            $id_client = $_POST['id_client'];
            $data = array(
                'id_client'=>$id_client
            );
            checkout::checkout($data);
            Redirect::to('cards');
        }
    }
}
?>