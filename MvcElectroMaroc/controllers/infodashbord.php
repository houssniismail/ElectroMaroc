<?php
class infodashbord{
    static public function getAllcommend(){
        $commendes = dashbord::toutcommend();
        return $commendes;
    }
    static public function livrer(){
        if(isset($_POST['updatstatus'])){
            $status = $_POST['status'];
            $id_client =$_POST['id_client'];
            $data = [
                'id_client'=>$id_client,
                'status'=>$status
            ];
            $result = dashbord::livrison($data);
            Redirect::to('dashboard');
        }
    }
    static public function evoi(){
        if(isset($_POST['updatstatusenvoi'])){
            $status = $_POST['status'];
            $id_client =$_POST['id_client'];
            $data = [
                'id_client'=>$id_client,
                'status'=>$status
            ];
            $result = dashbord::envoiyer($data);
            Redirect::to('dashboard');
        }
    }
}