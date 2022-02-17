<?php
session_start();
$products = array(
    101 => array(
        'id' => 'Product 101',
        'price' => '150',
        'image' => 'football.png'
    ),
    102 => array(
        'id' => 'Product 102',
        'price' => '120',
        'image' => 'tennis.png'
    ),
    103 => array(
        'id' => 'Product 103',
        'price' => '90',
        'image' => 'basketball.png'
    ),
    104 => array(
        'id' => 'Product 104',
        'price' => '110',
        'image' => 'table-tennis.png'
    ),
    105 => array(
        'id' => 'Product 105',
        'price' => '80',
        'image' => 'soccer.png'
    )
);

$cartArray = $_SESSION['cart'];
?>