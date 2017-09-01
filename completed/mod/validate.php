<?php
if (!empty($_POST)) {
	
	require_once('../classes/Helper.php');
	
	$errors = array();
	$expected = array(
		'first_name',
		'email',
		'password',
		'age',
		'gender',
		'terms'
	);
	$required = array(
		'first_name' => 'Please provide your first name',
		'email' => 'Please provide your valid email address',
		'password' => 'Please choose your password (min 6 characters)',
		'age' => 'Please select your age',
		'gender' => 'Please select your gender',
		'terms' => 'Please indicate that you agree with our terms and conditions'
	);
	$out = array();
	
	foreach($_POST as $key => $value) {
		if (in_array($key, $expected)) {
			switch($key) {
				case 'email':
				if (!Helper::isEmail($value)) {
					$errors[$key] = $required[$key];
				}
				break;
				case 'password':
				if (strlen($value) < 6) {
					$errors[$key] = $required[$key];
				}
				break;
				default:
				if (Helper::isEmpty($value) && array_key_exists($key, $required)) {
					$errors[$key] = $required[$key];
				}
			}
			$out[$key] = $value;
		}
	}
	
	
	foreach($required as $key => $value) {
		if (!array_key_exists($key, $out)) {
			echo json_encode(array(
				'error' => true,
				'validation' => array(
					'first_name' => 'There are missing fields'
				)
			));
			exit;
		}
	}
	
	
	if (empty($errors)) {
		
		$message  = '<h1>Thank you</h1>';
		$message .= '<p>Your input has been validated successfully.</p>';
		
		$message .= '<p>';
		foreach($out as $key => $value) {
			$message .= $key.' => '.$value.'<br />';
		}
		$message .= '</p>';
		
		echo json_encode(array('error' => false, 'message' => $message));
		
	} else {
		echo json_encode(array('error' => true, 'validation' => $errors));
	}
	
	
} else {
	echo json_encode(array('error' => true));
}









