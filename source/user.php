<?php
require("database.php");
class user{

    public function doRegister($fname, $lname, $user, $address, $phone, $email, $pass){
        return $this->register($fname, $lname, $user, $address, $phone, $email, $pass);
    }
    public function doLogin($email, $password){
        return $this->login($email, $password);
    }
    public function doGetInfoUser(){
        return $this->getInfoUser();
    }
    public function doAddToCart($product, $user, $image, $title, $price, $qt, $total){
        return $this->addToCart($product, $user, $image, $title, $price, $qt, $total);
    }
    public function doGetCategories(){
        return $this->getCategory();
    }
    public function doGetNumber(){
        return $this->cartNumber();
    }
    public function doEcoProduct(){
        return $this->ecoProduct();
    }
    public function doSearch($item){
        return $this->searchProduct($item);
    }
    public function doGetCart(){
        return $this->cartTable();
    }
    public function doCartTableToOrder($id){
        return $this->cartTableToOrder($id);
    }
    public function doClickProduct($item){
        return $this->clickProduct($item);
    }
    public function doUpdateCartQuery($qt, $id){
        return $this->updateCartQuery($qt, $id);
    }
    public function doDeleteCartQuery($id){
        return $this->deleteCarts($id);
    }
    public function doInsertEcoPost($description, $photo, $video, $status){
        return $this->addEcoPosting($description, $photo, $video, $status);
    }
    public function doGetDataEcoPost(){
        return $this->getDataEcoPost();
    }
    public function doGetEcoPostTimeline(){
        return $this->getEcoPostTimeline();
    }
    public function doGetMessageLink($linkMessage){
        return $this->getMessageLink($linkMessage);
    }
    public function doChangeProfile($photo){
        return $this->changeProfile($photo);
    }
    public function doSearchUser($user){
        return $this->searchUser($user);
    }
    public function doInsertOrder($title,$total_price,$Qt,$address,$P_method,$status){
        return $this->insertOrder($title,$total_price,$Qt,$address,$P_method,$status);
    }
    public function doCommentInsert($productId, $comment){
        return $this->commentInsert($productId, $comment);
    }
    
    public function doViewCommentOfThisProduct($id){
        return $this->viewCommentOfThisProduct($id);
    }
    public function doDeleteComment($id){
        return $this-> deleteComment($id);
    }
    public function doAddCommentToAPost($productId, $comment){
        return $this->addCommentToAPost($productId, $comment);
    }
    public function doViewCommentOfThisPost($id){
        return $this->viewCommentOfThisPost($id);
    }


