# vintage_vinyl
The project is based on a MySQL database programmed in PHP.
The MySQL queries are coded with prepared statements.
The site is a recordstore. Records are sorted in genres.
There are 3 user-roles: admin, employee and customer.\n
Users can add items to a cart. When an item is stored in a cart, the cart is created. 
The items are added connected to the users cart with a key constraint.
The admin section can be accessed by user with admin role.
The admin section contains crud for items, users and genres (so far)
