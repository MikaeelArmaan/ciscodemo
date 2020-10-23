<?php

/**
 * Helper class with shortcut functions to lookup URL
 */

// location of public asset folder
function admin_url($path = '')
{
	return config_item('base_url') . ('admin/' . $path);
}
function site_name()
{
	return config_item('website_name');
}
// location of public asset folder
function dev_name()
{
	return config_item('webdev_name');
}
// location of public asset folder
function asset_url($path)
{
	return config_item('base_url') . ('assets/' . $path);
}
function plugin_url($path)
{
	return config_item('base_url') . ('assets/plugins/' . $path);
}
function dist_url($path)
{
	return config_item('base_url') . ('assets/dist/' . $path);
}


// location of uploaded files
function upload_url($path)
{
	return config_item('base_url') . ('assets/upload/' . $path);
}

// location of post-processed images (i.e. optimized filesize)
function image_url($path)
{
	return config_item('base_url') . ('assets/images/' . $path);
}


function js_url($path)
{
	return config_item('base_url') . ('assets/js/' . $path);
}

function css_url($path)
{
	return config_item('base_url') . ('assets/css/' . $path);
}

// current URL includes query string
// Reference: http://stackoverflow.com/questions/4160377/codeigniter-current-url-doesnt-show-query-strings
function current_full_url()
{
	$CI = &get_instance();
	$url = $CI->config->site_url($CI->uri->uri_string());
	return $_SERVER['QUERY_STRING'] ? $url . '?' . $_SERVER['QUERY_STRING'] : $url;
}

// refresh current page (interrupt other actions)
function refresh()
{
	redirect(current_full_url(), 'refresh');
}


function unicode_wordwrap($str, $len = 50, $break = " ", $cut = false)
{
	if (empty($str)) return "";

	$pattern = "";
	if (!$cut)
		$pattern = "/(\S{" . $len . "})/u";
	else
		$pattern = "/(.{" . $len . "})/u";

	return preg_replace($pattern, "\${1}" . $break, $str);
}

function truncate_str($str, $maxlen = 35)
{
	$str	= trim(strip_tags($str));
	if (mb_strlen($str) <= $maxlen) {
		return $str;
	}


	$newstr = mb_substr($str, 0, $maxlen);


	if (mb_substr($newstr, -1, 1) != ' ') {
		$newstr = mb_substr($newstr, 0, mb_strrpos($newstr, " "));
	}

	$newstr	.= '...';

	return $newstr;
}


function convertTitleToSlug($string = '')
{
	$string = strtolower(trim($string));
	$slug	= preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return  $slug;
}


function get_http_details()
{
	$arrData  = array(
		'HTTP_ACCEPT' 	=> isset($_SERVER["HTTP_ACCEPT"]) ? $_SERVER["HTTP_ACCEPT"] : '',
		'HTTP_ACCEPT_LANGUAGE'	=> isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ? $_SERVER["HTTP_ACCEPT_LANGUAGE"] : '',
		'HTTP_CONNECTION'		=> isset($_SERVER["HTTP_CONNECTION"]) ? $_SERVER["HTTP_CONNECTION"] : '',
		'HTTP_HOST'				=> isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : '',
		'HTTP_ORIGIN'			=> isset($_SERVER["HTTP_ORIGIN"]) ? $_SERVER["HTTP_ORIGIN"] : '',
		'QUERY_STRING'			=> isset($_SERVER["QUERY_STRING"]) ? $_SERVER["QUERY_STRING"] : '',
		'REQUEST_URI'			=> isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : '',
		'SCRIPT_NAME'			=> isset($_SERVER["HTTP_ORIGIN"]) ? $_SERVER["SCRIPT_NAME"] : '',
		'PATH_INFO'				=> isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : '',
		'REQUEST_TIME'			=> isset($_SERVER["REQUEST_TIME"]) ? $_SERVER["REQUEST_TIME"] : '',
		'HTTP_REFERER'			=> isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '',
		'HTTP_USER_AGENT'		=> isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : '',
		'HTTP_COOKIE'			=> isset($_SERVER["HTTP_COOKIE"]) ? $_SERVER["HTTP_COOKIE"] : '',
		'HTTP_ACCEPT_ENCODING'	=> isset($_SERVER["HTTP_ACCEPT_ENCODING"]) ? $_SERVER["HTTP_ACCEPT_ENCODING"] : '',
		'REMOTE_ADDR'			=> isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : '',
		'HTTP_X_FORWARDED_FOR'	=> isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : '',
		'HTTP_CLIENT_IP'		=> isset($_SERVER["HTTP_CLIENT_IP"]) ? $_SERVER["HTTP_CLIENT_IP"] : ''
	);

	return $arrData;
}

