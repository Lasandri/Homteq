<?php
include("db.php");
$pagename="A smart buy for a smart home”";                                                          //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";                                   //Call in stylesheet
echo "<title>".$pagename."</title>";                                                                //display name of the page as window title
echo "<body>";
include ("headfile.html");                                                                          //include header layout file 
echo "<h4>".$pagename."</h4>";                                                                      //display name of the page on the web page

$prodid = isset($_GET['u_prod_id']) ? $_GET['u_prod_id'] : 0;

$SQL = "select prodId, prodName, prodPicNameSmall, prodDescripShort, prodPrice, prodPicNameLarge, prodDescripLong, prodQuantity FROM Product WHERE prodId = $prodid";
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

echo "<table style='border: 0px'>";


//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid

//display the value of the product id, for debugging purposes

while ($arrayp=mysqli_fetch_array($exeSQL))
{
    echo "<tr>";

echo "<td style='border: 0px'>";



echo "</td>";


echo "<tr>";

echo "<td style='border: 0px'>";

echo "<img src='images/".$arrayp['prodPicNameLarge']."' height='300' width='300'>";                    // Display the large image of the selected product

echo "</td>";

echo "<td style='border: 0px'>";

echo "<p><h2>".$arrayp['prodName']."</h2>";                                                             // Display the product name
echo "<p>".$arrayp['prodDescripLong'];                                                                  // Display the long description
echo "<p><br><b>Price: $".$arrayp['prodPrice']."</b>";                                                  // Display the product price
echo "<p><br>left in stock: ".$arrayp['prodQuantity']."</p>";                                          // Display the quantity available in stock
                                   

/*echo "<form action='basket.php' method='post' class='formStyle form'>";
    echo "<br><label for='quantity'> Number to be purchased:</label>";
    echo "<br><br><input type='number' id='quantity' name='quantity' min='1' max='".$arrayp['prodQuantity']."' required>";
    echo "<input type='hidden' name='prodid' value='".$prodid."'>";
    echo "<input type='submit' value='Add to Cart'class='btn'>";
    echo "</form>";

    */



    echo "<form action='basket.php' method='post'>";
    echo "<label for='quantity'>Number to be purchased:</label>";
    
    echo "<br><br><select name='p_quantity'>";                                  // Create a drop-down list for selecting the quantity of items to purchase


    
    for ($i = 1; $i <= $arrayp['prodQuantity']; $i++) {                 // Loop to dynamically populate the drop-down list with options from 1 to the stock level
        echo "<option value='".$i."'>".$i."</option>";
    }

    // Close the drop-down list
    echo "</select>";
    
    echo "<input type='hidden' name='prodid' value='".$prodid."'>";
    echo "<input type='submit' value='Add to Cart' class='btn'>";
    echo "</form>";

echo "</td>";

echo "</tr>";

}
echo "</table>";




include("footfile.html");   
echo "</body>";
?>
