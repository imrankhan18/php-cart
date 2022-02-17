<?php
session_start();
include 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $index = $_GET['id'];
    $id = $products[$index]['id'];
    $price = $products[$index]['price'];
    $operation = $_GET['op'];

    function add($index, $id, $price)
    {
        if (gettype($_SESSION['cart']) == 'array') {
            $_check = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                foreach ($value as $k => $v) {
                    if ($index == $value['id']) {
                        $_SESSION['cart'][$key]['quantity'] += 1;
                        $_check = 1;
                        break;
                    }
                }
            }
            if ($_check == 0) {

                array_push($_SESSION['cart'], array(
                    'id' => $index,
                    'name' => $id,
                    'price' => $price,
                    'quantity' => 1
                ));
            }
        } else {
            $_SESSION['cart'][0] = array(
                'id' => $index,
                'name' => $id,
                'price' => $price,
                'quantity' => 1
            );
        }
    }

    function sub($index)
    {
        $_SESSION['cart'][$index]['quantity'] -= 1;
        if ($_SESSION['cart'][$index]['quantity'] < 1) {
            array_splice($_SESSION['cart'], $index, 1);
        }
    }


    switch ($operation) {
        case 'del':
            array_splice($_SESSION['cart'], $index, 1);
            break;
        case 'add':
            $_SESSION['cart'][$index]['quantity'] += 1;
            break;
        case 'sub':
            sub($index);
            break;
        case 'empty':
            $_SESSION['cart'] = [];
            break;
        default:
            add($index, $id, $price);
    }
}
header('Location:/products.php');