function getAllErrors($heading = '', $message = '', $severity = '', $filepath = '', $line = '')
{
	ob_start();
?>
	<table width="100%" border="0">
		<tr>
			<td>Project Name:</td>
			<td align="left"><?php echo config_item('website_name'); ?></td>
		</tr>
		<tr>
			<td>Page Referrer:</td>
			<td align="left"><?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''; ?></td>
		</tr>
		<tr>
			<td>IP Address:</td>
			<td align="left"><?php echo isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : ''; ?></td>
		</tr>
		<tr>
			<td>Error Details:</td>
			<td align="left"><?php echo $heading; ?></td>
		</tr>
		<tr>
			<td>Error Descriptions:</td>
			<td align="left"><?php echo $message; ?></td>
		</tr>
		<tr>
			<td>Error Severity:</td>
			<td align="left"><?php echo isset($severity) ? $severity : ''; ?></td>
		</tr>
		<tr>
			<td>Error File Path:</td>
			<td align="left"><?php echo isset($filepath) ? $filepath : ''; ?></td>
		</tr>
		<tr>
			<td>Error Line:</td>
			<td align="left"><?php echo isset($line) ? $line : ''; ?></td>
		</tr>
		<tr>
			<td colspan="2">
				<table width="100%" border="0">
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>HTTP_ACCEPT: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>HTTP_VIA: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['HTTP_VIA']) ? $_SERVER['HTTP_VIA'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>HTTP_ACCEPT_CHARSET: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['HTTP_ACCEPT_CHARSET']) ? $_SERVER['HTTP_ACCEPT_CHARSET'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>HTTP_ACCEPT_ENCODING: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>HTTP_CACHE_CONTROL: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['HTTP_CACHE_CONTROL']) ? $_SERVER['HTTP_CACHE_CONTROL'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>HTTP_ACCEPT_LANGUAGE: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>HTTP_HOST: </font>
						</td>
						<td><?php echo isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''; ?></td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>HTTP_CONNECTION: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['HTTP_CONNECTION']) ? $_SERVER['HTTP_CONNECTION'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>Browser Used: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>REMOTE_PORT: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['REMOTE_PORT']) ? $_SERVER['REMOTE_PORT'] : ''; ?>'</font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>REQUEST_METHOD: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>REQUEST_URL:</font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['REQUEST_URL']) ? $_SERVER['REQUEST_URL'] : ''; ?></font>
						</td>
					</tr>
					<tr>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1>Time of error: </font>
						</td>
						<td>
							<font face=Verdana, Arial, Helvetica, sans-serif size=1><?php echo isset($_SERVER['REQUEST_TIME']) ? date('d-M-Y h:i:s', $_SERVER['REQUEST_TIME']) : ''; ?></font>
						</td>
					</tr>
				</table>

			</td>
		</tr>
		<tr>
			<td colspan="2"></td>
		</tr>
	</table>
	<br />
	<?php echo json_encode($_SERVER); ?>
	<br />
<?php
	$content	=	ob_get_contents();
	ob_end_clean();
	return $content;
}

