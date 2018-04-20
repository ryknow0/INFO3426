<?php

#varibles that get/filter user inpup
$first_name = filter_input(INPUT_GET,'first_name');
$last_name = filter_input(INPUT_GET, 'last_name');
$city = filter_input(INPUT_GET, 'city');
$street = filter_input(INPUT_GET, 'street');
$state = filter_input(INPUT_GET, 'state');
$zipcode = filter_input(INPUT_GET, 'zipcode');
$age = filter_input(INPUT_GET, 'age');
$birth_date = filter_input(INPUT_GET, 'birth_date');
$email = filter_input(INPUT_GET, 'email');
$why_me = filter_input(INPUT_GET, 'why_me');

#Error Messages
#catches error from the filter input
$first_name_error = filter_input(INPUT_GET,'first_name_error');
#if there is an error detected then genterates the html to display the error
if($first_name_error != null) { $first_name_error = '<div class="errors">' . $first_name_error . '</div>';} 
$last_name_error = filter_input(INPUT_GET, 'last_name_error');
if($last_name_error != null) { $last_name_error = '<div class="errors">' . $last_name_error . '</div>';}
$city_error = filter_input(INPUT_GET, 'city_error');
if($city_error != null) { $city_error = '<div class="errors">' . $city_error . '</div>';}
$street_error = filter_input(INPUT_GET, 'street');
if($street_error != null) { $street_error = '<div class="errors">' . $street_error . '</div>';}
$state_error = filter_input(INPUT_GET, 'state_error');
if($state_error != null) { $state_error = '<div class="errors">' . $state_error . '</div>';}
$zipcode_error = filter_input(INPUT_GET, 'zipcode_error');
if($zipcode_error != null) { $zipcode_error = '<div class="errors">' . $zipcode_error . '</div>';}
$age_error = filter_input(INPUT_GET, 'age');
if($age_error != null) { $age_error = '<div class="errors">' . $age_error . '</div>';}
$birth_date_error = filter_input(INPUT_GET, 'birth_date_error');
if($birth_date_error != null) { $birth_date_error = '<div class="errors">' . $birth_date_error . '</div>';}
$email_error = filter_input(INPUT_GET,'email_error');
if($email_error != null) { $email_error = '<div class="errors">' . $email_error . '</div>';}
$why_me_error = filter_input(INPUT_GET, 'why_me_error');
if($why_me_error != null) { $why_me_error = '<div class="errors">' . $why_me_error . '</div>';}

?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
        <title>Apply for free Internet</title>
    </head>
    <body>
        <h1>Application for Free Internet By RDC</h1>
        <div id="survey">
            <form action="result.php" method="GET"><!--calls result.php-->
                First Name: <input type="text" placeholder="First Name" name="first_name" value="<?=$first_name?>"<br/><!--sets value = to the variable -->
                <?php echo $first_name_error ?>
                Last Name: <input type="text" placeholder="Last Name" name="last_name" value="<?=$last_name?>"><br/>
                <?php echo $last_name_error ?>
                Street: <input type="text" placeholder="Street Address" name="street" value="<?=$street?>"><br/>
                <?php echo $street_error ?>
                City: <input type="text" placeholder="City" size="10" name="city" value="<?=$city?>">
                <?php echo $city_error ?>
                State: <input type="text" placeholder="State" size="2" name="state" value="<?=$state?>">
                <?php echo $state_error ?>
                Zip: <input type="text" placeholder="Zipcode" size="5" name="zipcode" value="<?=$zipcode?>"><br/>
                <?php echo $zipcode_error ?>
                Age: <input type="text" placeholder="Age" name="age" value="<?=$age?>"><br/>
                <?php echo $age_error ?>
                Birth Date: <input type="text" placeholder="Birth Date" name="birth_date" value="<?=$birth_date?>"><br>
                <?php echo $birth_date_error ?>
                Email: <input type="text" placeholder="Email" name="email" value="<?=$email?>"><br>
                <?php echo $email_error ?>
                Explain why you should receive free Internet:<br/> 
                <textarea name="why_me" cols="50" rows="10"><?=$why_me?></textarea><br>
                <?php echo $why_me_error ?>
                I authorize NetZero to share my email address to it's partners. 
                <input type="radio" name="authorize_share" value="true"> Yes
                <input type="radio" name="authorize_share" value="false" checked> No <br/>
                <!--form action="results.php" when be executed when the submit button is clicked -->
                <input type="submit" value="Submit"/>
            </form>
        </div>
    </body>
</html>
