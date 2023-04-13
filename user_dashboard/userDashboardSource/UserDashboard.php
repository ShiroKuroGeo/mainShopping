<?php
require("database.php");
class UserDashboard{

    public function doRegister($fname, $lname, $user, $address, $phone, $email, $pass){
        return $this->register($fname, $lname, $user, $address, $phone, $email, $pass);
    }
    public function doGetAllDataUserOrdered(){
        return $this->getAllDataUserOrdered();
    }
    public function doGetAllDataUserManageOrdered(){
        return $this->getAllDataUserManageOrdered();
    }

    //CRUD data


    private function insertOrder($title,$total_price,$Qt,$address,$P_method,$status){
        try {
            if ($this->checkLogin($_SESSION['email'],$_SESSION['password'])) {
                $db = new database();
                if ($db->getStatus()) {
                    $D_ordered = new DateTime();
                    $D_ordered->add(new DateInterval('P7D'));
                    $D_deliver = $D_ordered->format('Y-m-d');
                    $totalPrice = $total_price * $Qt;
                    $stmt = $db->getCon()->prepare($this->insertOrderQuery());
                    $stmt->execute(array($this->userId(), $title, $totalPrice, $Qt, $address, date('Y-m-d'), $D_deliver, $P_method, $status));
                    $result = $stmt->fetch();
                    if (!$result) {
                        $db->closeConnection();
                        return "success";
                    }else{
                        $db->closeConnection();
                        return "failed";
                    }
                }else{
                    return "403";
                }
            } else {
                return "403";
            }
        } catch (PDOException $th) {
            return "501";
        }
    }

    //Fetching all data

    //Fetch all data from order
    private function getAllDataUserOrdered(){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getAllDataUserOrderedQuery());
                    $stmt->execute(array($this->userId()));
                    $result = $stmt->fetchAll();
                    $db->closeConnection();
                    return json_encode($result);
                }else{
                    return "403";
                }
            }else{
                return "403";
            }
        }catch(PDOExeption $th){
            return "501";
        }
    }

    private function getAllDataUserManageOrdered(){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getAllDataUserManageOrderedQuery());
                    $stmt->execute(array($this->userId()));
                    $result = $stmt->fetchAll();
                    $db->closeConnection();
                    return json_encode($result);
                }else{
                    return "403";
                }
            }else{
                return "403";
            }
        }catch(PDOExeption $th){
            return "501";
        }
    }

    //Get the user_id row
    private function userId(){
        try{
            $db = new database();
            if($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->loginQuery());
                $stmt->execute(array($_SESSION['email'],$_SESSION['password']));
                $tmp = null;
                while ($row = $stmt->fetch()) {
                    $tmp = $row['user_id'];
                }
                $db->closeConnection();
                return $tmp;
            }
        } catch (PDOException $th) {
            return "501";
        }
    }

    public function saveMultiple($data)
    {
        try {
            $db = new database();
            $db->init();
            if ($db->getStatus()) {
                // $explode = explode("~",$data);
                $stmt = $db->getCon()->prepare("UPDATE `products` SET `image` = $data WHERE user_id = $this->userId()");
                $stmt->execute();
                $db->close();
                return 201;
            }else{
                return 403;
            }
        } catch (Exception $th) {
            return 501;
        }
    }

    public function display()
    {
        try {
            return rand(10,100);
        } catch (Exception $th) {
            return 501;
        }
    }

    //Checking
    private function checkLogin($email, $pass){
        if($email != "" && $pass != ""){
            return true;
        }else{
            return false;
        }
    }
    //Queries
    private function loginQuery(){
        return "SELECT * FROM tbl_user WHERE `email` = ? AND `password` = ?";
    }
    private function getAllDataUserManageOrderedQuery(){
        return "SELECT tbl_user.username, my_order.title, my_order.price, my_order.total_price, my_order.Qt, my_order.image, my_order.d_ordered, my_order.d_delivered, my_order.p_method, my_order.status FROM `my_order` INNER JOIN tbl_user ON my_order.user_id = tbl_user.user_id WHERE tbl_user.user_id = ?";
    }
    private function getAllDataUserOrderedQuery(){
        return "SELECT tbl_user.fname, tbl_user.lname, c_order.productUser_Id, c_order.title, c_order.total_price, c_order.Qt, c_order.address, c_order.D_ordered, c_order.D_deliver, c_order.P_method, c_order.status FROM `c_order` INNER JOIN tbl_user ON c_order.user_id = tbl_user.user_id AND tbl_user.user_id = ?";
    }
}
?>