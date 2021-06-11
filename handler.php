<!--PHP code to handle input from Transfer Money page, validate it, make changes to the databases, and give appropriate message-->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <!--Navigation bar-->
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
    // Getting input from the Transfer Money Form
    $id1 = $_POST['sender'];
    $id2 = $_POST['receiver'];
    $amount = $_POST['amount'];
    $balance = 0;

    //Connecting to the local SQL database. If hosting online, credentials will change. Everything else remains the same.
    $username = "root";
    $password = "";
    $database = "tsf_database";
    $mysqli = new mysqli("localhost", $username, $password, $database);

    //Fetching Sender details from the table 'customers'.
    if( $result = $mysqli->query( "SELECT * FROM customers WHERE ID = $id1" ) ) {
        while( $row = $result->fetch_assoc() ) {
            $balance1 = $row['Balance'];
            $Name1 = $row['Name'];
        }
        $result->close();
    }

    //Fetching Receiver details from the table 'customers'.
    if( $result = $mysqli->query( "SELECT * FROM customers WHERE ID = $id2" ) ) {
        while( $row = $result->fetch_assoc() ) {
            $balance2 = $row['Balance'];
            $Name2 = $row['Name'];
        }
        $result->close();
    }
    

    //checking whether the Sender and Receiver are different persons. If not, show error. No transaction takes place.
    if ($id1 == $id2){
        $message = 'ERROR : The selected SENDER and RECEIVER are the same! Please rectify this error and try again.';
    }

    //checking whether the Sender has enough money to carry out the transaction. If not, show error.
    else if ($amount > $balance1){
        $message = 'ERROR : Insufficient balance! The sender account balance is '.$balance.'. Either send a value less than balance, or deposit money into the account before the transaction.';
    }

    //If both conditions shown above are satisfied, proceed with the transaction.
    else{
        $newAmount1 = $balance1 - $amount;
        $newAmount2 = $balance2 + $amount;
        
        //inserting the transaction details into the 'transactions' table.
        $query2 = "INSERT INTO transactions (Name1, Name2, Amount) VALUES ('$Name1','$Name2',$amount)";
        //changing the account balance of both Sender and Receiver.
        $query3 = "UPDATE customers SET Balance = $newAmount1 WHERE ID = $id1";
        $query4 = "UPDATE customers SET Balance = $newAmount2 WHERE ID = $id2";
        if($result = $mysqli->query($query2)){
            $mysqli->query($query3);
            $mysqli->query($query4);

            $message = 'Success! The transaction is processed.';
        }
        else{
            $message = 'Database error, Try again!';
        }    
    }

    //printing out transaction details for user, along with errors if any.
    echo '<div class = "transaction-details">';
    echo '<h2>Transaction Details </h2><br><br>';
    echo '<b>Sender : </b>'.$Name1.'<br>';
    echo '<b>Receiver : </b>'.$Name2.'<br>';
    echo '<b>Amount to be transferred : </b>'.$amount.'<br><br>';
    echo '<b>Message : </b><br>';
    echo $message;

    //buttons
    echo '<div class = "h-row">
            <a href = "transfer.php" class = "h-button">Go Back</a>
            <a href = "transactions.php" class = "h-button">Transaction Records</a>
            <a href = "customers.php" class = "h-button">Customer List</a>
    
         </div>';

    echo '</div>'; 
?>
</div>
</body>
</html>