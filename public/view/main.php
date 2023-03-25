<!doctype html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/info.css">
<?php
require_once __DIR__ . '/../layout/header.php';
?>

<body class="d-flex flex-column">

<div id="page-content">
    <section class="py-5">

        <div class="container py-5">
            <h2>Welcome to the test assignment.</h2>
            <ul>
                <li>Test case executed in PHP 8 without using frameworks</li>
                <li>The project uses the MVC model</li>
                <li>A csv file is used instead of a database</li>
                <li>Added logging for all routers</li>
                <li>Validation is used on the client side</li>
                <li>Added validated user login form</li>
                <li>Added page after login with a full list of users</li>
            </ul>
        </div>

    </section>
</div>


<?php
require_once __DIR__ . '/../layout/footer.php';
?>

</body>
</html>