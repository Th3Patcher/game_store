<!doctype html>
<html lang="en">

<?php
require_once __DIR__ . '/../layout/header.php';
?>

<body class="d-flex flex-column">
<div id="page-content">
    <div class="container-fluid">
        <div class="row no-gutter">

            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-10 col-xl-7 mx-auto" id="maimBlockRegistration">
                                <div class="col-12">
                                    <div class="alert alert-danger" id="alertErrorInformation" style="display:none;">
                                        <strong id="alertMessage">Information! </strong>
                                    </div>
                                </div>
                                <div id="maimContentRegistration">
                                    <h3 class="display-4">Registration in site!</h3>
                                    <p class="text-muted mb-4">Create a new account to use the site</p>
                                    <form method="POST" onsubmit="return false" name="registration_form"
                                          id="registration_form">
                                        <div class="form-group mb-3">
                                            <input id="registrationFirstName" type="text" name="first_name"
                                                   placeholder="First name" required autofocus
                                                   class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="registrationLastName" type="text" name="last_name"
                                                   placeholder="Last name" required autofocus
                                                   class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="registrationEmail" type="email" name="email"
                                                   placeholder="Email address" required autofocus
                                                   class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="registrationPhone" type="text" name="phone"
                                                   placeholder="Phone number" required autofocus
                                                   class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="registrationPassword" type="password" name="password"
                                                   placeholder="Password" required autofocus
                                                   class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="registrationPasswordRetry" type="password" name="retry_password"
                                                   placeholder="Password retry" required autofocus
                                                   class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                        </div>
                                        <button type="button" id="submitFormRegistration"
                                                class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                            Registration
                                        </button>
                                    </form>
                                    <a href="login">
                                        <button type="button"
                                                class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                            Login form
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="imageRegistration" class="col-md-6 d-none d-md-flex bg-image"></div>

        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/../layout/footer.php';
?>

</body>
</html>