    private function register($fname, $lname, $user, $address, $phone, $email, $pass){
        try {
            if ($this->checkRegistration($fname, $lname, $user, $address, $phone, $email, $pass)) {
                $db = new database();
                if ($db->getStatus()) {
                    $encrypt = md5($pass);
                    $stmt = $db->getCon()->prepare($this->registerQuery());
                    $stmt->execute(array($fname, $lname, $user, $address, $phone, $email, $encrypt));
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
    private function login($email,$password){
        try {
            if ($this->checkLogin($email,$password)) {
                $db = new database();
                if ($db->getStatus()) {
                    $tmp = md5($password);
                    $stmt = $db->getCon()->prepare($this->loginQuery());
                    $stmt->execute(array($email,$tmp));
                    $result = $stmt->fetch();
                    if ($result) {
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $tmp;
                        $db->closeConnection();
                        return "200";
                    }else{
                        $db->closeConnection();
                        return "400";
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

    //Function of getting the information of the user
    private function getInfoUser(){
        try {
            if ($this->checkLogin($_SESSION['email'],$_SESSION['password'])) {
                $db = new database();
                if ($db->getStatus()) {
                    $stmt = $db->getCon()->prepare($this->getInfoQuery());
                    $stmt->execute(array($_SESSION['email'],$_SESSION['password']));
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

    //Function of adding product to cart
    private function addToCart($product, $user, $image, $title, $price, $qt, $total){
        try {
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])) {
                $db = new database();
                if ($db->getStatus()) {
                    $totalPrice = $price * $qt;
                    $stmt = $db->getCon()->prepare($this->insertToCartQuery());
                    $stmt->execute(array($product, $this->userId(), $user, $image, $title, $price, $qt, $totalPrice));
                    $result = $stmt->fetch();
                    if (!$result) {
                        $db->closeConnection();
                        return "200";
                    }else{
                        $db->closeConnection();
                        return "404";
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

    //Get all category
    private function getCategory(){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getCategoryQuery());
                    $stmt->execute(array());
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

    //Number of cart in the carts
    private function cartNumber(){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getCartsNumberQuery());
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

    
    private function ecoProduct(){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getProductsQuery());
                    $stmt->execute(array());
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

    private function searchProduct($item){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getSearchQuery());
                    $searchItem = "%$item%";
                    $stmt->execute(array($searchItem));
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

    private function searchUser($user){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->searchUserQuery());
                    $searchUser = "%$usert%";
                    $stmt->execute(array($searchItem));
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

    private function clickProduct($item){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getClickProductQuery());
                    $stmt->execute(array($item));
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

    private function deleteCarts($id){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getDeleteCartQuery());
                    $stmt->execute(array($id));
                    $result = $stmt->fetch();
                    if (!$result) {
                        $db->closeConnection();
                        return "200";
                    }else{
                        $db->closeConnection();
                        return "404";
                    }
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

    private function cartTable(){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getCartQuery());
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

    private function cartTableToOrder($id){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getCartQuery2());
                    $stmt->execute(array($id));
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

    //Function of updating the cart
    private function updateCartQuery($qt, $id){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getUpdateCartQuery());
                    $stmt->execute(array($qt, $id));
                    $result = $stmt->fetch();
                    if (!$result) {
                        $db->closeConnection();
                        return "200";
                    }else{
                        $db->closeConnection();
                        return "404";
                    }
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


    // `user_id`, `product_id`, `comments`, `date_create`, `date_Updated`

    private function commentInsert($productId, $comment){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->insertCommentQuery());
                    $stmt->execute(array($this->userId(), $productId , $comment, date('Y-m-d'), date('Y-m-d')));
                    $result = $stmt->fetch();
                    if (!$result) {
                        $db->closeConnection();
                        return "200";
                    }else{
                        $db->closeConnection();
                        return "404";
                    }
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

    private function viewCommentOfThisProduct($id){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->retrieveCommentQuery());
                    $stmt->execute(array($id));
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

    //function of inserting posting in eco post
    private function addEcoPosting($description, $photo, $video, $status){
        try {
            if ($this->checkLogin($_SESSION['email'],$_SESSION['password'])) {
                $db = new database();
                if ($db->getStatus()) {
                    $stmt = $db->getCon()->prepare($this->insertEcoPostQuery());
                    $stmt->execute(array($this->userId(), $description, date("l jS \of F Y h:i:s A"), date("l jS \of F Y h:i:s A"), $photo, $video, $status));
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

    private function getMessageLink($linkMessage){
        try {
            if ($this->checkLogin($_SESSION['email'],$_SESSION['password'])) {
                $db = new database();
                if ($db->getStatus()) {
                    $stmt = $db->getCon()->prepare($this->getMessageLinkQuery());
                    $stmt->execute(array($linkMessage, $_SESSION['email'],$_SESSION['password']));
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

    //Function of retrieving data to eco post
    private function getDataEcoPost(){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getEcoPostQuery());
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

    private function getEcoPostTimeline(){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->getEcoPostTimelineQuery());
                    $stmt->execute(array());
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

    private function changeProfile($photo){
        try {
            if ($this->checkLogin($_SESSION['email'],$_SESSION['password'])) {
                $db = new database();
                if ($db->getStatus()) {
                    $stmt = $db->getCon()->prepare($this->getChangeProfile());
                    $stmt->execute(array($photo, $_SESSION['email'],$_SESSION['password']));
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
    private function deleteComment($id){
        try {
            if ($this->checkLogin($_SESSION['email'],$_SESSION['password'])) {
                $db = new database();
                if ($db->getStatus()) {
                    $stmt = $db->getCon()->prepare($this->deleteCommentQuery());
                    $stmt->execute(array($id));
                    $result = $stmt->fetch();
                    if (!$result) {
                        $db->closeConnection();
                        return 200;
                    }else{
                        $db->closeConnection();
                        return 400;
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

    private function addCommentToAPost($id,$comment){
        try {
            if ($this->checkLogin($_SESSION['email'],$_SESSION['password'])) {
                $db = new database();
                if ($db->getStatus()) {
                    $stmt = $db->getCon()->prepare($this->addCommentToAPostQuery());
                    $stmt->execute(array($this->userId(), $id , $comment, date('Y-m-d'), date('Y-m-d')));
                    $result = $stmt->fetch();
                    if (!$result) {
                        $db->closeConnection();
                        return 200;
                    }else{
                        $db->closeConnection();
                        return 400;
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

    private function viewCommentOfThisPost($id){
        try{
            if($this->checkLogin($_SESSION['email'],$_SESSION['password'])){
                $db = new database();
                if($db->getStatus()){
                    $stmt = $db->getCon()->prepare($this->viewCommentOfThisPostQuery());
                    $stmt->execute(array($id));
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


    //Checking
    private function checkRegistration($fname, $lname, $email, $user, $address, $phone, $pass){
        if($fname != "" && $lname != "" && $email != "" && $user != "" && $address != "" && $phone != "" && $pass != "" ){
            return true;
        }else{
            return false;
        }
    }
    private function checkLogin($email, $pass){
        if($email != "" && $pass != ""){
            return true;
        }else{
            return false;
        }
    }
    //Queries
    private function registerQuery(){
        return "INSERT INTO tbl_user(`fname`, `lname`,`username` ,`address`, `phone`, `email`,`password`) VALUES(?,?,?,?,?,?,?)";
    }
    private function loginQuery(){
        return "SELECT * FROM tbl_user WHERE `email` = ? AND `password` = ?";
    }
    private function getInfoQuery(){
        return "SELECT * FROM tbl_user where `email` = ? AND `password` = ?";
    }
    private function insertToCartQuery(){
        return "INSERT INTO `carts`(`product_id`, `user_id`, `username`, `image`, `title`, `price`, `Qt`, `total_price`) VALUES (?,?,?,?,?,?,?,?)";
    }
    private function getCategoryQuery(){
        return "SELECT * FROM category";
    }
    private function getCartsNumberQuery(){
        return "SELECT * FROM carts WHERE user_id = ?";
    }
    private function getProductsQuery(){
        return "SELECT * FROM products order by title";
    }
    private function getSearchQuery(){
        return "SELECT * FROM `products` WHERE title like ?";
    }
    private function getCartQuery(){
        return "SELECT * FROM `carts` WHERE user_id = ?";
    }
    private function getCartQuery2(){
        return "SELECT * FROM `carts` WHERE product_id = ?";
    }
    private function getClickProductQuery(){
        return "SELECT * FROM `products` WHERE product_id = ?";
    }
    private function getUpdateCartQuery(){
        return "UPDATE `carts` SET `Qt` = ? WHERE id = ?";
    }
    private function getDeleteCartQuery(){
        return "DELETE FROM `carts` where id = ?";
    }
    private function insertEcoPostQuery(){
        return "INSERT INTO `post`(`user_id`, `caption`, `d_c`, `d_u`, `image`, `video`, `status`) VALUES (?,?,?,?,?,?,?)";
    }
    private function getEcoPostQuery(){
        return "SELECT * FROM `post` WHERE user_id = ?";
    }
    private function getEcoPostTimelineQuery(){
        return "SELECT us.email, us.image, po.postId, po.user_id, po.caption, po.d_c, po.d_u, po.imagePost, po.video, po.status FROM post po INNER JOIN tbl_user us ON po.user_id = us.user_id;";
    }
    private function getMessageLinkQuery(){
        return "UPDATE `tbl_user` SET `messageLink`= ? WHERE `email` = ? AND `password` = ?";
    }
    private function getChangeProfile(){
        return "UPDATE `tbl_user` SET `image`= ? WHERE `email` = ? AND `password` = ?";
    }
    private function searchUserQuery(){
        return "SELECT * FROM `tbl_user` WHERE email like ?";
    }
    private function insertOrderQuery(){
        return "INSERT INTO `c_order`(`user_id`, `title`, `total_price`, `Qt`, `address`, `D_ordered`, `D_deliver`, `P_method`, `status`) VALUES (?,?,?,?,?,?,?,?,?)";
    }
    private function insertCommentQuery(){
        return "INSERT INTO `comment`(`user_id`, `product_id`, `comments`, `date_create`, `date_Updated`) VALUES (?,?,?,?,?)";
    }
    private function retrieveCommentQuery(){
        return "SELECT us.email, com.id, com.product_id, com.comments, com.date_create, com.date_Updated FROM `comment` com INNER JOIN tbl_user us ON com.user_id = us.user_id WHERE com.product_id = ?";
    }
    private function deleteCommentQuery(){
        return "DELETE FROM comment WHERE id = ?";
    }
    private function addCommentToAPostQuery(){
        return "INSERT INTO `comment`(`user_id`, `postId`, `comments`, `date_create`, `date_Updated`) VALUES (?,?,?,?,?)";
    }
    private function viewCommentOfThisPostQuery(){
        return "SELECT com.id, com.postId, com.comments, com.date_create, com.date_Updated, po.postId, po.user_id, po.caption, po.d_c, po.d_u, po.imagePost, po.video, po.status FROM `post` po INNER JOIN `comment` com  ON com.postId = po.postId WHERE po.postId = ?";
    }
}
?>