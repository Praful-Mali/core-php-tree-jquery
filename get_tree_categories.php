<?php

include "./dao.php";
include "./model.php";

$d=new Dao();
$m= new Model();

$result=$d->select("category","");

while($row = mysqli_fetch_array($result))
{
 $sub_data["id"] = $row["category_id"];
 $sub_data["name"] = $row["category_name"];
 $sub_data["text"] = $row["category_name"];
 $sub_data["parent_id"] = $row["category_parent_id"];
 $sub_data["root"] = $row["category_parent_id"];
 $data[] = $sub_data;
}


foreach($data as $key => &$value)
{
 $output[$value["id"]] = &$value;
}
foreach($data as $key => &$value)
{
 if($value["parent_id"] && isset($output[$value["parent_id"]]))
 {
  $output[$value["parent_id"]]["nodes"][] = &$value;
 }
}
foreach($data as $key => &$value)
{
 if($value["parent_id"] && isset($output[$value["parent_id"]]))
 {
  unset($data[$key]);
 }
}


/*
echo '<pre>';
print_r($data);
echo '</pre>';
exit;*/
echo json_encode($data);




?>