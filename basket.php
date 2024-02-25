<?php
session_start();
include ("db.php");
$pagename="Smart Basket";                                                               //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";                   //Call in stylesheet
echo "<title>".$pagename."</title>";                                                //display name of the page as window title
echo "<body>";
include ("headfile.html");                                                          //include header layout file 
echo "<h4>".$pagename."</h4>";                                                      //display name of the page on the web page

    if(isset($_POST['prodid'])){
        $newprodid = isset($_POST['prodid']) ? $_POST['prodid'] : 0;

                                            // Capture the required quantity of selected product using the POST method and $_POST superglobal variable 
                                            // and store it in a new local variable called $reququantity
        $reququantity = isset($_POST['p_quantity']) ? $_POST['p_quantity'] : 0;

                                            // Display id of selected product
        echo "<p>Selected product ID: ".$newprodid."</p>";

        echo "<p>Quantity of selected product: ".$reququantity."</p>";                      // Display quantity of selected product


        $_SESSION['basket'][$newprodid] = $reququantity;        // Update the session array with the product id and required quantity


        echo "<p>1 item added</p>";        // Display message indicating that the item is added to the basket

    }  else{
        echo "<p> Basket unchanged</p>";
    }  


    $total = 0;

    if(isset($_SESSION['basket'])){
        echo '<table>';
        echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";
        echo "</table>";

        foreach ($_SESSION['basket'] as $index => $value) {
            
            $SQL = "SELECT prodName, prodPrice FROM Product WHERE prodId=$index";
            
            $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
            $arrayp = mysqli_fetch_array($exeSQL);
    
            // Create a new HTML table row
            echo "<tr>";
            echo "<td>".$arrayp['prodName']."</td>";
            echo "<td>".$arrayp['prodPrice']."</td>";
            echo "<td class = 'baskettable'>".$value."</td>";
            echo "</tr>";

            echo "<tr>";            
            $subtotal = $arrayp['prodPrice'] * $value;

            echo "<td colspan='3'>".$subtotal."</td>";
            $total += $subtotal;
            echo "</tr>";
        }
    } else {
        // Display empty basket message
        echo "<p>Your basket is empty</p>";
    }


include("footfile.html");                                                           //include head layout
echo "</body>";
?>