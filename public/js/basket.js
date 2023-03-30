jQuery(function ($) {
    $(document).ready(function () {

        let productBlock = $('#basketProduct');

        function list_product_basket(data)
        {
            return `<div class="product-item-basket">
        <img src="public/images/f1.jpg" alt="Product Image">
        <h3 class="product-title-basket">${data.title}</h3>
        <p class="product-price-basket">${data.description}</p>
        <a href="delete_basket_request?id=${data.id}" class="delete-button" >Delete</a>
    </div>`
        }

        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: 'http://' + window.location.hostname + '/list_basket_request',
            success: function (data) {
                $.each(data, function (index, product) {
                    $(list_product_basket(product)).appendTo(productBlock);
                })
            },
            error: function (logError) {
                console.log(logError)
                productBlock.after('<span class="messagesApi"> Pysto idi kypi choto lox</span>')
            }
        })

    });
})

