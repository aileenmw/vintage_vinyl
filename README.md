# vintage_vinyl
The project is based on a MySQL database programmed in PHP.
The MySQL queries are coded with prepared statements.
The site is a recordstore. Records are sorted in genres.
There are 3 user-roles: admin, employee and customer.
Users can add items to a cart. When a users first item is stored, a cart is created. 
Added items are connected to the users cart with a key constraint.
The admin section can be accessed by user with admin role.
The admin section contains crud for items, users and genres (so far)
