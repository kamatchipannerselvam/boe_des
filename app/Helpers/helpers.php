<?php
use App\Models\Inbstock;

function getinbavailableQty($inbstockid){
    
}

function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
   
function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}
function objectToArray ($object) {
    if(!is_object($object) && !is_array($object)){
    	return $object;
    }
    return array_map('objectToArray', (array) $object);
}