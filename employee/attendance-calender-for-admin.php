<?php
require_once("employee-header.php");
if(isset($_SESSION["employee_user_name"])) {
	echo '<div class="page-container">';

	function draw_calendar($month,$year,$events = array()){

		/* draw table */
		$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

		/* table headings */
		$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$calendar.= '<tr class="calendar-row"><td class="calendar-day-head btn-default">'.implode('</td><td class="calendar-day-head btn-default">',$headings).'</td></tr>';

		/* days and weeks vars now ... */
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();

		/* row for week one */
		$calendar.= '<tr class="calendar-row">';

		/* print "blank" days until the first of the current week */
		for($x = 0; $x < $running_day; $x++):
			$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
			$days_in_this_week++;
		endfor;

		/* keep going with days.... */
		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			$calendar.= '<td class="calendar-day"><div style="position:relative;height:auto;">';
				/* add in the day number */
				$calendar.= '<div class="day-number">'.$list_day.'</div>';
				/* 2 digit list_day Conversion*/
			    if ($list_day < 10) {
			        $list_day = "0" . $list_day;
			    }
				$event_day = $year.'-'.$month.'-'.$list_day;
				if(isset($events[$event_day])) {
					$login_status = "";
					foreach($events[$event_day] as $event) {
						if($event['login_time']){
							if($event['login_time'] <= '10:15:00' ){
								$login_status = "On Time";
							}
							else{

								 //calculating the difference
							    $difference = strtotime($event['login_time']) - strtotime("10:15:00");

							    //calculating hours, minutes and seconds (as floating point values)
							    $hours = $difference / 3600; //one hour has 3600 seconds
							    $minutes = ($hours - floor($hours)) * 60;
							    $seconds = ($minutes - floor($minutes)) * 60;

							    //formatting hours, minutes and seconds
							    $late_hours = floor($hours);
							    $late_minutes = floor($minutes);
							    $late_seconds = floor($seconds);

								$login_status = "Late (" . $late_hours . "h " . $late_minutes . "m " . $late_seconds ."s)";
							}
						}else{
							$login_status = "Absent";
						}
						$login_status = "<span>". $login_status . "</span>";

						$calendar.= '<div class="event" data-toggle="popover" data-placement="top" data-html=true title="'.$event['name'].'" data-content="Role: '.$event['role'].'<br/>Login Date:'.$event['login_date'].'<br/>Login Time: '.$event['login_time'].'<br/>Login Staus: '.$login_status.'"> '.$event['name']." -> ".$event['login_time'].'</div>';
					}
				}
				else {
					$calendar.= str_repeat('<p>&nbsp;</p>',2);
				}
			$calendar.= '</div></td>';
			if($running_day == 6):
				$calendar.= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$calendar.= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;

		/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
			endfor;
		endif;

		/* final row */
		$calendar.= '</tr>';
		

		/* end the table */
		$calendar.= '</table>';

		/** DEBUG **/
		$calendar = str_replace('</td>','</td>'."\n",$calendar);
		$calendar = str_replace('</tr>','</tr>'."\n",$calendar);
		
		/* all done, return result */
		return $calendar;
	}

	function random_number() {
		srand(time());
		return (rand() % 7);
	}

	/* date settings */
	$month = (int) ($_GET['month'] ? $_GET['month'] : date('m'));
	$year = (int) ($_GET['year'] ? $_GET['year'] : date('Y'));

	/* select month control */
	$select_month_control = '<select name="month" id="month">';
	for($x = 1; $x <= 12; $x++) {
		$select_month_control.= '<option value="'.$x.'"'.($x != $month ? '' : ' selected="selected"').'>'.date('F',mktime(0,0,0,$x,1,$year)).'</option>';
	}
	$select_month_control.= '</select>';

	/* select year control */
	$year_range = 7;
	$select_year_control = '<select name="year" id="year">';
	for($x = ($year-floor($year_range/2)); $x <= ($year+floor($year_range/2)); $x++) {
		$select_year_control.= '<option value="'.$x.'"'.($x != $year ? '' : ' selected="selected"').'>'.$x.'</option>';
	}
	$select_year_control.= '</select>';

	/* "next month" control */
	$next_month_link = '<a href="?month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="control btn-default">Next Month &gt;&gt;</a>';

	/* "previous month" control */
	$previous_month_link = '<a href="?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="control btn-default">&lt;&lt; 	Previous Month</a>';


	/* bringing the controls together */
	$controls = '<form method="get">'.$previous_month_link.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$select_month_control.$select_year_control.'&nbsp;<input type="submit" name="submit" value="Go" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$next_month_link.' </form>';

	/* get all events for the given month */
	$events = array();
	/* 2 digit month Conversion*/
    if ($month < 10) {
        $month = "0" . $month;
    }
	$query = "SELECT users.name, users.role, DATE_FORMAT(logins.loginDate,'%Y-%m-%d') AS login_date, logins.loginTime AS login_time from users INNER JOIN logins  ON users.id=logins.userId AND logins.loginDate LIKE '$year-$month%' ORDER BY logins.loginDate";
	$result = mysqli_query($db->db_conn,$query) or die('cannot get results!');
	while($row = mysqli_fetch_assoc($result)) {
		$events[$row['login_date']][] = $row;
	}
	//print_r($events);

	//echo '<h2 style="float:left; padding-right:30px;">'.date('F',mktime(0,0,0,$month,1,$year)).' '.$year.'</h2>';
	echo '<div class="col-md-12 text-center calender-top-section">'.$controls.'</div>';
	echo '<div style="clear:both;"></div>';
	echo draw_calendar($month,$year,$events);
	echo '<br /><br />';

	echo '</div>'; /* End Page Container */
	require_once("employee-footer.php");	
} else{
	echo "<script>window.location.href='admin-login.php'</script>";
}

?>