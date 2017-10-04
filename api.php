<?php
 
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
 
// connect to the mysql database
 
// retrieve the typename and key from the path
$typename = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));

$types = array("getkeytoken", "getmytestplans", "gettestresults", "updatetestresult","updatetestresults","getmyteststepresults","updateteststepresult","updateteststepresults");
if (!in_array($typename, $types))
{
	echo "Invalid types!";die(0);
}

$key = array_shift($request)+0;
 
// escape the columns and values from the input object
$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
 
// build the SET part
$set = '';
for ($i=0;$i<count($columns);$i++) {
  $set.=($i>0?',':'').'`'.$columns[$i].'`=';
}
 
// create string on HTTP method
switch ($method) {
  case 'GET':
    $str = "type: $typename, id: $key;"; break;
  case 'POST':
    $str = "type: $typename, set: $set;"; break;
}
echo $method.'<br>'.$str;