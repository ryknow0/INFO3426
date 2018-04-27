<?php include '../view/header.php'; ?>
<main>
   <section>
       <h1>Available Books</h1>
       <table border="1">
       <tr><td>Title</td><td>Author</td><td>Action</td></tr>
       <?php foreach ($books as $book) :?>
           <tr>
               <?php echo '<td width=\'400\'>'. $book['Title'] . '</td><td width=\'200\'>' .  $book['Authors'] . '</td><td><a href=\'../checkout/index.php?action=checkout&BookId='.$book['BookId'].'\'>Checkout</a></td>'; ?>
           </tr>
       <?php endforeach; ?>
       </table>
       <?php //var_dump($books); ?>
   </section>
</main>
<?php include '../view/footer.php'; ?>
