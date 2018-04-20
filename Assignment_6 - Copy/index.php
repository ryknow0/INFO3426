<?php
session_start();
include '/INFO3426/Assignment_6/view/header.php';
?>
<main>
   <h1>Menu</h1>
   <ul>
       <li>
           <a href="user">Users</a>
       </li>
       <li>
           <a href="book">Books</a>
       </li>
       <li>
           <a href="checkout/index.php?action=list_available_books">Checkout</a>
       </li>
       <li>
           <a href="waitlist">Waitlist</a>
       </li>               
   </ul>
</main>
<?php include '/INFO3426/Assignment_6/view/footer.php'; ?>
