<? php 
//catch user input for null values and set error messages


$city = filter_input(INPUT_GET, 'city');//INPUT_GET catches the info from the GET from the client
if($city == null){//checks if there is anything entred in the text box
    $errors[] = 'city_error=City is required';//adds the error and the message to the error array
}
$user_data[] = "city=$city";//sets city key value pair for the $user_data array
//------------------------
$state = filter_input(INPUT_GET, 'state');
if($state == null){
    $errors[] = 'state_error=State is required';
}
$user_data[] = "state=$state";
//----------------------------
$zip = filter_input(INPUT_GET, 'zip', FILTER_VALIDATE_INT);//filter validate does not check true or false
if($zip == null){
    $errors[] = 'zip_error=Zipcode is required';
} elseif(!$zip){//!zip means not false, to run it must = true
    $errors[] ='zip_error=Zipcode must be all numbers';
}
$user_data[] = "zip=$state";
//----------------------------
$age = filter_inpt(INPUT_GET, 'age', FILTER_VALIDATE_INT);
if($age == null){
    $errors[] = 'age_error=Age is required';
} elseif(!$age){// checks for not true, to run must = true
    $errors[] = 'age_error=Age must be numbers';
}elseif($age > 122){
    $error[] = 'age_error=Age must be less than 123'
}
$user_data[] = "age=$age";
//---------
$birth_date = filter_iput(INPUT_GET, "birth_date")
if($birth_date == null){
    $errors[] = 'birth_date_error=Birthday is required';
}
$user_data[] = "birth_date=$birth_date";
//------------
$email = filter_input(INPUT_GET,'email', FILTER_VALIDATE_EMAIL);
if($email == null){
    $errors[] = 'email_error=Email is required';
}elseif(!$email){
    $errors[] = 'email_error=Email must be a valid email';
}
$user_data[] = "email=$email";
//----------
$why_me = filter_input(INPUT_GET, 'why_me');
if($why_me == null){
    $error[] = 'why_me_error=A reason is required';
}elseif(strlen($why_me)<11){
    $error[] = 'why_me_error= A LONGER reason is required';
}
$user_data="why_me=$why_me";
//------
$authorize_share = filter_input(INPUT_GET,'authorized_share',FILTER_VALIDATE_BOOLEAN);//if you but yes 1 or true as the default value of the radio but then it will evaluate as true