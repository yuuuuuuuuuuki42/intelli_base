<?php
    if(!isset($_POST)){
        print "ポストされてない";
    }

    //カートリポジトリを呼び出し
    require_once '../Repository/Cart_Repository.php';
    session_start();

    //カートクラスのインスタンス
    $myself = new Cart('root','rootpass');
    $myself->login();

    $id = 1;
    //$id = $_SESSION['account']['id'];
    //カートに入ってる商品のid入れる配列
    //セッションに入ってるか入ってないかの処理
    if(isset($_SESSION["cart"])){
        $products = $_SESSION["cart"];
    }else{ 
        $products = array();
    }

    //商品のIDを取得
    // ポスト送信されたカートに入れる本のIDを配列に追加
    array_push($products, array( "id" => $_POST["book_id"] ));
    $_SESSION["cart"] = $products;
    $json_cart = json_encode($products);

    //TODO: カートに追加
    $myself->updateCartJson($id, $json_cart);

    // header('Location:Cart.php');
?>