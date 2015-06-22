<?php

function getCIObject()
{
	$CI =& get_instance();
	return $CI;
}

function doneCreate($group_id)
{
	getCIObject->load->model('user_right_model');
	
}