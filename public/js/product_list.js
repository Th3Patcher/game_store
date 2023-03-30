jQuery(function ($) {
    $(document).ready(function () {

        let productBlock = $('#getProductList');
        let categoryBlock = $('#getCategories');
        function createProductCard(data, login){
            if(login)
            {
                return`        <div class="card m-3 d-flex flex-column" style="width: 25%;">
                                <img class="card-img-top" src="public/images/f1.jpg" alt="Card image cap">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">${data.title}</h5>
                                    <p class="card-text flex-grow-1">${data.description}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <a href="#" class="btn btn-secondary mr-auto">Read More</a>
                                        <a href="add_basket_product?id=${data.id}" class="btn btn-primary ml-auto">Buy</a>
                                    </div>
                                </div>
                            </div>`;
            } else {
                return`        <div class="card m-3 d-flex flex-column" style="width: 25%;">
                                <img class="card-img-top" src="public/images/f1.jpg" alt="Card image cap">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">${data.title}</h5>
                                    <p class="card-text flex-grow-1">${data.description}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <a href="#" class="btn btn-secondary mr-auto">Read More</a>
                                        <a href="login" class="btn btn-primary ml-auto">Buy</a>
                                    </div>
                                </div>
                            </div>`;
            }

        }
        function createCategoryList(data){
            return`<div class="category-item">
                                    <input class="cat" type="checkbox" name="category_id[]" id="cat_${data.id}" value="${data.id}">
                                    <label for="cat_${data.id}">${data.name}</label>
                                </div>`;
        }
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: 'http://' + window.location.hostname + '/product_list',
            success: function (data) {
                $.each(data, function (index, product) {
                    $(createProductCard(product,data.checkLogin)).appendTo(productBlock);
                })
            },
            error: function (logError) {
                block.after('<span class="messagesApi"> An error has occurred, please try again later</span>')
            }
        })

        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: 'http://' + window.location.hostname + '/category_list',
            success: function (data) {
                $.each(data, function (index, category) {
                    $(createCategoryList(category)).appendTo(categoryBlock);
                })
            },
            error: function (logError) {
                block.after('<span class="messagesApi"> An error has occurred, please try again later</span>')
                alert.show()
            }
        })

        $("#sendCategory").click(function (event) {
            let form = $('#searchByCategory');
            let msg = form.serialize();

            $.ajax({
                method: 'POST',
                dataType: 'json',
                url: 'http://' + window.location.hostname + '/product_list_by_category_id',
                data: msg,
                success: function (data) {
                    $(productBlock).empty();
                    $.each(data, function (index, product) {
                        $(createProductCard(product)).appendTo(productBlock);
                    })
                },
                error: function (logError) {
                    $('#getCategories').after('<span class="messagesApi"> An error has occurred, please try again later</span>')
                    alert.show()
                }
            });
        })
    });
})

