<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Ubuntu'/>
<style>
.cd-tab {width: 160px; height:15px; line-height: 15px; background: none repeat scroll 0 0 #DCE1E9;text-align:center;padding: 5px;}
.cd-intab {width: 40px; font-family: 'Ubuntu', sans-serif; font-size: 55%; color:#666; text-align:center; height:15px; float:left}
.countdown {width: 160px; font-family: 'Ubuntu', sans-serif; font-size: 135%; color:#3D6789; text-align:center; height:20px; line-height: 15px; background: #DCE1E9;padding: 5px;}
#wrap_timer {display: block;}
#timer {float: left;}
#sync {float: left; display: block; padding:10px;}
</style>
</head>

<body>
<div class="cd-tab">
	<div class="cd-intab">DAYS</div>
	<div class="cd-intab">HRS</div>
    <div class="cd-intab">MIN</div>
    <div class="cd-intab">SEC</div>
</div>
<div id=wrap_timer>
	<div id="timer" class="countdown"></div>
    <div id="sync"><img src="img/preloader_min.gif" /></div>
</div><br /><br />
<input type="button" value="Reload Page" onClick="window.location.reload()">
<?php
// request event time from mysql generate current time and calculate the diff
$event_time = 1901497321;

$current_time = time();
$timeLeft = $event_time-$current_time;
?>
<script type="text/javascript">

//initiate the same vars as in php with the same values
var eventtime = 1424644309;
var timeLeft = <?php echo $timeLeft?>;

//ajax call to the server to get new current time
function get_time() {
    // 1. Instantiate XHR - Start
    var xhr;
	var newtime;
    if (window.XMLHttpRequest) 
        xhr = new XMLHttpRequest();
    else if (window.ActiveXObject) 
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    else 
        throw new Error("Your browser does not support Ajax. What a shame...");
    // 1. Instantiate XHR - End

    // 2. Handle Response from Server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState < 4)
            document.getElementById('sync').style.display = "block";
        else if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) 
                document.getElementById('sync').style.display = "none";
				//ajax response is the new current time
				var newtime = xhr.responseText;
				//calc new diff and how many total seconds are left
				var timeLeft = eventtime - newtime;
        }
    }
    // 2. Handle Response from Server - End

    // 3. Specify your action, location and Send to the server - Start    
    xhr.open('POST', 'servertime.php');
    xhr.send(null);
    // 3. Specify your action, location and Send to the server - End
}

//pad digits with extra 0 if below 10
function pad(value) {
    if(value < 10) {
        return '0' + value;
    } else {
        return value;
    }
}

//countdown
var timer = setInterval(function() {
    timeLeft--;
	var hrs = 3600;
	var mins = 60;
	var sec = 1;
	
	/*only min and sec
    var minutesLeft = Math.floor(timeLeft / 60);
    var secondsLeft = timeLeft % 60;
	document.getElementById('timer').innerHTML = "00 : 00 : " + pad(minutesLeft) + " : " + pad(secondsLeft);
    console.log('Time left: '00 : 00 : ' + ':' + minLeft + ':' + secLeft);
	*/
	
	//hrs, min and sec
	var hrsLeft = Math.floor(timeLeft / hrs);
	var minLeft = Math.floor((timeLeft % hrs) / mins);
	var secLeft = Math.floor(timeLeft % mins);
	document.getElementById('timer').innerHTML = "00 : " + pad(hrsLeft) + " : " + pad(minLeft) + " : " + pad(secLeft);
	console.log('Time left: ' + pad(hrsLeft) + ':' + pad(minLeft) + ':' + pad(secLeft));
	
	
    if (timeLeft <= 0) {
        clearInterval(timer);
		clearInterval(mytime);
		document.getElementById('timer').innerHTML = "Ended!";
    }
}, 1000);

function synctime(){
var refresh=10000; // Refresh rate in milliseconds
mytime=setInterval('get_time();',refresh)
}

var sync = synctime();
</script>
</body>
</html>