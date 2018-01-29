<!-- PHP CODE -->
<!-- Anything that works with http requests needs to be coded above the html in the file -->
<!-- Apache recognizes the .php file extension passes the file to mod.php and process the 
     file/code then displays and runst the final html output -->
<?php
//php ignores white space at run time
//double quotes"" will be pre-processed by php to see if it contains a variable within single quotes is literal
//create dictionary to using an associative array
//create variable for dictionary professions
//value "Dentist"(key) is assigned to position 0(value)
//"Dictionary" has key value pairs and are associatative arrays in php
//$key is the name of the control
//$value is the value associated with the $key
//key = Dentist, Doctor, Pharmacist
//value = 0,0,0
$professions = ["Dentist"=>0,"Doctor"=>0, "Pharmacist"=>0];

//QUESTION 1
//create php variable from the html "name" property
//set variable from html radio button input
//Filter input is used to check if input exists in the html before it its grabbed,
$workout = filter_input(INPUT_GET, "workout");//grabs value from the GET super global in the form header
//Process the results from Question 1 incrementing the apporpriate array value depending on the selection
if($workout == 'country_club'){//if country club is selected
    $professions['Dentist']++;//incrament dentist
}
elseif($workout == 'outside'){//if outside is selected
    $professions['Doctor']++;//incrament doctor
}
elseif($workout == 'eat') {//if eat is selected
    $professions['Pharmacist']++;//incrament pharmacist
}
//QUESTION 2
//Grab the number of items selected and place into an array, then count array to see how many activities selected
$activity_array = array();
$activity_count = 0;
//calls isset function to see if item is selected from the GET action
//wake surfing will be passed in GET only if it selected, the GET will display a boolean value
//isset() checks for the boolean value
//checks for the checkbox html "name" value
$wake_surfing = isset($_GET['wake_surfing']);
$snowmobiling = isset($_GET['snowmobiling']);
$reading = isset($_GET['reading']);
$extreme_hiking = isset($_GET['extreme_hiking']);
$visiting_foreign_countries = isset($_GET['visiting_foreign_countries']);
$motorcycle_tours = isset($_GET['motorcycle_tours']);
//if checkbox is selected then add it to the activity array
if($wake_surfing){$activity_array[] = 'wake_surfing';}
if($snowmobiling){$activity_array[] = 'snowmobiling';}
if($reading){$activity_array[] = 'reading';}
if($extreme_hiking){$activity_array[] = 'extreme_hiking';}
if($visiting_foreign_countries){$activity_array[] = 'visiting_foreign_countries';}
if($motorcycle_tours){$activity_array[] = 'motorcycle_tours';}
//count the number of items in the array
$activity_count = count($activity_array);
//incrament the appropriate profession depending on # of items selected
if($activity_count >= 3){
    $professions['Dentist']++;
}
elseif($activity_count == 2){
    $professions['Doctor']++;
}
else{
    $professions['Pharmacist']++;
}

//QUESTION 3
//Get and filter user input
$boys_name = filter_input(INPUT_GET, 'boys_name');
//
$boys_vowel_count = vowel_count($boys_name);
//
if($boys_vowel_count >= 4){
    $professions['Pharmacist']++;
}
elseif($boys_vowel_count >= 2){
    $professions['Dentist']++;
}
else{
    $professions['Doctor']++;
}

//QUESTION 4
//Get and filter  user input
$girls_name = filter_input(INPUT_GET, 'girls_name');
//Call vowel count function
$girls_vowel_count = vowel_count($girls_name);
//
if($girls_vowel_count >= 4){
    $professions['Pharmacist']++;
}
elseif($girls_vowel_count >= 2){
    $professions['Dentist']++;
}
else{
    $professions['Doctor']++;
}

//vowel_count function
function vowel_count($name){
    //creates array to designate vowels to check againts
    $vowels=['a','e','i','o','u'];
    $vowel_count = 0;
    //iterate through each letter of $boys_name or $girls_name
    //$i = 0; sets counter begin state
    //i < strlen($name) tests if the counter $i greater than the length of $name 
    //$i++ incramentes the counter
    for($i = 0; $i < strlen($name); $i++){
        //checks the $i incrament value(narray_location/ncharacter) against the array of vowels
        if(in_array($name[$i], $vowels)){
            //incrament the vowel counter if check is true
            $vowel_count++;
        }
    }
    return $vowel_count;
}

//QUESTION 5
$talents = filter_input(INPUT_GET, 'talents');
$talents_length = mb_strlen($talents, 'utf-8');
if($talents_length > 40){
    $professions['Pharmacist']++;
}
elseif($talents_length >= 20){
    $professions['Dentist']++;
}
else{
    $professions['Doctor']++;
}
//QUESTION 6
$likely_task = filter_input(INPUT_GET, 'likely_task'); 
    if($likely_task == 'tanning'){
        $professions['Dentist']++;
    }
    elseif($likely_task == 'hgh'){
        $professions['Pharmacist']++;
    }
    else{
        $professions['Doctor']++;
    }
//QUESTION 7
$professions['Pharmacist']++;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Results Document</title>
</head>
<body>
    <h3>Ryan's Personality Profile Results:</h3>
    <div id="results">
    <!--Insert php here to calculate and display results -->
    <?php
        //iterate through the array(dictionary) $professions for each key
        //use "." to concatonate strings
        foreach($professions as $key => $value){
            //will display name of profession ($key) and the array value ($value),
            //Can insert html directly into php by concatonatiing it into the echo output
            echo $key.'='.$value.'<br/>'; 
        }
    ?>
    </div>
</body>
</html>