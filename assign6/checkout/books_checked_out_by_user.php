<?php include '../view/header.php'; ?>
<main>
   <section>
       <h1>Books currently checked out by <?=$user['Firstname']?> <?=$user['Lastname']?></h1>
       <table border="1">
           <tr><td>Title</td><td>Author</td><td>Checkout Date</td><td>Due Date</td></tr>
           <?php foreach($checked_out_books as $checked_out_book) : ?>
               <tr><td><?php echo $checked_out_book['Title']; ?></td><td><?php echo $checked_out_book['Authors']; ?></td><td><?php echo $checked_out_book['CheckoutDate']; ?></td><td><?php echo $checked_out_book['DueDate']; ?></td></tr>
           <?php endforeach; ?>
       </table>

   </section>
</main>
<?php include '../view/footer.php'; ?>
