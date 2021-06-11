# TSF Web Development Internship, Task 1 - Online Banking System website  
  
Website hosted [here](https://tsf-website.000webhostapp.com/) on 000webhost.  
  
## Contents  
  
1. [Task](#task)  
2. [Technologies Used](#technologies-used)  
3. [Working Explanation](#working-explanation)  
4. [Links](#links)
  
## Task  
  
Basic Banking System  
  
◇ Create a simple dynamic website which has the following specs.  
◇ Start with creating a dummy data in database for upto 10 customers. Database options: Mysql, Mongo, Postgres, etc. Customers table will have basic fields such as name, email, current balance etc. Transfers table will record all transfers happened.  
◇ Flow: Home Page > View all Customers > Select and View one Customer > Transfer Money > Select customer to transfer to > View all Customers.  
◇ No Login Page. No User Creation. Only transfer of money between multiple users.  
◇ Host the website at 000webhost, github.io, heroku app or any other free hosting provider. Check in code in gitlab.  
  
## Technologies Used  
  
**Front End** : HTML + CSS  
**Back End** : PHP + SQL Database  
**Web Hosting** : 000webhost  
  
## Working Explanation    
  
1. The [index.html](https://github.com/pillaikartik10/TSF-project-website/blob/main/index.html) page is the homepage. It welcomes the user, shows the services available, and provides link to this GitHub page. **NOTE** : The Contact Us section is just a dummy, it doesn't work.  
2. The [customers.php](https://github.com/pillaikartik10/TSF-project-website/blob/main/customers.php) page shows the details of the 10 dummy customers - their names, e-mail addresses, phone numbers, and their current account balance. These data are read from an existing SQL database, hence the use of PHP. Here the SQL table is called *customers*, and it is in the database *tsf_database*.  
3. The [transactions.php](https://github.com/pillaikartik10/TSF-project-website/blob/main/transactions.php) page shows the details of transactions already completed. It shows the Sender name, the Receiver name, the amount transferred, and the time of transaction. This data is read from the table *transactions* from the database *tsf_database*. **NOTE** : The transaction time is recorded in UTC time. So it will be 5:30 hrs behind Indian Time.  
4. The [transfer.php](https://github.com/pillaikartik10/TSF-project-website/blob/main/transfer.php) page is where the user can transfer money. This page can be accessed from either the *customers.php* or *transactions.php* page, using the 'Transfer Money' option at the bottom. The user fills in the form, which asks for the Sender name, the Receiver Name, and the amount to be transferred. The user input is processed by the *handler.php* page.
5. The [handler.php](https://github.com/pillaikartik10/TSF-project-website/blob/main/handler.php) page 'handles' the user input received from *transfer.php*. It checks for any errors like the Sender and Receiver being selected as the same, or the amount to be transferred being greater than the Sender's current account balance. In case of no errors, the money is transferred - i.e, the *transactions* table records the transaction, and the changes are made to the Sender's and the Receiver's account balance in the *customers* table. The user sees the transaction details on the screen along with a message saying the transaction was processed correctly, or a error message if any.  
6. The [style.css](https://github.com/pillaikartik10/TSF-project-website/blob/main/style.css) applies CSS styling to the webpages.  
7. The [images](https://github.com/pillaikartik10/TSF-project-website/tree/main/images) folder contains a couple of images used in the website.  
8. The [tsf_database.sql](https://github.com/pillaikartik10/TSF-project-website/blob/main/tsf_database.sql) is the exported version of a sample database with 10 dummy values in the *customers* table and 2 dummy transactions in the *transactions* table. It can be imported into phpMyAdmin and used accordingly.  
  
## Links  
  
1. Interested in this internship? Find out more about the GRIP intership program conducted by The Sparks Foundation, [here](https://docs.google.com/presentation/d/1ewoYOi5YK0UifAaUnmUYsUaucDKHRpKPhNsS7vIgx5M/edit#slide=id.g35f391192_00).  
2. Find The Sparks Foundation on LinkedIn [here](https://www.linkedin.com/company/the-sparks-foundation/).  
3. Apply for the intership on Internshala from [here](https://internshala.com/internships/internship-at-GRIP%20At%20The%20Sparks%20Foundation).  
4. My personal [LinkedIn profile](https://www.linkedin.com/in/kartik-pillai/).  
