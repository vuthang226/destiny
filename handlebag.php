<?php
session_start();
include("./connect.php");
if(!isset($_SESSION['username'])){
        header('Location:./signIn.php');
}
    if(isset($_GET['name'])){
        $name = trim($_GET['name']);
    }

    if (isset($_POST['addbag'])||$name=='addbag') 
    {
        $back=intval($_GET['back']); 
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
            if($back>0){
            header('Location:./index.php');
        }else header('Location:./bag.php');
              
        } else{ 
              
            $query_b= mysqli_query($conn, "SELECT `pd.productCode`,`pd.buyPrice` FROM product
                WHERE `pd.productCode`= {$id}"); 
            if(mysqli_num_rows($query_b)>0){ 
                $row_b=mysqli_num_rows($query_b); 
                  
                $_SESSION['cart'][$id]['quantity']=1;
                $_SESSION['cart'][$id]['price']=$row_b[`pd.buyPrice`];

                  
                  
            }

            if($back>0){
            header('Location:./index.php');
        }else header('Location:./bag.php');
        } 
    }




        if ($name=='subbag') 
    {
        $id=intval($_GET['id']);
        $quantity=intval($_SESSION['cart'][$id]['quantity']);
        if($quantity<=1)
        {
            unset($_SESSION['cart'][$id]);
            header('Location:./bag.php');
        }else{
            $_SESSION['cart'][$id]['quantity']--;
            header('Location:./bag.php');
        }
    }



        if (isset($_POST['suballbag'])) 
    {}
        if (isset($_POST['cleanallbag'])) 
    {}


?>