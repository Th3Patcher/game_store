<!doctype html>
<html lang="en">


<?php
require_once __DIR__ . '/../layout/header.php';
?>
<body class="d-flex flex-column">

<div class="container">
    <div class="row">
        <div class="col-md-2 mt-5">
            <form id="searchForm">
                <div class="form-group">
                    <input type="text" class="form-control" id="searchInput" placeholder="Поиск">
                </div>
            </form>
            <form id="searchByCategory" method="POST" onsubmit="return false">
                <div id="getCategories">
                </div>
                <button type="button" id="sendCategory">Search by category</button>
            </form>
        </div>
        <div class="col-md-10">
            <div id="getProductList" class="d-flex flex-wrap justify-content-center">

            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/../layout/footer.php';
?>
<script src="public/js/product_list.js"></script>
</body>
</html>
