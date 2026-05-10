<?php 
include 'includes/header.php';

$property_no = $_POST['property_no'] ?? 'not_set';
$type_vehicle = $_POST['type_vehicle'] ?? 'not_set';
$make_vehicle = $_POST['make_vehicle'] ?? 'not_set';
$cs_plate_no = $_POST['cs_plate_no'] ?? 'not_set';
$engine_no = $_POST['engine_no'] ?? 'not_set';
$chassis_no = $_POST['chassis_no'] ?? 'not_set';
$aquisition_date = $_POST['aquisition_date'] ?? 'not_set';
$aquisition_cost = $_POST['aquisition_cost'] ?? 'not_set';
$office_department = $_POST['office_department'] ?? 'not_set';
$mr_are_par = $_POST['mr_are_par'] ?? 'not_set';
$accountable_person = $_POST['accountable_person'] ?? 'not_set';
$status_condition = $_POST['status_condition'] ?? 'not_set';
$insurance_date_expire = $_POST['insurance_date_expire'] ?? 'not_set';
$registration_date_expire = $_POST['registration_date_expire'] ?? 'not_set';
$ref = $_POST['ref'];

$updatedetails = $pdo->query("UPDATE vehicle_tracking SET
	vec_property_number = '$property_no',
	vec_type = '$type_vehicle',
	vec_make = '$make_vehicle',
	vec_cs_plate_number = '$cs_plate_no',
	vec_engine_number = '$engine_no',
	vec_chasis_number = '$chassis_no',
	vec_aquisition_date = '$aquisition_date',
	vec_aquisition_cost = '$aquisition_cost',
	vec_department = '$office_department',
	vec_mr_are_par = '$mr_are_par',
	vec_accountable = '$accountable_person',
	vec_status_condition = '$status_condition',
	vec_insurance_date_expire = '$insurance_date_expire',
	vec_registration_date_expire = '$registration_date_expire'
	WHERE vec_id= '$ref'
	");
?>

<script>
	let timerInterval
	Swal.fire({
		icon: 'success',
		title: 'Updated Successfuly',
		timer: 2500,
		timerProgressBar: true,
		willClose: () => {
			clearInterval(timerInterval)
		}
	}).then((result) => {
/* Read more about handling dismissals below */
		window.location.href="dashboard.php";
	})
</script>


<?php

include 'includes/footer.php';
?>