function phpmailer_sendmail($emailData = array())
{
	echo '<pre>';
	print_r($emailData);
	exit;
	ini_set("max_execution_time", '300');
	set_time_limit(0);

	include_once(APPPATH . "/third_party/PHPMailer/PHPMailerAutoload.php");

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->Host 			= $emailData['mail_smtp_host'];
	$mail->Username			= $emailData['mail_smtp_user'];
	$mail->Password 		= $emailData['mail_smtp_pass'];
	$mail->SMTPAuth 		= true;
	$mail->SMTPAutoTLS 		= false;
	//$mail->SMTPKeepAlive 	= true; // SMTP connection will not close after each email sent, reduces SMTP overhead
	$mail->SMTPSecure 		= "tls";
	$mail->Port			    = '25';
	//$mail->Debugoutput 	= 'html';

	$mail->setFrom($emailData['from_email'], $emailData['from_name']);

	//$mail->SMTPDebug = 3;
	$mail->WordWrap = 78;
	if (isset($emailData['reply_to']) && !empty($emailData['reply_to'])) {
		$mail->addReplyTo($emailData['reply_to'], $emailData['reply_name']);
	}

	$mail->addAddress($emailData['to']);
	if (isset($emailData['cc']) && !empty($emailData['cc'])) {
		$mail->addCC($emailData['cc']);
	}

	if (isset($emailData['bcc']) && !empty($emailData['bcc'])) {
		$mail->addBCC($emailData['bcc']);
	}

	$mail->Subject				= $emailData['subject'];
	$mail->msgHTML($emailData['message']);
	$mail->send();

	/*if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}*/
}

if (!function_exists('convert_to_url_slug')) {
	function convert_to_url_slug($string = '')
	{
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $string);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
		return $clean;
	}
}

if (!function_exists('get_sub_string')) {
	function get_sub_string($string = '', $length = '20')
	{
		$out =  $string;
		if (strlen($string) > $length) {
			$out =  substr(strip_tags($string), 0, $length) . "...";
			if ($ismodal) {
				$out =  substr(strip_tags($string), 0, $length) . ' <a href="javascript:void(0);" onclick="readFullDesc()">...Read more</a>';
			}
		}
	}
}


if (!function_exists('generateRandomString')) {
	function generateRandomString($length = 6)
	{
		$characters = '0123456789a*&$@bcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

function getDaysDiff($sd = '', $ed = '')
{
	$now = strtotime($sd); // or your date as well
	$your_date = strtotime($ed);
	$datediff = $your_date - $now;
	return floor($datediff / (60 * 60 * 24));
}

function getMinDiff($sd = '', $ed = '')
{
	$now = strtotime($sd); // or your date as well
	$your_date = strtotime($ed);
	$datediff = $your_date - $now;
	return floor($datediff / (60));
}

function weeks_in_month($year, $month, $start_day_of_week = 1)
{
	// Total number of days in the given month.
	$num_of_days = date("t", mktime(0, 0, 0, $month, 1, $year));

	// Count the number of times it hits $start_day_of_week.
	$num_of_weeks = 0;
	$weekNumbers = array();
	for ($i = 1; $i <= $num_of_days; $i++) {
		$day_of_week = date('w', mktime(0, 0, 0, $month, $i, $year));
		if ($day_of_week == $start_day_of_week) {
			$num_of_weeks++;
		}

		$week_number = (int)date('W', mktime(0, 0, 0, $month, $i, $year));
		//if($num_of_weeks > 0)
		{
			if (array_key_exists($num_of_weeks, $weekNumbers) && in_array($week_number, $weekNumbers)) {
				$weekNumbers[$num_of_weeks] = $week_number + 1;
			} //
			else {
				$weekNumbers[$num_of_weeks] = $week_number;
			}
		}
	}

	return $weekNumbers;
}

function createDateRangeArray($strDateFrom, $strDateTo)
{
	$aDays				= array();

	$sStartDate = substr($strDateFrom, 6, 4) . '-' . substr($strDateFrom, 3, 2) . '-' . substr($strDateFrom, 0, 2);
	$sEndDate 	= substr($strDateTo, 6, 4) . '-' . substr($strDateTo, 3, 2) . '-' . substr($strDateTo, 0, 2);

	// Start the variable off with the start date
	$aDays[] = $sStartDate;

	// Set a 'temp' variable, sCurrentDate, with
	// the start date - before beginning the loop
	$sCurrentDate = $sStartDate;

	// While the current date is less than the end date
	while ($sCurrentDate < $sEndDate) {
		// Add a day to the current date
		$sCurrentDate = date("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));

		// Add this new day to the aDays array
		$aDays[] = $sCurrentDate;
	}

	// Once the loop has finished, return the
	// array of days.
	return $aDays;
}

function getNoOfDaysInMonth($year = 2016, $month = 1)
{
	return date('t', mktime(0, 0, 0, $month, 1, $year));
}

function getMonthNames($index = '')
{
	$arrMonths = array(
		'1' =>  'January',
		'2'  =>  'February',
		'3'  =>  'March',
		'4'  =>  'April',
		'5'  =>  'May',
		'6'  =>  'June',
		'7'  =>  'July',
		'8'  =>  'August',
		'9'  =>  'September',
		'10' =>  'October',
		'11' =>  'November',
		'12' =>  'December'
	);

	if ($index) {
		return $arrMonths[$index];
	}

	return $arrMonths;
}

function countRangeArray()
{
	$arrRange = array(
		'0~0' =>  '0',
		'1~1'  =>  '1',
		'2~3'  =>  '2 - 3',
		'4~6'  =>  '4 - 6',
		'7~10'  =>  '7 - 10',
		'10+'  =>  '10+'
	);

	return $arrRange;
}

function searchCondition()
{
	$arrRange = array(
		'=' 		=>  'equal to',
		'<'  		=>  'less then',
		'>'  		=>  'greater then',
		'<='  		=>  'less then equal to',
		'>='  		=>  'greater then equal to',
		'between'   =>  'between',
	);

	return $arrRange;
}

function getClientIP()
{
	if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
		return  $_SERVER["HTTP_X_FORWARDED_FOR"];
	} else if (array_key_exists('REMOTE_ADDR', $_SERVER)) {
		return $_SERVER["REMOTE_ADDR"];
	} else if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
		return $_SERVER["HTTP_CLIENT_IP"];
	}
	return '';
}

if (!function_exists('force_ssl')) {
	function force_ssl()
	{
		if ($_SERVER['HTTPS'] != "on") {
			$redirect = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			header("Location:$redirect");
		}
	}
}

function remove_ssl()
{
	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) {
		$redirect = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location:$redirect");
	}
}


