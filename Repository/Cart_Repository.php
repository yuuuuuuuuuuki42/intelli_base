<?php
require_once "Repository.php";
date_default_timezone_set('Asia/Tokyo');

class Cart extends Repository
{
    public $value;
    function __construct(string $name, string $password)
    {
        parent::__construct($name, $password);
    }

    /**
     * カートの配列
     * @param array $user 購入商品
     * @return boolean
     */

    //public function save(array $user, $input_parameters = NULL){
    //    $user['sql'] = "UPDATE account SET cart_json = '$user[cart_json]' where name = '$user[user]'";
    //    $result = parent::save($user);
    //    return $result;
    //}

    public function updateCartJson(int $userID, string $json_cart, $input_parameters=NULL){
        $user['sql'] = "UPDATE account SET cart_json = $json_cart where id = $userID";
        print $user['sql'];
        $result = parent::save($user);
        return $result;
    }

    /**
     * 商品ID
     * @param array $user カート
     * @return $result cart_json
     */

    /**
     * find_cart
     * 
     * 引数に指定されたIDからカートのJSONを取得
     *
     * @param integer $id
     * @param [type] $input_parameters
     * @return String json
     */
    public function find_cart(int $id, $input_parameters=NULL){
        $user['sql'] = "select cart_json from account where id = $id";
        $result = parent::find($user);
//        var_dump($result);
        // result = [cart_json:[{id:"1"}, {id:"1"}, {id:"101"}]]

        return $result;
    }

    /**
     * getBooksDataInCart
     * 
     * 引数に指定されたユーザIDからカートのJSONを取得してJSONに含まれるIDから本の情報を取得する     *
     * @param array $user ユーザID
     * @param [type] $input_parameters
     * @return array 配列
     */
    public function getBooksDataInCart(int $userId, $input_parameters=NULL){
        $json = $this->find_cart($userId);
//        var_dump($json);
        $product_ids = json_decode($json[0]["cart_json"],true);
        // product_ids = [{id:"1"}, {id:"1"}, {id:"101"}]

        $result = array();

        foreach($product_ids as $id){
            //$id =  {id:"1"}
            $wkid = $id["id"];
            // var_dump($wkid);

            $user['sql'] = "select id, name, price from product where id = $wkid";
            array_push($result, parent::find($user));
            
        }

        //$result = array();
        //foreach ($ids as $id) {
        //    $user['sql'] = "select id, name, price from product where id = $id";
        //    array_push($result, parent::find($user));
        //}
        //var_dump($result);
        return $result;
    }
}
