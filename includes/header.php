<?php 
include 'boot.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>GSO BFAMED Tracking</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo Dir::baseNav('/bootstrap-5.3/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo Dir::baseNav('/resources/fontawesome/css/all.css') ?>">
	<script src="<?php echo Dir::baseNav('/bootstrap-5.3/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?php echo Dir::baseNav('/js/jquery-3.6.0.min.js') ?>"></script>
	<script src="<?php echo Dir::baseNav('/js/sweetalert2@11.js') ?>"></script>
	<link rel="stylesheet" href="<?php echo Dir::baseNav('/js/select2.min.css') ?>">
	<link rel="stylesheet" href="<?php echo Dir::baseNav('/js/custom.css') ?>">
	<script src="<?php echo Dir::baseNav('/js/select2.min.js') ?>"></script>
	<link rel="stylesheet" href="<?php echo Dir::baseNav('/js/dataTables2.0.8.css') ?>">
	<script src="<?php echo Dir::baseNav('/js/dataTables2.0.8.js') ?>"></script>
	<style>
		/* ===== DESIGN TOKENS ===== */
		:root {
			--navy:       #0d1b3e;
			--navy-mid:   #132654;
			--royal:      #1a47a0;
			--blue:       #2563eb;
			--blue-light: #3b82f6;
			--sky:        #60a5fa;
			--sky-pale:   #eff6ff;
			--white:      #ffffff;
			--gray-50:    #f8fafc;
			--gray-100:   #f1f5f9;
			--gray-200:   #e2e8f0;
			--gray-400:   #94a3b8;
			--gray-600:   #475569;
			--gray-800:   #1e293b;
			--danger:     #ef4444;
			--warning:    #f59e0b;
			--success:    #10b981;

			--radius-sm:  6px;
			--radius-md:  12px;
			--radius-lg:  20px;
			--radius-xl:  28px;

			--shadow-sm:  0 1px 3px rgba(13,27,62,.08), 0 1px 2px rgba(13,27,62,.06);
			--shadow-md:  0 4px 16px rgba(13,27,62,.12);
			--shadow-lg:  0 12px 40px rgba(13,27,62,.18);

			--font-main: 'Plus Jakarta Sans', system-ui, sans-serif;
			--font-mono: 'DM Mono', monospace;
		}

		/* ===== RESET / BASE ===== */
		*, *::before, *::after { box-sizing: border-box; }

		body {
			font-family: var(--font-main);
			background: var(--gray-50);
			color: var(--gray-800);
			min-height: 100vh;
			margin: 0;
		}

		/* ===== LOGIN PAGE ===== */
		body.page-login {
			background: linear-gradient(140deg, var(--navy) 0%, var(--royal) 55%, var(--blue-light) 100%);
			display: flex;
			align-items: center;
			justify-content: center;
		}

		body.page-login::before {
			content: '';
			position: fixed;
			inset: 0;
			background:
				radial-gradient(ellipse 80% 60% at 20% 80%, rgba(37,99,235,.35) 0%, transparent 60%),
				radial-gradient(ellipse 60% 40% at 80% 20%, rgba(96,165,250,.25) 0%, transparent 55%);
			pointer-events: none;
		}

		#login {
			background: var(--white);
			border: 1px solid var(--gray-200);
			border-radius: var(--radius-xl);
			padding: 48px 44px;
			width: 100%;
			max-width: 460px;
			box-shadow: 0 8px 40px rgba(13,27,62,.10), 0 2px 8px rgba(13,27,62,.06);
			animation: fadeUp .6s cubic-bezier(.16,1,.3,1) both;
		}

		#login .login-logo-wrap {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-bottom: 36px;
			gap: 14px;
		}

		/* Blue accent bar at top of card */
		#login .login-logo-wrap::before {
			content: '';
			display: block;
			width: 56px;
			height: 4px;
			border-radius: 4px;
			background: linear-gradient(90deg, var(--blue) 0%, var(--sky) 100%);
			margin-bottom: 10px;
		}

		#login .login-logo-wrap img {
			width: 72px;
			height: 72px;
			filter: drop-shadow(0 3px 8px rgba(0,0,0,.15));
		}

		#login .login-title {
			font-size: 22px;
			font-weight: 800;
			letter-spacing: .5px;
			color: var(--navy);
			text-align: center;
			line-height: 1.2;
		}

		#login .login-sub {
			font-size: 13px;
			color: var(--gray-400);
			text-align: center;
			margin-top: 4px;
		}

		#login .form-label-glass {
			font-size: 11.5px;
			font-weight: 700;
			letter-spacing: .8px;
			text-transform: uppercase;
			color: var(--gray-600);
			margin-bottom: 8px;
			display: block;
		}

		#login .form-control {
			background: var(--gray-50);
			border: 1.5px solid var(--gray-200);
			border-radius: var(--radius-md);
			color: var(--gray-800);
			padding: 13px 16px;
			font-size: 15px;
			font-family: var(--font-main);
			transition: border-color .25s, background .25s, box-shadow .25s;
		}

		#login .form-control::placeholder { color: var(--gray-400); }
		#login .form-control:focus {
			background: var(--white);
			border-color: var(--blue);
			box-shadow: 0 0 0 3px rgba(37,99,235,.12);
			color: var(--gray-800);
			outline: none;
		}

		#login .form-control.is-invalid {
			border-color: #f87171;
			box-shadow: 0 0 0 3px rgba(248,113,113,.12);
		}

		#login .form-check-input {
			border-color: var(--gray-200);
		}

		#login .form-check-label {
			color: var(--gray-600);
			font-size: 13px;
		}

		#login .btn-login {
			width: 100%;
			background: linear-gradient(135deg, var(--navy) 0%, var(--blue) 100%);
			border: none;
			border-radius: var(--radius-md);
			color: var(--white);
			font-size: 15px;
			font-weight: 700;
			padding: 14px;
			letter-spacing: .4px;
			cursor: pointer;
			transition: transform .2s, box-shadow .2s;
			box-shadow: 0 4px 20px rgba(37,99,235,.35);
			font-family: var(--font-main);
		}

		#login .btn-login:hover {
			transform: translateY(-2px);
			box-shadow: 0 8px 28px rgba(37,99,235,.45);
		}

		#login .invalid-feedback {
			color: #dc2626;
			font-size: 12.5px;
			margin-top: 6px;
		}

		/* ===== TOP NAV BAR ===== */
		.app-navbar {
			background: linear-gradient(90deg, var(--navy) 0%, var(--navy-mid) 50%, var(--royal) 100%);
			padding: 0 28px;
			height: 68px;
			display: flex;
			align-items: center;
			gap: 16px;
			box-shadow: 0 2px 20px rgba(13,27,62,.3);
			position: sticky;
			top: 0;
			z-index: 1030;
		}

		.app-navbar .brand {
			display: flex;
			align-items: center;
			gap: 14px;
			text-decoration: none;
			flex: 1;
		}

		.app-navbar .brand-logo {
			width: 44px;
			height: 44px;
			object-fit: contain;
			filter: drop-shadow(0 2px 6px rgba(0,0,0,.5));
		}

		.app-navbar .brand-text {
			display: flex;
			flex-direction: column;
		}

		.app-navbar .brand-name {
			font-size: 16px;
			font-weight: 800;
			color: var(--white);
			letter-spacing: .3px;
			line-height: 1.1;
		}

		.app-navbar .brand-sub {
			font-size: 10.5px;
			font-weight: 500;
			color: rgba(255,255,255,.55);
			letter-spacing: .8px;
			text-transform: uppercase;
		}

		.app-navbar .nav-divider {
			width: 1px;
			height: 32px;
			background: rgba(255,255,255,.15);
		}

		.app-navbar .nav-pill {
			display: flex;
			align-items: center;
			gap: 8px;
			padding: 8px 18px;
			background: rgba(255,255,255,.08);
			border: 1px solid rgba(255,255,255,.14);
			border-radius: 50px;
			color: rgba(255,255,255,.85);
			font-size: 13.5px;
			font-weight: 600;
			text-decoration: none;
			transition: background .2s, border-color .2s, color .2s;
			font-family: var(--font-main);
			cursor: pointer;
		}

		.app-navbar .nav-pill:hover {
			background: rgba(255,255,255,.16);
			border-color: rgba(255,255,255,.3);
			color: var(--white);
		}

		.app-navbar .nav-pill.logout {
			background: rgba(239,68,68,.15);
			border-color: rgba(239,68,68,.3);
			color: #fca5a5;
		}

		.app-navbar .nav-pill.logout:hover {
			background: rgba(239,68,68,.28);
			border-color: rgba(239,68,68,.5);
			color: #fee2e2;
		}

		/* ===== PAGE WRAPPER ===== */
		.app-content {
			padding: 28px;
			max-width: 1600px;
			margin: 0 auto;
		}

		/* ===== PAGE HEADER BAND ===== */
		.page-header-band {
			background: linear-gradient(120deg, var(--navy) 0%, var(--royal) 70%, var(--blue-light) 100%);
			border-radius: var(--radius-lg);
			padding: 28px 32px;
			margin-bottom: 28px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			box-shadow: var(--shadow-md);
			position: relative;
			overflow: hidden;
		}

		.page-header-band::after {
			content: '';
			position: absolute;
			right: -40px;
			top: -40px;
			width: 200px;
			height: 200px;
			background: radial-gradient(circle, rgba(255,255,255,.07) 0%, transparent 70%);
			border-radius: 50%;
			pointer-events: none;
		}

		.page-header-band .ph-title {
			font-size: 22px;
			font-weight: 800;
			color: var(--white);
			margin: 0 0 4px;
		}

		.page-header-band .ph-sub {
			font-size: 13px;
			color: rgba(255,255,255,.6);
			margin: 0;
		}

		/* ===== CARD BASE ===== */
		.app-card {
			background: var(--white);
			border-radius: var(--radius-lg);
			box-shadow: var(--shadow-sm);
			border: 1px solid var(--gray-200);
			overflow: hidden;
		}

		.app-card .card-header-strip {
			padding: 20px 24px 18px;
			border-bottom: 1px solid var(--gray-100);
			display: flex;
			align-items: center;
			gap: 10px;
		}

		.app-card .card-header-strip .strip-dot {
			width: 10px;
			height: 10px;
			border-radius: 50%;
			background: var(--blue);
			box-shadow: 0 0 0 3px rgba(37,99,235,.15);
		}

		.app-card .card-header-strip .strip-title {
			font-size: 15px;
			font-weight: 700;
			color: var(--gray-800);
		}

		/* ===== BUTTONS ===== */
		.btn-primary,
		.btn-gso-primary {
			background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
			border: none;
			border-radius: var(--radius-md);
			color: var(--white);
			font-family: var(--font-main);
			font-size: 14px;
			font-weight: 600;
			padding: 10px 22px;
			cursor: pointer;
			transition: transform .2s, box-shadow .2s;
			box-shadow: 0 4px 14px rgba(37,99,235,.35);
			display: inline-flex;
			align-items: center;
			gap: 8px;
		}

		.btn-primary:hover,
		.btn-gso-primary:hover {
			transform: translateY(-2px);
			box-shadow: 0 8px 22px rgba(37,99,235,.45);
			background: linear-gradient(135deg, #1d4ed8 0%, var(--blue) 100%);
			color: var(--white);
		}

		.btn-success {
			background: linear-gradient(135deg, #059669 0%, #10b981 100%) !important;
			border: none !important;
			border-radius: var(--radius-md) !important;
			font-family: var(--font-main) !important;
			font-weight: 600 !important;
			box-shadow: 0 4px 14px rgba(16,185,129,.3) !important;
			transition: transform .2s, box-shadow .2s !important;
		}

		.btn-success:hover {
			transform: translateY(-2px) !important;
			box-shadow: 0 8px 22px rgba(16,185,129,.4) !important;
		}

		.btn-secondary {
			background: var(--gray-100) !important;
			border: 1px solid var(--gray-200) !important;
			color: var(--gray-600) !important;
			border-radius: var(--radius-md) !important;
			font-family: var(--font-main) !important;
			font-weight: 600 !important;
		}

		/* ===== FORM CONTROLS ===== */
		.form-label,
		.form-label.small {
			font-size: 11.5px;
			font-weight: 700;
			letter-spacing: .7px;
			text-transform: uppercase;
			color: var(--gray-600);
			margin-bottom: 7px;
		}

		.form-control,
		.form-select {
			border: 1.5px solid var(--gray-200);
			border-radius: var(--radius-sm);
			font-family: var(--font-main);
			font-size: 14px;
			color: var(--gray-800);
			padding: 10px 14px;
			transition: border-color .2s, box-shadow .2s;
			background: var(--white);
		}

		.form-control:focus,
		.form-select:focus {
			border-color: var(--blue);
			box-shadow: 0 0 0 3px rgba(37,99,235,.12);
			outline: none;
		}

		/* ===== MODAL ===== */
		.modal-content {
			border: none;
			border-radius: var(--radius-lg);
			box-shadow: var(--shadow-lg);
			overflow: hidden;
		}

		.modal-header {
			background: linear-gradient(135deg, var(--navy) 0%, var(--royal) 100%);
			padding: 20px 28px;
			border: none;
		}

		.modal-title {
			color: var(--white);
			font-weight: 800;
			font-size: 17px;
			font-family: var(--font-main);
		}

		.modal-header .btn-close {
			filter: invert(1) brightness(2);
			opacity: .7;
		}

		.modal-body {
			padding: 28px;
			background: var(--gray-50);
		}

		.modal-footer {
			background: var(--white);
			border-top: 1px solid var(--gray-100);
			padding: 18px 28px;
		}

		/* ===== DATATABLE OVERRIDES ===== */
		.dataTables_wrapper {
			padding: 20px 0 0;
			font-family: var(--font-main);
		}

		.dataTables_wrapper .dataTables_filter input,
		.dataTables_wrapper .dataTables_length select {
			border: 1.5px solid var(--gray-200);
			border-radius: var(--radius-sm);
			padding: 8px 12px;
			font-family: var(--font-main);
			font-size: 13px;
			transition: border-color .2s, box-shadow .2s;
		}

		.dataTables_wrapper .dataTables_filter input:focus,
		.dataTables_wrapper .dataTables_length select:focus {
			border-color: var(--blue);
			box-shadow: 0 0 0 3px rgba(37,99,235,.12);
			outline: none;
		}

		.dataTables_wrapper .dataTables_filter,
		.dataTables_wrapper .dataTables_length,
		.dataTables_wrapper .dataTables_info,
		.dataTables_wrapper .dt-info {
			font-size: 13px;
			color: var(--gray-600);
			padding: 0 24px 12px;
		}

		table.dataTable {
			border-collapse: separate !important;
			border-spacing: 0 !important;
			width: 100% !important;
		}

		table.dataTable thead th {
			background: var(--navy) !important;
			color: rgba(255,255,255,.85) !important;
			font-family: var(--font-main) !important;
			font-size: 11px !important;
			font-weight: 700 !important;
			letter-spacing: .8px !important;
			text-transform: uppercase !important;
			padding: 14px 16px !important;
			border: none !important;
			white-space: nowrap;
		}

		table.dataTable thead th:first-child { border-radius: var(--radius-sm) 0 0 0 !important; }
		table.dataTable thead th:last-child  { border-radius: 0 var(--radius-sm) 0 0 !important; }

		table.dataTable tbody tr {
			transition: background .15s;
		}

		table.dataTable tbody tr td {
			font-size: 13px;
			color: var(--gray-800);
			padding: 12px 16px !important;
			border-bottom: 1px solid var(--gray-100) !important;
			border-left: none !important;
			border-right: none !important;
			border-top: none !important;
			vertical-align: middle;
		}

		table.dataTable tbody tr:hover td {
			background: var(--sky-pale) !important;
		}

		table.dataTable tbody tr.bg-danger td {
			background: #fef2f2 !important;
			border-left: 3px solid var(--danger) !important;
		}

		table.dataTable tbody tr.bg-warning td {
			background: #fffbeb !important;
			border-left: 3px solid var(--warning) !important;
		}

		table.dataTable tbody tr.bg-danger td,
		table.dataTable tbody tr.bg-warning td {
			color: var(--gray-800) !important;
		}

		.dataTables_wrapper .dt-paging .paginate_button {
			border-radius: var(--radius-sm) !important;
			font-family: var(--font-main) !important;
			font-size: 13px !important;
		}

		.dataTables_wrapper .dt-paging .paginate_button.current,
		.dataTables_wrapper .dt-paging .paginate_button.current:hover {
			background: var(--blue) !important;
			border-color: var(--blue) !important;
			color: var(--white) !important;
		}

		.dt-paging, .paging_full_numbers, .dt-input, .dt-search, .dt-info {
			color: var(--gray-600) !important;
		}

		/* ===== EDIT PAGE ===== */
		.edit-form-card {
			background: var(--white);
			border-radius: var(--radius-lg);
			box-shadow: var(--shadow-md);
			border: 1px solid var(--gray-200);
			overflow: hidden;
			max-width: 860px;
			margin: 0 auto;
		}

		.edit-form-card .edit-card-header {
			background: linear-gradient(135deg, var(--navy) 0%, var(--royal) 100%);
			padding: 22px 32px;
		}

		.edit-form-card .edit-card-header h5 {
			color: var(--white);
			font-size: 17px;
			font-weight: 800;
			margin: 0;
			display: flex;
			align-items: center;
			gap: 10px;
		}

		.edit-form-card .edit-card-body {
			padding: 32px;
		}

		.edit-form-card .edit-card-body .row-group {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 20px;
			margin-bottom: 20px;
		}

		.edit-form-card .edit-card-body .form-group {
			display: flex;
			flex-direction: column;
		}

		.edit-form-card .edit-card-footer {
			padding: 18px 32px;
			border-top: 1px solid var(--gray-100);
			background: var(--gray-50);
			display: flex;
			justify-content: flex-end;
		}

		/* ===== ANIMATIONS ===== */
		@keyframes fadeUp {
			from { opacity: 0; transform: translateY(24px); }
			to   { opacity: 1; transform: translateY(0); }
		}

		.animate-in {
			animation: fadeUp .5s cubic-bezier(.16,1,.3,1) both;
		}

		/* ===== RESPONSIVE ===== */
		@media (max-width: 768px) {
			.app-content { padding: 16px; }
			.app-navbar  { padding: 0 16px; height: 60px; }
			.app-navbar .brand-sub { display: none; }
			.edit-form-card .edit-card-body .row-group { grid-template-columns: 1fr; }
			.page-header-band { flex-direction: column; align-items: flex-start; gap: 14px; }
			#login { padding: 32px 24px; }
		}

		@media (max-width: 480px) {
			.app-navbar .brand-name { font-size: 13px; }
		}
	</style>

	<script>
		$(document).ready(function(){
			$('.invalid-feedback').hide();
			$('#passwordCheckbox').click(function(){
				if($('#password').prop('type') == 'password'){
					$('#password').prop('type','text');
				}else{
					$('#password').prop('type','password');
				}
			});

			function makeid(length) {
				let result = '';
				const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				const charactersLength = characters.length;
				let counter = 0;
				while (counter < length) {
					result += characters.charAt(Math.floor(Math.random() * charactersLength));
					counter += 1;
				}
				return result;
			}
			var pass = makeid(8);
			$('#newUserPassword').val(pass);

			$('#newUserRefreshPassword').click(function(){
				var pass = makeid(8);
				$('#newUserPassword').val(pass);
			});

			$('#loginForm').submit(function(e){
				e.preventDefault();
				var row = $(this).closest('#login');
				var u = row.find('#username').val();	
				var p = row.find('#password').val();
				var btn = $('#loginBtn');
				btn.prop('disabled', true).text('Signing in…');

				$.ajax({
					url: "loginprocess.php",
					type: "POST",
					data:{"user" : u, "pass":p}
				}).done(function(data) {
					var result = data.result;
					var role = data.role;
					btn.prop('disabled', false).text('Sign In');

					if(result == 'error'){
						$('#password').addClass('is-invalid');
						$('#username').addClass('is-invalid');
						$('.invalid-feedback').show();
						const Toast = Swal.mixin({ toast:true, position:"top-end", showConfirmButton:false, timer:3000, timerProgressBar:true });
						Toast.fire({ icon:"error", title:"Incorrect username or password" });
					}else if(result == 'account not exist'){
						$('#password').addClass('is-invalid');
						$('#username').addClass('is-invalid');
						$('.invalid-feedback').show();
						const Toast = Swal.mixin({ toast:true, position:"top-end", showConfirmButton:false, timer:3000, timerProgressBar:true });
						Toast.fire({ icon:"error", title:"Account does not exist" });
					}else if(result == 'empty'){
						$('#password').addClass('is-invalid');
						$('#username').addClass('is-invalid');
						$('.invalid-feedback').show();
					}else{
						if(role == "user"){
							window.location.href="dashboard.php";
						}else{
							window.location.href="admin";
						}
						$('#password').removeClass('is-invalid');
						$('#username').removeClass('is-invalid');
						$('.invalid-feedback').hide();
					}
				});
			});

			$('#trackingTableInput').on('keyup', function() {
				var searchTerm = $(this).val().toLowerCase();
				var $rows = $('#trackingTable tbody tr');
				if (searchTerm === '') {
					$rows.show();
				} else {
					$rows.each(function() {
						var rowText = $(this).text().toLowerCase();
						if (rowText.includes(searchTerm)) {
							$(this).show();
						} else {
							$(this).hide();
						}
					});
				}
			});

			const vehicleTableColumns = [
				{ 'title':'ARP Pin',        'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.arp_pin} },
				{ 'title':'Pin',            'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.pin} },
				{ 'title':'Tax Dec.',       'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.taxdec} },
				{ 'title':'Owner',          'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.owner} },
				{ 'title':'Beneficiary',    'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.beneficiary} },
				{ 'title':'Kind',           'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.kind} },
				{ 'title':'Class',          'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.class} },
				{ 'title':'Location',       'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.location} },
				{ 'title':'Brgy',           'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.brgy} },
				{ 'title':'District',       'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.district} },
				{ 'title':'Lot/Block',      'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.lot_block} },
				{ 'title':'Title No.',      'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.title_no} },
				{ 'title':'Title Date',     'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.title_date} },
				{ 'title':'Building Type',  'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.buiding_type} },
				{ 'title':'Area (sqm)',     'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.area_sqm} },
				{ 'title':'Market Value',   'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.market_value} },
				{ 'title':'Assessed Value', 'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.assessed_value} },
				{ 'title':'Portfolio',      'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.portfolio} },
				{ 'title':'Account Type',   'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.account_type} },
				{ 'title':'Tax Status',     'defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.tax_status} },
				{
					'title':'Attached File', 'defaultContent':'<i class="text-muted">—</i>',
					'data':function(row){
						var out = "";
						var result = row.file.split(',');
						for(var i=0;i<result.length;i++){
							out += '<a href="attatchments/'+result[i]+'" class="text-primary text-decoration-none" style="font-size:12px">📎 '+result[i]+'</a><br>';
						}
						return out;
					}
				},
				{ 'title':'Expiration Date','defaultContent':'<i class="text-muted">—</i>', 'data':function(r){return r.expiration_date} }
			];

			var vehicleListTable = $('#vehicleListTable').DataTable({
				'processing':    true,
				'serverSide':    true,
				'ordering':      false,
				'pageLength':    25,
				'scrollY':       '55vh',
				'scrollCollapse':true,
				'columns':       vehicleTableColumns,
				'columnDefs':    [{ 'targets':'_all', 'className':'text-start' }],
				'ajax': {
					'url':'selectVehicleList.php',
					'type':'post',
					'contentType':'application/json',
					'data':function(data){ return JSON.stringify(data); }
				},
				'rowCallback': function(row, data) {
					if(data.expire_count <= 0){
						$(row).addClass('bg-danger');
					}else if(data.expire_count <= 60){
						$(row).addClass('bg-warning');
					}
				}
			});

			$('#newRecordForm').submit(function(e){
				e.preventDefault();
				var row = $(this).closest('form');
				$.ajax({
					url: "recordProcess.php",
					type: "POST",
					data:{
						"bfaarp_pin":row.find('#arp_pin').val(),
						"bfapin":row.find('#pin').val(),
						"bfataxdec":row.find('#taxdec').val(),
						"bfaowner":row.find('#owner').val(),
						"bfabeneficiary":row.find('#beneficiary').val(),
						"bfakind":row.find('#kind').val(),
						"bfaclass":row.find('#class').val(),
						"bfalocation":row.find('#location').val(),
						"bfabrgy":row.find('#brgy').val(),
						"bfadistrict":row.find('#district').val(),
						"bfalot_block":row.find('#lot_block').val(),
						"bfatitle_no":row.find('#title_no').val(),
						"bfatitle_date":row.find('#title_date').val(),
						"bfabuiding_type":row.find('#buiding_type').val(),
						"bfabuilding_comp":row.find('#building_comp').val(),
						"bfabuilding_occu":row.find('#building_occu').val(),
						"bfabuilding_age":row.find('#building_age').val(),
						"bfaarea_sqm":row.find('#area_sqm').val(),
						"bfamarket_value":row.find('#market_value').val(),
						"bfaassessed_value":row.find('#assessed_value').val(),
						"bfaportfolio":row.find('#portfolio').val(),
						"bfaaccount_type":row.find('#account_type').val(),
						"bfatax_status":row.find('#tax_status').val(),
						"bfafiles":row.find('#files').prop('files'),
						"bfaexpiration_date":row.find('#expiration_date').val()
					}
				}).done(function(data){
					if(data.message == "success"){
						$('#addNewRecord').modal('hide');
						vehicleListTable.ajax.reload();
						const Toast = Swal.mixin({toast:true,position:"top-end",showConfirmButton:false,timer:3000,timerProgressBar:true});
						Toast.fire({icon:"success",title:"Record saved successfully"});
					}
				});
			});

		}); // end document.ready

		$(document).on('select2:open', () => {
			document.querySelector('.select2-search__field').focus();
		});
	</script>
</head>
<body>