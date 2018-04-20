<?php
#redirects need to happen above the html in the page
#cookies, session etc in the php, this cannot be handled by html
#Will be pulling data out of header that was sent to this page after click "Submit button" on the apply  page
## looks for the first variable ie user data and any errors that were caught
$errors = array();#array function that returns an array
$user_data = array();#user_data and errors both hold arrays
##--------
$first_name = filter_input(INPUT_GET, 'first_name');#if first name is left blank it will return null
#validation rule
if($first_name == null){#checks if userdata is null(makes the field required essentiall )
    #we want to gather errors in a format that we can spit back out and put in header to return to apply page
    $errors[] = 'first_name_error=First name is required.';
}elseif (strlen($first_name) < 3 ){#checks that user data is longer than 3 chars
    $errors[] = 'first_name_error=Longer first name please.';
}
$user_data[] = "first_name=$first_name";
##----------
$last_name = filter_input(INPUT_GET, 'last_name');
if($last_name == null){
    $errors[] = 'last_name_error=Last name is required.';
}elseif (strlen($last_name) < 3 ){
    $errors[] = 'last_name_error=Longer last name please.';
}
$user_data[] = "last_name=$last_name";
##---------
$street = filter_input(INPUT_GET, 'street');
if($street == null){
    $errors[] = 'street_error=Street is required.';
}
$user_data[] = "street=$street";
##--------
$city = filter_input(INPUT_GET, 'city');
if($city == null){
    $errors[] = 'city_error=City is required.';
}
$user_data[] = "city=$city";
##------
$state = filter_input(INPUT_GET, 'state');
if($state == null){
    $errors[] = 'state_error=State is required.';
}
$user_data[] = "state=$state";
##------------------------
$zipcode = filter_input(INPUT_GET, 'zipcode', FILTER_VALIDATE_INT);#validates if zipcode is an actual int, if not an in will return false if nothing is submitted then it returns null
if($zipcode == null){
    $errors[] = 'zipcode_error=Zipcode is required.';
}elseif (!$zipcode){
    $errors[] = 'zipcode_error=Zipcode must be all numbers.';
}
$user_data[] = "zipcode=$zipcode";
##-----------------------------------
$age = filter_input(INPUT_GET, 'age', FILTER_VALIDATE_INT);#willnever evaluate to true
if($age == null){
    $errors[] = 'age_error=Age is required.';
}elseif (!$age){#checking to see if age is in an actual int should evalute to tru
    $errors[] = 'age_error=Age must be a number.';
}elseif ($age > 122) {
    $errors[] = 'age_error=Age must be  less than 123.' ;
}
$user_data[] = "age=$age";
##-----------------------
$birth_date = filter_input(INPUT_GET, 'birth_date');
if($birth_date == null){
    $errors[] = 'birth_date_error=Birthdate is required.';
}
$user_data[] = "birth_date=$birth_date";
##--------------------------
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
if($email == null){
    $errors[] = 'email_error=Email is required.';
}elseif (!$email){
    $errors[] = 'email_error=Please enter a valid email address.';
}
$user_data[] = "email=$email";
##----------------------
$why_me = filter_input(INPUT_GET, 'why_me');
if($why_me == null){
    $errors[] = 'why_me_error=A reason is required.';
}elseif (strlen($why_me) < 11 ){
    $errors[] = 'why_me_error=A LONGER reason is required.';
}
$user_data[] = "why_me=$why_me";
##---------------------------------
$authorize_share = filter_input(INPUT_GET, 'authorize_share', FILTER_VALIDATE_BOOLEAN);
##--------------------
$page = 'apply.php?';#sets teh page variable and gets it ready to add all the parameters and values in the url
#loop to construct the url to send the data back to apply.php
if( count($errors) > 0){
    foreach($errors as $value){
        $page .= $value . '&';
    }
    foreach($user_data as $data){
        $page .= $data .'&';
    }
    header("Location: $page");#the building of the string has to happen in the header
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="result">
    <?php 
        if($authorize_share){
            echo 'Congratulations, you get free Internet';
        }else{
            echo 'No free Internet for you :(';
        }
    ?>
    </div>
</body>
</html>