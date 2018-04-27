<?php include '../view/header.php'; ?>
<main>
   <section>
       <h1>All Calendar Entries</h1>
       <table border="1">
       <tr><td>Event Name</td><td>Event Start Time</td><td>Event Location</td><td>Attendance Probability</td></tr>
       <?php foreach ($calendars as $calendar) :?><!-- loops through $calendars array and displays each $calendar event property -->
           <tr><!-- each loop adds a new row-->
               <?php echo '<td>'.//each line ads a new column cell 
               $calendar['EventName'] . '</td><td>' . 
               $calendar['StartTime'] . '</td><td>'. 
               $calendar['EventLocation'] .'</td><td>' .
               $calendar['AttendProbability'] . '</td>'; ?>
           </tr>
       <?php endforeach; ?>
       </table>
       <?php //var_dump($books); ?>
   </section>
</main>
<?php include '../view/footer.php'; ?>
