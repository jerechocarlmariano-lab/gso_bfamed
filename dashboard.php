<?php include 'includes/header.php' ?>

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

    <a href="logout.php" class="nav-pill logout">
        <i class="fas fa-sign-out-alt" style="font-size:13px;"></i>
        Logout
    </a>
</nav>

<!-- PAGE CONTENT -->
<div class="app-content">

    <!-- Page Header -->
    <div class="page-header-band animate-in">
        <div>
            <h1 class="ph-title">Property Tracking Dashboard</h1>
            <p class="ph-sub">Manage BFAMED property records, expiration dates, and attached documents</p>
        </div>
        <button class="btn-gso-primary" data-bs-toggle="modal" data-bs-target="#addNewRecord" style="flex-shrink:0;">
            <i class="fas fa-plus"></i>
            Add New Record
        </button>
    </div>

    <!-- Legend -->
    <div class="d-flex gap-3 mb-3 flex-wrap animate-in" style="animation-delay:.05s">
        <div class="d-flex align-items-center gap-2" style="font-size:12.5px; color: var(--gray-600);">
            <span style="width:14px;height:14px;border-radius:3px;background:#ef4444;display:inline-block;"></span>
            Expired
        </div>
        <div class="d-flex align-items-center gap-2" style="font-size:12.5px; color: var(--gray-600);">
            <span style="width:14px;height:14px;border-radius:3px;background:#f59e0b;display:inline-block;"></span>
            Expiring within 60 days
        </div>
        <div class="d-flex align-items-center gap-2" style="font-size:12.5px; color: var(--gray-600);">
            <span style="width:14px;height:14px;border-radius:3px;background:#e2e8f0;border:1px solid #cbd5e1;display:inline-block;"></span>
            Active
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="app-card animate-in" style="animation-delay:.1s">
        <div class="card-header-strip">
            <div class="strip-dot"></div>
            <span class="strip-title">Property Records</span>
        </div>
        <div style="overflow-x:auto; padding: 0 0 12px;">
            <table id="vehicleListTable" style="width:100%"></table>
        </div>
    </div>

</div>

<!-- ADD NEW RECORD MODAL -->
<form action="recordProcess.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addNewRecord" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">
                        <i class="fas fa-plus-circle me-2" style="color:var(--sky);"></i>
                        New Property Record
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">ARP PIN</label>
                            <input type="text" name="arp_pin" class="form-control" placeholder="000-00-000">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">PIN</label>
                            <input type="text" name="pin" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tax Dec</label>
                            <input type="text" name="taxdec" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Owner</label>
                            <input type="text" name="owner" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Beneficiary</label>
                            <input type="text" name="beneficiary" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">File Upload</label>
                            <input type="file" name="files[]" class="form-control" multiple="multiple">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Expiration Date</label>
                            <input type="date" name="expiration_date" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fas fa-save me-2"></i>Save Record
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include 'includes/footer.php' ?>