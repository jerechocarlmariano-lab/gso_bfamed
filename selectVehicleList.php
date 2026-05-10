<?php 
include 'includes/boot.php';
$dataTableResponse = array();

if(isset($_POST)) {
	$jsonRequestBody = json_decode(file_get_contents('php://input'), true);
	
	$dataTableRequest = array(
		'columns'			=> $jsonRequestBody['columns']
		, 'draw'			=> $jsonRequestBody['draw']
		, 'length'			=> $jsonRequestBody['length']
		, 'order'			=> $jsonRequestBody['order']
		, 'start'			=> $jsonRequestBody['start']
		, 'search'			=> $jsonRequestBody['search']['value']
	);
	
	$registrantListArr = array();
	$registrantList = $pdo->prepare("SELECT * FROM bfamed_tracking WHERE 
		bfa_arp_pin LIKE CONCAT('%', :searching, '%') OR
		 bfa_pin LIKE CONCAT('%', :searching, '%') OR
		 bfa_taxdec LIKE CONCAT('%', :searching, '%') OR
		 bfa_owner LIKE CONCAT('%', :searching, '%') OR
		 bfa_beneficiary LIKE CONCAT('%', :searching, '%') OR
		 bfa_kind LIKE CONCAT('%', :searching, '%') OR
		 bfa_class LIKE CONCAT('%', :searching, '%') OR
		 bfa_location LIKE CONCAT('%', :searching, '%') OR
		 bfa_brgy LIKE CONCAT('%', :searching, '%') OR
		 bfa_district LIKE CONCAT('%', :searching, '%') OR
		 bfa_lot_block LIKE CONCAT('%', :searching, '%') OR
		 bfa_title_no LIKE CONCAT('%', :searching, '%') OR
		 bfa_title_date LIKE CONCAT('%', :searching, '%') OR
		 bfa_buiding_type LIKE CONCAT('%', :searching, '%') OR
		 bfa_building_comp LIKE CONCAT('%', :searching, '%') OR
		 bfa_building_occu LIKE CONCAT('%', :searching, '%') OR
		 bfa_building_age LIKE CONCAT('%', :searching, '%') OR
		 bfa_area_sqm LIKE CONCAT('%', :searching, '%') OR
		 bfa_market_value LIKE CONCAT('%', :searching, '%') OR
		 bfa_assessed_value LIKE CONCAT('%', :searching, '%') OR
		 bfa_portfolio LIKE CONCAT('%', :searching, '%') OR
		 bfa_account_type LIKE CONCAT('%', :searching, '%') OR
		 bfa_tax_status LIKE CONCAT('%', :searching, '%') OR
		 bfa_date_expire LIKE CONCAT('%', :searching, '%') OR
		 bfa_file LIKE CONCAT('%', :searching, '%')
		ORDER BY bfa_id DESC LIMIT :limits OFFSET :offsets");
	$registrantList->bindParam(':searching', $dataTableRequest['search'], PDO::PARAM_STR);
	$registrantList->bindValue(':limits', $dataTableRequest['length'], PDO::PARAM_INT);
	$registrantList->bindValue(':offsets', $dataTableRequest['start'], PDO::PARAM_INT);
	$registrantList->execute();
	$res = $registrantList->fetchAll(PDO::FETCH_ASSOC);

	$registrantCount = $pdo->query("SELECT COUNT(*) FROM bfamed_tracking ");
	$rescount = $registrantCount->fetchColumn();
	$resltsArr = array();

	$dateTodate = date('y-m-d');
	for ($i = 0; $i < count($res); $i++){
		$expDateReg = $res[$i]['bfa_date_expire'];
		$alertExpireReg = (strtotime($expDateReg) - strtotime($dateTodate)) / 86400 ;
		$resltsArr[] = array(
			"arp_pin" => $res[$i]['bfa_arp_pin'],
			"pin" => $res[$i]['bfa_pin'],
			"taxdec" => $res[$i]['bfa_taxdec'],
			"owner" => $res[$i]['bfa_owner'],
			"beneficiary" => $res[$i]['bfa_beneficiary'],
			"kind" => $res[$i]['bfa_kind'],
			"class" => $res[$i]['bfa_class'],
			"location" => $res[$i]['bfa_location'],
			"brgy" => $res[$i]['bfa_brgy'],
			"district" => $res[$i]['bfa_district'],
			"lot_block" => $res[$i]['bfa_lot_block'],
			"title_no" => $res[$i]['bfa_title_no'],
			"title_date" => $res[$i]['bfa_title_date'],
			"buiding_type" => $res[$i]['bfa_buiding_type'],
			"building_comp" => $res[$i]['bfa_building_comp'],
			"building_occu" => $res[$i]['bfa_building_occu'],
			"building_age" => $res[$i]['bfa_building_age'],
			"area_sqm" => $res[$i]['bfa_area_sqm'],
			"market_value" => $res[$i]['bfa_market_value'],
			"assessed_value" => $res[$i]['bfa_assessed_value'],
			"portfolio" => $res[$i]['bfa_portfolio'],
			"account_type" => $res[$i]['bfa_account_type'],
			"tax_status" => $res[$i]['bfa_tax_status'],
			"file" => $res[$i]['bfa_file'],
			"expire_count" => $alertExpireReg,
			"expiration_date" => date('F d, Y',strtotime($expDateReg))
		);
	}
	$dataTableResponse['draw'] = $dataTableRequest['draw'];
	$dataTableResponse['recordsTotal'] = $rescount;
	$dataTableResponse['recordsFiltered'] = $rescount;
	$dataTableResponse['data'] = $resltsArr;

	$dataTableResponse['error'] = null;
}

header('Content-Type: application/json');
echo json_encode($dataTableResponse);


?>