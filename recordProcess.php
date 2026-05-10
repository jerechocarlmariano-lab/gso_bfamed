<?php 
include 'includes/header.php';
try{
	$result ="";
	$bfaarp_pin = $_POST['arp_pin'];
	$bfapin = $_POST['pin'];
	$bfataxdec = $_POST['taxdec'];
	$bfaowner = $_POST['owner'];
	$bfabeneficiary = $_POST['beneficiary'];
	$bfakind = $_POST['kind'];
	$bfaclass = $_POST['class'];
	$bfalocation = $_POST['location'];
	$bfabrgy = $_POST['brgy'];
	$bfadistrict = $_POST['district'];
	$bfalot_block = $_POST['lot_block'];
	$bfatitle_no = $_POST['title_no'];
	$bfatitle_date = $_POST['title_date'];
	$bfabuiding_type = $_POST['buiding_type'];
	$bfabuilding_comp = $_POST['building_comp'];
	$bfabuilding_occu = $_POST['building_occu'];
	$bfabuilding_age = $_POST['building_age'];
	$bfaarea_sqm = $_POST['area_sqm'];
	$bfamarket_value = $_POST['market_value'];
	$bfaassessed_value = $_POST['assessed_value'];
	$bfaportfolio = $_POST['portfolio'];
	$bfaaccount_type = $_POST['account_type'];
	$bfatax_status = $_POST['tax_status'];
	$bfaexpiration_date = $_POST['expiration_date'];

	for ($i=0; $i < count($_FILES['files']['tmp_name']) ; $i++) { 
		$filename = $_FILES['files']['name'];
		$filenames = join(',',$filename);
	}

	$addVehicleRecord = $pdo->query("INSERT INTO bfamed_tracking(
		bfa_arp_pin
		, bfa_pin
		, bfa_taxdec
		, bfa_owner
		, bfa_beneficiary
		, bfa_kind
		, bfa_class
		, bfa_location
		, bfa_brgy
		, bfa_district
		, bfa_lot_block
		, bfa_title_no
		, bfa_title_date
		, bfa_buiding_type
		, bfa_building_comp
		, bfa_building_occu
		, bfa_building_age
		, bfa_area_sqm
		, bfa_market_value
		, bfa_assessed_value
		, bfa_portfolio
		, bfa_account_type
		, bfa_tax_status
		, bfa_date_expire
		, bfa_file

		) VALUES(
		'$bfaarp_pin',
		'$bfapin',
		'$bfataxdec',
		'$bfaowner',
		'$bfabeneficiary',
		'$bfakind',
		'$bfaclass',
		'$bfalocation',
		'$bfabrgy',
		'$bfadistrict',
		'$bfalot_block',
		'$bfatitle_no',
		'$bfatitle_date',
		'$bfabuiding_type',
		'$bfabuilding_comp',
		'$bfabuilding_occu',
		'$bfabuilding_age',
		'$bfaarea_sqm',
		'$bfamarket_value',
		'$bfaassessed_value',
		'$bfaportfolio',
		'$bfaaccount_type',
		'$bfatax_status',
		'$bfaexpiration_date',
		'$filenames'
	)");

	for ($i=0; $i < count($_FILES['files']['tmp_name']) ; $i++) { 
		$filename = $_FILES['files']['name'][$i];
		$attachmentfilenameTmp = $_FILES['files']['tmp_name'][$i];
		move_uploaded_file($attachmentfilenameTmp, "attachments/$filename");
	}
	?>

	<script>
		let timerInterval
		Swal.fire({
			icon: 'success',
			title: 'New Tracking Created Successful',
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

}catch(PDOException $e ){
	$result = array('message' => $e);
}
?>