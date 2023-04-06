
<?php

class FormController {
    static public function addinfo(){
        $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : null;
        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    
        if (!$full_name || !$email || !$phone) {
            die("error: full_name, email, and phone are required");
        }
    
        $data = array(
            "full_name" => $full_name,
            "email" => $email,
            "phone" => $phone,
        );
    
        $result = Form::addinfo2($data);
    
        if ($result === "ok") {
            Session::set("success", "Produit acheté");
            Redirect::to("cards");
        } else {
            echo $result;
        }
    }
}    