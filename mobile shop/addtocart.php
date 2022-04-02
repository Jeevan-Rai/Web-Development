<?php 
session_start();
include 'conn.php';
echo $_SESSION['client_id'];
        $id = $_GET['id'];
        $client_id = $_SESSION['client_id'];
        $sql = "SELECT id from cart where client_id ='$client_id'";
        $cartid = $conn->query($sql);
        while($a = $cartid->fetch_assoc()){
            $cart_id = $a['id'];
        }
        if($cartid){
            $sql = "SELECT * from inventory where product_id ='$id' and cart_id ='$cart_id'";
            $exist = $conn->query($sql);
            if($exist){
                $sql = "UPDATE inventory set quantity = quantity+1 where product_id = '$id' and client_id = '$client_id'";
            }
            else{
            $sql = "INSERT INTO `inventory` (`id`, `cart_id`, `product_id`, `quantity`) VALUES (NULL, '1', '4', '1')";
            $res = $conn->query($sql);
            echo var_dump($res);
            }
        }
        if (isset($res)){
            echo "SUCCESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS";
        }
        // echo '<script> window.location = "index.php" </script>';
?>