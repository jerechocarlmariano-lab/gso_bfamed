<?php
define('IS_ACCESSIBLE', true);
include 'includes/header.php';
?>
<script>document.body.classList.add('page-login');</script>

<div class="container d-flex align-items-center justify-content-center" style="min-height:100vh; padding: 24px;">
    <div id="login">
        <div class="login-logo-wrap">
            <img src="resources/img/logo.png" alt="GSO BFAMED Logo">
            <div>
                <div class="login-title" style="margin-bottom: 15px;">GSO BFAMED</div>
                <div class="login-sub">Please sign in to continue</div>
            </div>
        </div>

        <form id="loginForm">
            <div class="mb-4">
                <label class="form-label-glass" for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" autocomplete="username">
            </div>

            <div class="mb-3">
                <label class="form-label-glass" for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" autocomplete="current-password">
                <div class="invalid-feedback">Please enter a valid username or password.</div>
            </div>

            <div class="form-check mb-5">
                <input type="checkbox" class="form-check-input" id="passwordCheckbox">
                <label class="form-check-label" for="passwordCheckbox">Show password</label>
            </div>

            <button class="btn-login" id="loginBtn" type="submit">
                Sign In &rarr;
            </button>
        </form>
    </div>
</div>