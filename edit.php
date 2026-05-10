<?php 
include 'includes/header.php';

$ref = $_GET['d'];
$selectDetails = $pdo->query("SELECT * FROM vehicle_tracking WHERE vec_id = '$ref' ");
$res = $selectDetails->fetch();
?>

<!-- TOP NAV -->
<nav class="app-navbar">
    <a href="dashboard.php" class="brand">
        <img src="resources/img/logo.png" alt="Logo" class="brand-logo">
        <div class="brand-text">
            <span class="brand-name">GSO BFAMED Tracking</span>
            <span class="brand-sub">Iloilo City Government</span>
        </div>
    </a>
    <div class="nav-divider"></div>
    <a href="dashboard.php" class="nav-pill">
        <i class="fas fa-arrow-left" style="font-size:12px;"></i>
        Back to Dashboard
    </a>
</nav>

<div class="app-content">

    <!-- Page Header -->
    <div class="page-header-band animate-in" style="margin-bottom:28px;">
        <div>
            <h1 class="ph-title"><i class="fas fa-edit me-3" style="opacity:.75;"></i>Edit Record</h1>
            <p class="ph-sub">Update property tracking information below</p>
        </div>
    </div>

    <!-- Edit Form Card -->
    <form action="editProcess.php" method="POST">
        <input type="hidden" name="ref" value="<?php echo $ref ?>">

        <div class="edit-form-card animate-in" style="animation-delay:.08s;">
            <div class="edit-card-header">
                <h5><i class="fas fa-car me-2" style="color:var(--sky);"></i>Vehicle / Property Details</h5>
            </div>

            <div class="edit-card-body">
                <div class="row-group">
                    <div class="form-group">
                        <label class="form-label">Property No.</label>
                        <input type="text" name="property_no" class="form-control" value="<?php echo htmlspecialchars($res['vec_property_number'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Type of Vehicle</label>
                        <input type="text" name="type_vehicle" class="form-control" value="<?php echo htmlspecialchars($res['vec_type'] ?? '') ?>">
                    </div>
                </div>

                <div class="row-group">
                    <div class="form-group">
                        <label class="form-label">Make</label>
                        <input type="text" name="make_vehicle" class="form-control" value="<?php echo htmlspecialchars($res['vec_make'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">CS / Plate No.</label>
                        <input type="text" name="cs_plate_no" class="form-control" value="<?php echo htmlspecialchars($res['vec_cs_plate_number'] ?? '') ?>">
                    </div>
                </div>

                <div class="row-group">
                    <div class="form-group">
                        <label class="form-label">Engine No.</label>
                        <input type="text" name="engine_no" class="form-control" value="<?php echo htmlspecialchars($res['vec_engine_number'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Chassis No.</label>
                        <input type="text" name="chassis_no" class="form-control" value="<?php echo htmlspecialchars($res['vec_chasis_number'] ?? '') ?>">
                    </div>
                </div>

                <div class="row-group">
                    <div class="form-group">
                        <label class="form-label">Acquisition Date</label>
                        <input type="text" name="aquisition_date" class="form-control" value="<?php echo htmlspecialchars($res['vec_aquisition_date'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Acquisition Cost</label>
                        <input type="text" name="aquisition_cost" class="form-control" value="<?php echo htmlspecialchars($res['vec_aquisition_cost'] ?? '') ?>">
                    </div>
                </div>

                <div class="row-group">
                    <div class="form-group">
                        <label class="form-label">Office / Department</label>
                        <input type="text" name="office_department" class="form-control" value="<?php echo htmlspecialchars($res['vec_department'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">MR/ARE/PAR #</label>
                        <input type="text" name="mr_are_par" class="form-control" value="<?php echo htmlspecialchars($res['vec_mr_are_par'] ?? '') ?>">
                    </div>
                </div>

                <div class="row-group">
                    <div class="form-group">
                        <label class="form-label">Accountable Officer</label>
                        <input type="text" name="accountable_person" class="form-control" value="<?php echo htmlspecialchars($res['vec_accountable'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status / Condition / Worthiness</label>
                        <input type="text" name="status_condition" class="form-control" placeholder="Good / Fair / Repairable / Unserviceable" value="<?php echo htmlspecialchars($res['vec_status_condition'] ?? '') ?>">
                    </div>
                </div>

                <div class="row-group">
                    <div class="form-group">
                        <label class="form-label">Insurance Expiration Date</label>
                        <input type="date" name="insurance_date_expire" class="form-control" value="<?php echo htmlspecialchars($res['vec_insurance_date_expire'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Registration Expiration Date</label>
                        <input type="date" name="registration_date_expire" class="form-control" value="<?php echo htmlspecialchars($res['vec_registration_date_expire'] ?? '') ?>">
                    </div>
                </div>
            </div>

            <div class="edit-card-footer">
                <a href="dashboard.php" class="btn btn-secondary me-3">Cancel</a>
                <button type="submit" class="btn btn-success px-5">
                    <i class="fas fa-save me-2"></i>Save Changes
                </button>
            </div>
        </div>

    </form>
</div>

<?php 
include 'includes/footer.php';
?>