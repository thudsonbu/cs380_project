# Sports Pro
Sports pro is a sports software company management app using the LAMP stack. The app allows you to manage customers, technicians, and products and
is a great example of synchronous database functions with PHP and MySQL. It also features a good example of permission levels, prepared statements,
and error handling in php.

# Tech Stack
Sports pro is hosted on an apache server by my school, Bentley University. The MySQL database is hosted on a MariaDB server on another local
machine at Bentley. 

# How to Use It
### General
There are three levels of permissions in the app. Admin with the highest permission, technicians with middle permission levels, and customers
with the least permission.
### Admin
Admin's have the highest permissions and can assign technicians to incidents, add, edit, and remove product information. As well as add, edit, and 
remove customers. The admins can view all pages on in the app except for add incident and register product.
### Technicians
Technicians in Sport Pro can add new incidents that have been reported by customers, view the incidents that admins have assigned to them, and resolve
customer incidents. Links to these pages are displayed upon authentication.
### Customers
Customers in Sports Pro are only allowed to register for products.
