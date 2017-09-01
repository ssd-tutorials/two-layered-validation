<?php
class Helper {



	public static function isEmail($email = null) {
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		return !empty($email) ? true : false;
	}
	
	
	
	
	
	
	
	
	
	public static function isEmpty($value = null) {
		return empty($value) && !is_numeric($value) ? true : false;
	}








}