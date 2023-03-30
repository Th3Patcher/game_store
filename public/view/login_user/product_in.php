<!doctype html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="public/css/product.css">
<?php
require_once __DIR__ . '/../../layout/login_layout/header_in.php';
?>
<body class="d-flex flex-column">

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form id="searchForm">
                <div class="form-group">
                    <input type="text" class="form-control" id="searchInput" placeholder="Поиск">
                </div>
            </form>
            <div id="getCategories">

            </div>
        </div>
        <div class="col-md-9">
            <div id="getProductList" class="d-flex flex-wrap justify-content-start">


            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../../layout/footer.php';
?>
<script src="public/js/product_list.js"></script>
</body>
</html>