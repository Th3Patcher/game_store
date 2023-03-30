<!doctype html>
<html lang="en">

<?php
require_once __DIR__ . '/../layout/header.php';
?>

<body class="d-flex flex-column">
<div id="page-content">
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div id="imageLogin" class="col-md-6 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <div class="col-12">
                                    <div class="alert alert-danger" id="alertErrorInformation" style="display:none;">
                                        <strong id="alertMessage">Information! </strong>
                                    </div>
                                </div>
                                <h3 class="display-4">Login in site!</h3>
                                <p class="text-muted mb-4">If you have a registered account or go to the registration page to create one</p>
                                <form method="POST" onsubmit="return false" name="login_form" id="login_form">
                                    <div class="form-group mb-3">
                                        <input id="loginEmail" type="email" name="email" placeholder="Email address" required autofocus class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="loginPassword" type="password" name="password" placeholder="Password" required autofocus class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <button type="button" id="submitFormLogin" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                </form>
                                <a href="registration"><button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Registration form</button></a>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->

        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/../layout/modal.php';
?>
<?php
require_once __DIR__ . '/../layout/footer.php';
?>

</body>
</html>