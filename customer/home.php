<?php

session_start();
if($_SESSION['login_status'] == false){
    echo "Forbidden Access";
    die;
}

if($_SESSION['usertype'] != 'Customer'){
    echo "Unauthorised Access";
    die;
}

include "menu.html";

include "../shared/connection.php";

$sql_result = mysqli_query($conn,"select * from product");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    echo"<div class='card'>
            <div class='name'>$dbrow[name]</div>
            <div class='price'>$dbrow[price]</div>
            <div class='pdt-img-parent'>
                <img class='pdtimg' src='$dbrow[impath]'>
            </div>
            <div class='detail'>$dbrow[detail]</div>
            <div class='text-center cart-btn'>
                <a href='addcart.php?pid=$dbrow[pid]'>
                    <button class='btn btn-success'>Add to cart</button>
                </a>
            </div>    
        
        </div>";
}

?>

<html>
    <head>
        <style>
            .card{
                width: 200px;
                height: 350px;
                background-color: antiquewhite !important;
                display: inline-table !important;
                margin: 5px;
                padding: 5px;
            }
            .name{
                font-size: 24px;
                text-align: center;
            }
            .price{
                font-weight: bold;
                color: darkorange;
                font-size: 24px;
            }
            .price::before{
                content: " Rs ";
                color: black;
                font-size: 16px;
            }
            .pdt-img-parent,.pdtimg{
                width: 100%;
                height: auto;
            }
            .cart-btn{
                display: table-footer-group;
            }
        </style>
    </head>
</html>
