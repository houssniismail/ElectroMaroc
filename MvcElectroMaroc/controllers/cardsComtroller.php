<?php
class cardsComtroller{
    static public function getAllproductscards(){
        if(isset($_POST['show_your_commend'])){
            $id_client = $_POST['id_cline'];
            $data = array(
                'id_cline'=>$id_client,
            );
          return $result = cards::ShowAllcards($data);
        }else{
            $id_client = $_SESSION['Id'];
            $data = array(
                'id_cline'=>$id_client,
            );
          return $result = cards::ShowAllcards($data); 
        }
      
    }
    
       
    static public function addtocards(){
        if(!$_SESSION){
            Redirect::to('login');
        }else{
        if(isset($_POST['add_to_cart'])){

                $data = array(
                    'id_client'=>$_POST['id_client'],
                    'name'=>$_POST['name'],
                    'id_product_composant'=>$_POST['id'],
                    'quentity'=>$_POST['quentite'],
                    'image'=>$_POST['image'],
                    'prix'=>$_POST['prix'],
                    'prix_totale'=>$_POST['quentite']*$_POST['prix'],
                   );
                   cards::addtocards($data);
                   Redirect::to('products');
            

        }
    }
    }

    
    static public function deletProducttocard(){
        if(isset($_POST['delete'])){
            $data = array(
                'id'=>$_POST['id']
            );
            cards::delettocards($data);
            Redirect::to('cards');
        }
    }
}
?>