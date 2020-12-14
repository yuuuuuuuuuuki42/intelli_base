<?php
    //カートリポジトリを呼び出し
    require_once '../Repository/Cart_Repository.php';
    session_start();

    //カートクラスのインスタンス
    $myself = new Cart('root','rootpass');
    $myself->login();
    /** 
     *カートに入れた商品を表示
     *$product_id 商品id
     *$jsonstr jsonファイルの変数
     * 
    **/

    $cart = [];
    $book_id = [];
    $book_name = [];
    $book_price = [];
    //  $id <- アカウントのID

    $id = 1;
    //$id = $_SESSION['account']['id'];
    $cart = $myself->getBooksDataInCart($id);

    foreach ($cart as $id => $value){
        $book_id[] = $value;
        var_dump($book_id);
    }
    
    

    // for($i = 0; $i < 1; $i++){
    //     $book_id = $cart[0][$i]["name"];
    // }
    // var_dump($book_id) ;
    //カートの中身を表示

    // function console_log( $data ){
    //     echo '<script>';
    //     echo 'console.log('. json_encode( $data ) .')';
    //     echo '</script>';
    // }
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>カート</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>
    <body>
        <h1>ショッピングカート</h1>
        
        <table border="1">
            <tr>
                <td>田中</td><td>27</td>
            </tr>
            <tr>
                <td>佐藤</td><td>42</td>
            </tr>
        </table>    
    </body>
</html>