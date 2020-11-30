<?php

function switch_date($date){
	if(strpos($date, '-') !== FALSE){
            $date_array = explode('-', $date);
            $char = '/';

	}else{
            $date_array = explode('/', $date);
            $char = '-';

	}
        return $date_array[2].$char.$date_array[1].$char.$date_array[0];
}
