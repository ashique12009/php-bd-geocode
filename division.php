<?php 
require_once 'db-config.php';

$conn = getDbConnection();

$query = "TRUNCATE table divisions";
mysqli_multi_query($conn, $query);
// $query = "TRUNCATE table districts";
// mysqli_multi_query($conn, $query);
// $query = "TRUNCATE table upazilas";
// mysqli_multi_query($conn, $query);
// $query = "TRUNCATE table unions";
// mysqli_multi_query($conn, $query);

$divisions = array(
    array("id"=>"1","name"=>"Barisal","bn_name"=>"বরিশাল","lon"=>"90.3471939","lat"=>"22.4191472","coordinate"=>"22.41914717, 90.3471939","code"=>"BD10"),
    array("id"=>"2","name"=>"Chittagong","bn_name"=>"চট্টগ্রাম","lon"=>"91.7317686","lat"=>"22.7096577","coordinate"=>"22.70965765, 91.73176862","code"=>"BD20"),
    array("id"=>"3","name"=>"Dhaka","bn_name"=>"ঢাকা","lon"=>"90.2416568","lat"=>"23.8397120","coordinate"=>"23.83971202, 90.24165684","code"=>"BD30"),
    array("id"=>"4","name"=>"Khulna","bn_name"=>"খুলনা","lon"=>"89.2925200","lat"=>"22.9177548","coordinate"=>"22.91775476, 89.29252","code"=>"BD40"),
    array("id"=>"5","name"=>"Mymensingh","bn_name"=>"ময়মনসিংহ","lon"=>"90.3804598","lat"=>"24.8467667","coordinate"=>"24.84676672, 90.3804598","code"=>"BD45"),
    array("id"=>"6","name"=>"Rajshahi","bn_name"=>"রাজশাহী","lon"=>"89.0445700","lat"=>"24.5887490","coordinate"=>"24.58874896, 89.04457004","code"=>"BD50"),
    array("id"=>"7","name"=>"Rangpur","bn_name"=>"রংপুর","lon"=>"89.0558362","lat"=>"25.7794052","coordinate"=>"25.77940519, 89.05583622","code"=>"BD55"),
    array("id"=>"8","name"=>"Sylhet","bn_name"=>"সিলেট","lon"=>"91.6640655","lat"=>"24.7154555","coordinate"=>"24.71545553, 91.66406549","code"=>"BD60"),
);

$sql = "";

foreach ($divisions as $division) {
    $division_id            = $conn->real_escape_string($division['id']);
    $division_name          = $conn->real_escape_string($division['name']);
    $division_bn_name       = $conn->real_escape_string($division['bn_name']);
    $division_lon           = $conn->real_escape_string($division['lon']);
    $division_lat           = $conn->real_escape_string($division['lat']);
    $division_coordinate    = $conn->real_escape_string($division['coordinate']);
    $division_code          = $conn->real_escape_string($division['code']);

    $sql .= "INSERT INTO divisions (id, name, bn_name, lon, lat, coordinate, code)
    VALUES ($division_id, '$division_name', '$division_bn_name', $division_lon, $division_lat, '$division_coordinate', '$division_code');";
}

if ($conn->multi_query($sql) === TRUE) {
    echo 'Divisions Done!';
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}