<?php
$con=mysqli_connect('localhost','root','','db_ex');
$command =isset($_POST['get'])  ? $_POST['get'] : "";

 switch($command){
case "state":
$result2 ="<option>Select State</option>";
$country=$_REQUEST['countryId'];
$query = "SELECT state_id,state_name FROM states WHERE country_id='$country'";
$data=mysqli_query($con, $query);
while($result1=mysqli_fetch_array($data))
{
	 $result2 .= "<option value=".$result1['state_id'].">" .$result1['state_name']. "</option>";
}
echo $result2;
break;

case "city":
$result4 ="<option>Select State</option>";
$state=$_REQUEST['stateId'];
$query1 = "SELECT city_id,city_name FROM cities WHERE state_id='$state'";
$data1=mysqli_query($con, $query1);
while($result3=mysqli_fetch_array($data1))
{
	 $result4 .= "<option value=".$result3['city_id'].">" .$result3['city_name']. "</option>";
}
echo $result4;

break;
 }
exit();

?>