function get_pagination($numRows = 0, $per_page = 15, $url = "admin/admin/")
{
	$CI = &get_instance();
	$CI->load->library("pagination");

	$config['total_rows'] 		= $numRows;
	$config['per_page']			= $per_page;
	$config['next_link'] 		= '<span aria-hidden="true">»</span><span class="sr-only">Next</span>';
	$config['prev_link'] 		= '<span aria-hidden="true">«</span><span class="sr-only">Prev</span>';
	$config['uri_segment'] 		= 4;
	$config['base_url']			= base_url() . $url;
	if (isset($_GET)) {
		$config['first_url'] 		= $config['base_url'] . '/1' . '?' . http_build_query($_GET, '', "&");
	}
	$config['attributes'] = array('class' => 'page-link');
	$config['full_tag_open'] = '<ul class="pagination justify-content-center m-0 float-right" >';
	$config['num_tag_open'] = '<li class="page-item">';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = "<li class='page-item active'><a href='javascript:void(0);' class='page-link' >";
	$config['cur_tag_close'] = "</a></li>";
	$config['next_tag_open'] = '<li class="page-item">';
	$config['next_tagl_close'] = '</li>';
	$config['prev_tag_open'] = '<li class="page-item">';
	$config['prev_tagl_close'] = '</li>';
	$config['first_tag_open'] = '<li class="page-item">';
	$config['first_tagl_close'] = '</li>';
	$config['last_tag_open'] = '<li class="page-item">';
	$config['last_tagl_close'] = '</li>';
	$config['full_tag_close'] = '</ul>';


	if (isset($_GET)) {
		$config['suffix'] 			= '?' . http_build_query($_GET, '', "&");
	}

	$config['use_page_numbers'] = TRUE;
	$CI->pagination->initialize($config);


	$data['paginglinks'] 		= $CI->pagination->create_links();
	// Showing total rows count 
	$data['pagermessage'] = 'Showing ' . $numRows . ' of ' . $numRows;
	if ($data['paginglinks'] != '') {
		$data['pagermessage'] = 'Showing ' . ((($CI->pagination->cur_page - 1) * $CI->pagination->per_page) + 1) . ' to ' . (($numRows > $CI->pagination->cur_page * $CI->pagination->per_page) ? $CI->pagination->cur_page * $CI->pagination->per_page : $numRows) . ' of ' . $numRows;
	}
	return $data;
}
