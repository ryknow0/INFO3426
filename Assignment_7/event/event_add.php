<?php include '../view/header.php'; ?>
<main>
   <section>
       <h1>Add An Event</h1>
       <!-- Setup action point to index file, set the post type to POST-->
       <form action="/INFO3426/Assignment_7/event/index.php" method="post">
       <!-- Sets-up user input as POST action=add_event_data how you tell you want to add all the data you are passing-->
        <input type="hidden" name="action" value="add_event_data"/>
            Event Name: <input type="text" name="event_name"> <br/>
            Event Type: <select type="text" name="event_type"> <br/>
            <!-- option list for event type
            multiple text fields on page to take user input-->
                <option value="Comedy Night">Comedy Night</option>
                <option value="Dance Performance">Dance Performance</option>
                <option value="Gardening">Gardening</option>
                <option value="Home and Family Expo">Home and Family Expo</option>
                <option value="Musical Performance">Musical Performance</option>
                <option value="Play">Play</option>
                <option value="Sporting Event">Sporting Event.</option>
                </select> <br/>
                
            Event Location: <input type="text" name="event_location"> <br/>
            Event Date and Start Time: <input type="text" name="start_time"> <br/>
            Event Date and End Time: <input type="text" name="end_time"> <br/>
            Event Hours Duration: <input type="text" name="hours_duration"> <br/>
             <input type="submit" name="submit"> <br/>

        </Form>
   </section>
</main>
<?php include '../view/footer.php'; ?>  