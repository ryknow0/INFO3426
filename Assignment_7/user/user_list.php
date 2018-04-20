<?php include '../view/header.php'; ?>
<main>
   <section>
       <h1>All Users</h1>
       <table border="1">
       <tr><td>Firstname</td><td>Lastname</td><td>Email</td><td>Action</td></tr>
       <?php foreach ($users as $user) :?>
           <tr>
               <?php echo '<td>'. $user['Firstname'] . '</td><td>' .  $user['Lastname'] . '</td><td>'.  $user['Email'] .'</td><td><a href=\'../checkout/index.php?action=checked_out_by_user&UserId='.$user['UserId'].'\'>Books Checked Out</a></td>'; ?>
           </tr>
       <?php endforeach; ?>
       </table>
       <?php //var_dump($books); ?>
   </section>
</main>
<?php include '../view/footer.php'; ?>
