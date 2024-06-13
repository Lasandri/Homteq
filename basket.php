<?php
session_start();
include ("db.php");
$pagename="Smart Basket";                                                               //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";                   //Call in stylesheet
echo "<title>".$pagename."</title>";                                                //display name of the page as window title
echo "<body>";
include ("headfile.html");                                                          //include header layout file 
echo "<h4>".$pagename."</h4>";                                                      //display name of the page on the web page

    // if(isset($_POST['prodid'])){
    //     $newprodid = isset($_POST['prodid']) ? $_POST['prodid'] : 0;

    //                                         // Capture the required quantity of selected product using the POST method and $_POST superglobal variable 
    //                                         // and store it in a new local variable called $reququantity
    //     $reququantity = isset($_POST['p_quantity']) ? $_POST['p_quantity'] : 0;

    //                                         // Display id of selected product
    //     echo "<p>Selected product ID: ".$newprodid."</p>";

    //     echo "<p>Quantity of selected product: ".$reququantity."</p>";                      // Display quantity of selected product


    //     $_SESSION['basket'][$newprodid] = $reququantity;        // Update the session array with the product id and required quantity


    //     echo "<p>1 item added</p>";        // Display message indicating that the item is added to the basket

    // }  else{
    //     if(isset($_POST['del_prodid'])) {
    //         // Capture the posted product ID
    //         $delprodid = $_POST['del_prodid'];
            
    //         // Unset the cell of the session for the posted product ID
    //         unset($_SESSION['basket'][$delprodid]);
            
    //         // Display "1 item removed from the basket" message
    //         echo "<p>1 item removed from the basket</p>";
        
    // }  


    //     $total = 0;
    //     echo '<form method="post" action="basket.php">';
    //     echo '<table id="baskettable">';
    //     echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th>Remove Product</th></tr>";
        
            $total = 0;
        if (isset($_POST['prodid']))
        {
            $newprodid =$_POST['prodid'];
            $reququantity =$_POST['p_quantity'];
            
            echo "ID of selected Product:".$newprodid;
            echo "Qty of selected Product:".$reququantity;
            
            //create a new cell in the basket session array. Index this cell with the new product id.
        //Inside the cell store the required product quantity
            $_SESSION['basket'][$newprodid]=$reququantity;
        }

        else
        {
            echo "<p>Current basket unchanged";
        }
            echo "<table border='1' style='width:50%'>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SubTotal</th>
                <th>Remove Product</th>
            </tr>";



            if(isset($_SESSION['basket'])){

                foreach($_SESSION['basket'] as $key => $value)
                {	
                    $SQL="select prodId,prodName,prodPrice from product where prodId = '".$key."';";
                    //Create a new variable containing the execution of the SQL query i.e. select the records or get out
                    $exeSQL=mysqli_query($conn,$SQL) or die (mysqli_error());
                    $arrayprod=mysqli_fetch_array($exeSQL);
                    echo "<tr>
                    <td>".$arrayprod['prodName']."</td>
                    <td>".$arrayprod['prodPrice']."</td>
                    <td>".$value."</td>
                    <td> Rs ".$arrayprod['prodPrice']*$value."</td>";
                    $total = $total+($arrayprod['prodPrice']*$value);
            echo "<form action=basket.php method=post>";
            echo "<td>";
            echo "<input type=submit value='Remove'>";
            echo "</td>";
            echo "<input type=hidden name=del_prodid value=".$arrayprod['prodId'].">";
            echo "</form>";
                }
            
                    }
            else{
                echo "Empty Basket";
                }
                    echo "<tr><td colspan='4'>Total</td><td>Rs ".$total."</td></tr></table>";
                    echo "<a href='clearBasket.php'>Clear the basket</a>";
                    echo "<br><br>";
                    echo "New HomeTeq Customers";
                    echo "<a href='register.php'> Register</a>";
                    echo "<br>";
                    echo "Returning HomeTeq Customers";
                    echo "<a href='login.php'> Login</a>";
                    
                    
                    
                    if (isset($_POST['del_prodid']))
                    {
                    //capture the posted product id and assign it to a local variable $delprodid
                    $delprodid=$_POST['del_prodid'];
                    //unset the cell of the session for this posted product id variable
                    unset ($_SESSION['basket'][$delprodid]);
                    //display a "1 item removed from the basket" message
                    header("Refresh:0");
                    echo "<p>1 item removed";
                    }
                    
            
            include("footfile.html");
            //include head layout
            echo "</body>";
            ?>