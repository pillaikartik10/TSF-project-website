<!--PHP code for Transfer Money page-->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <!--Navigation Bar-->
    <section class="customer-head">
        <nav>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="customers.php">CUSTOMER LIST</a></li>
                    <li><a href="transactions.php">TRANSACTIONS</a></li>
                    <li><a href="#contact">CONTACT US</a></li>
                </ul>
                </div>
        </nav>             
    </section>

<div>
<?php
    //Connecting to the local SQL database. If hosting online, credentials will change. Everything else remains the same.
    $username = "root";
    $password = "";
    $database = "tsf_database";
    $mysqli = new mysqli("localhost", $username, $password, $database);

    $query = "SELECT * FROM customers";

    //creating Transfer Money form. The input is sent to 'handler.php' for further processing.
    echo '<form method = "post" action = "handler.php">';
    echo '<h2 style = "color : rgb(10,30,63); margin-left : 10px;"> Transfer Money</h2><br>';
    
    //creating Select Sender dropdown
    echo '<select name = "sender" required>';
    echo '<option selected disabled value = "">Choose Sender</option>';

        //Each Sender option is read from the 'customers' table and printed out.
        if ($result = $mysqli->query($query)) {

            while ($row = $result->fetch_assoc()) {
                $field1name = $row["ID"];
                $field2name = $row["Name"];
                $field3name = $row["Email"];
                $field4name = $row["Phone"];
                $field5name = $row["Balance"];

                echo '<option value ='.$field1name.'>'.$field2name.'</option>';
                
            }

    $result->free();
    }
    echo '</select>';

    //creating Select Receiver dropdown
    echo '<select name = "receiver" required>';
    echo '<option selected disabled value = "">Choose Receiver</option>';

        //Each Receiver option, read from 'customers' table.
        if ($result = $mysqli->query($query)) {

            while ($row = $result->fetch_assoc()) {
                $field1name = $row["ID"];
                $field2name = $row["Name"];
                $field3name = $row["Email"];
                $field4name = $row["Phone"];
                $field5name = $row["Balance"];

                echo '<option value ='.$field1name.' required>'.$field2name.'</option>';
                
            }

        $result->free();
    }
    echo '</select>';
    echo '<br>';
    
    //input label for the amount to be transferred
    echo '<label for = "amount"> Enter the amount to be transferred :</label><br>';

    echo '<input name = "amount" type = "number" required>';
    echo '<br>';

    //submit button for the form
    echo '<input type = "submit" name = "submit" class = "h-button">';

    echo '</form>';
?>
</div>
</body>
</html>
