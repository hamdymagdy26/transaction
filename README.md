# About Transaction

Transaction is an appilcation that you can use to pay amounts online and transfer money from your account to another's

## Steps to follow
To install the application, kindly follow these steps : 
- From terminal, run git clone https://github.com/hamdymagdy26/transaction.git 
- Create .env file with your database configurations.
- Run php artisan key:gen
- Run composer install.
- Create a database in your phpmyadmin, for examlpe : transaction
- Run php artisan migrate
- For seeding users, run php artisan db:seed --class=UserSeeder 
- For seeding transactions, run php artisan db:seed --class=TransactionSeeder 

Now It's All Set, to start testing the project, kindly use these endpoints : 
- for accessing user interface, follow :  {{your_domain}}/loginUser <br>
you can use these credentials: <br>
email : samy@gmail.com <br>
password : 123456 <br>
Or <br>
email : sameh@gmail.com <br>
password : 123456 <br>

In the previous endpoint, you can make checkouts according to the validation specified into the task and view your own transactions <br>

- for accessing admin interface, follow :  {{your_domain}}/admin/home <br>
you can use these credentials: <br>
email : mo@gmail.com <br>
password : 123456 <br>
Or <br>
email : hany@gmail.com <br>
password : 123456 <br>

In the previous endpoint : 
- You can view list of users and transactions
- You can also view charts of the accomplished transactions
- You can export report of all the transactions
- You can check all system logs and transactions made by users.

## Hope Everything Is Clear.
And kindly contact me for any issue with installing the application.

