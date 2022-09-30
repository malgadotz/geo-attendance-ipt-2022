ADMIN TEMPLATE SUPER FLEXIBLE 
https://github.com/jeroennoten/Laravel-AdminLTE/


<?php 

// UPLOAD FILE
if($request->hasFile('image'))
{
    $file=$request->file('image');
    $ext=$file->getClientOriginalExtension();
    $filename=time().'.'.$ext;
    $file->move('assets/img',$filename);
    $model->image=$filename;
}

// Hour
date_default_timezone_set("Africa/Johannesburg");
$now = new DateTime();
$future_date = new DateTime('2020-10-21 00:00:00');

$interval = $future_date->diff($now);

echo ($interval->format("%a") * 24) + $interval->format("%h"). " hours". $interval->format(" %i minutes ");
print_r($now->format('Y-m-d H:i:s'));

// HOUR 2
$hourdiff = round((strtotime($time1) - strtotime($time2))/3600, 1);

// HOUR MINU SEC 3
// STEP 1

$date=date_create("2021-04-25");
echo date_format($date,"Y/m/d");

// STEP 2
$date1=date_create("2021-04-25");
$date2=date_create("2019-12-12");
$diff=date_diff($date1,$date2);
// OUTPUT
// DateInterval Object ( [y] => 1 [m] => 4 [d] => 13 [h] => 0 [i] => 0 [s] => 0 [f] => 0 [weekday] => 0 [weekday_behavior] => 0 [first_last_day_of] => 0 [invert] => 1 [days] => 500 [special_type] => 0 [special_amount] => 0 [have_weekday_relative] => 0 [have_special_relative] => 0 )

// STEP 3

//if you leave this it takes your current timezone
$userTimezone = "Africa/Dar_es_Salaam";
$timezone = new DateTimeZone( $userTimezone );
 
$crrentSysDate = new DateTime(date('m/d/y h:i:s a'),$timezone);
$userDefineDate = $crrentSysDate->format('m/d/y h:i:s a');
 
$start = date_create($userDefineDate,$timezone);
$end = date_create(date('m/d/y h:i:s a', strtotime('09/05/22 00:00:35')),$timezone);
 
$diff=date_diff($start,$end);
 
echo "Year: ".$diff->y."</br>";
echo "Month: ".$diff->m."</br>";
echo "Days: ".$diff->d."</br>";
echo "Hours: ".$diff->h."</br>"; 
echo "Minutes: ".$diff->i."</br>"; 
echo "Seconds: ".$diff->s;


// OUTPUT

// Year: 1
// Month: 6
// Days: 6
// Hours: 7
// Minutes: 37
// Seconds: 39



// METHOD new
function timeDiff($firstTime,$lastTime){
    // convert to unix timestamps
    $firstTime=strtotime($firstTime);
    $lastTime=strtotime($lastTime);
 
    // perform subtraction to get the difference (in seconds) between times
    $timeDiff=$lastTime-$firstTime;
 
    // return the difference
    return $timeDiff;
 }
 
 //Usage :
 $difference = timeDiff("2002-03-16 10:00:00",date("Y-m-d H:i:s"));
 $years = abs(floor($difference / 31536000));
 $days = abs(floor(($difference-($years * 31536000))/86400));
 $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
 $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);
 echo "<p>Time Passed: " . $years . " Years, " . $days . " Days, " . $hours . " Hours, " . $mins . " Minutes.</p>";

?>

<!-- SET php VARIABLE IN javscript -->
<?php
 
    $nrmlString = 'Lorem ipsum dolor sit amet';
?>
<script type="text/javascript">
    var normalText = '<?php echo $nrmlString; ?>';
    console.log(normalText);
</script>


<!-- QR code GITHUB REPO -->
<!-- https://github.com/mebjas/html5-qrcode -->

<?php
// <!-- TIME DIFERENTIATE -->
// Creating DateTime objects
$dateTimeObject1 = date_create(date('h:i:s')); 
$dateTimeObject2 = date_create('12:15:00'); 
$dateTimeObject1 = date_create('2020-05-14'); 
$dateTimeObject2 = date_create('2021-02-14');
// Calculating the difference between DateTime objects
$interval = date_diff($dateTimeObject1, $dateTimeObject2); 
// Printing result in hours
echo ("Difference in hours is:");
echo $interval->h;
echo "\n<br/>";
$interval = date_diff($dateTimeObject1, $dateTimeObject2); 
$minutes = $interval->days * 24 * 60;
$minutes += $interval->h * 60;
$minutes += $interval->i;
//Printing result in minutes
echo("Difference in minutes is:");
echo $minutes.' minutes';


// Prints the day
echo date("l") . "<br>";

// Prints the day, date, month, year, time, AM or PM
echo date("l jS \of F Y h:i:s A") . "ddddddddddd<br>";

// Prints October 3, 1975 was on a Friday
echo "Oct 3,1975 was on a ".date("l", mktime(0,0,0,10,3,1975)) . "<br>";

// Use a constant in the format parameter
echo date(DATE_RFC822) . "<br>";

// prints something like: 1975-10-03T00:00:00+00:00
echo date(DATE_ATOM,mktime(0,0,0,10,3,1975));
