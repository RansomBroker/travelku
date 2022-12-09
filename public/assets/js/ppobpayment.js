/* fetch api and show the product */
const showProductList = async () => {
    /*hide initial button*/
    $('#product-btn-vis').addClass('d-none')
    const API = window.location.origin+"/api/ppobtopup/get-all-product";
    const response = await fetch(API, {method: 'GET'})
    const data = await response.json();

    displayHtml(data)
    $("#topupppboLoadingSpinner").removeClass('d-flex')
    $("#topupppboLoadingSpinner").addClass('d-none')
    $('#product-btn-vis').removeClass('d-none')

    let owlProduct = $(".product-list")
    owlProduct.owlCarousel({
        autoplay:false,
        slideSpeed: 1500,
        loop:false,
        margin: 20,
        autoWidth: true,
        responsive: {
            0: {
                items:1,
                margin: 10
            },
            500: {
                items:2,
                margin: 10
            },
            767: {
                items:3,
                margin: 10,
            },
            1000: {
                items: 6,
                margin: 10
            }
        }
    })

    $(".next-product").click(function () {
        owlProduct.trigger('prev.owl.carousel')
    })

    $(".previous-product").click(function () {
        owlProduct.trigger('next.owl.carousel')
    })

    await initialProductView('.product');
    productDetail(".product");
}

const displayHtml = (result) => {
    let html= ``;

    result.forEach(function (item, index) {
        if (item.name != "test") {
            html += ` <button class="${index == 0 ? 'first active ': ''}product w-100 btn btn-outline-primary btn-sm rounded-pill owl-item text-uppercase" data-category="${item.product}" data-product="${item.name}">${item.name}</button>`;
        }
    })

    $(".product-list").append(html);
    console.log(result)
}

const productDetail = (className) => {
    $(className).on('click', async function (e) {
        spinerDetail();
        let initial = $('.first');

        if (initial.length > 0) {
            $('.first').removeClass('active');
        }

        $('#product-detail').addClass('d-flex');
        const URL = window.location.origin+'/api/ppobtopup/get-product-detail'
        let category = $(this).attr("data-category");
        let product = $(this).attr('data-product');

        let data = {
            category,
            product
        }
        console.log(JSON.stringify(data));
        console.log(category);
        console.log(product);

        let request = await fetch(URL, {
            method: 'POST',
            headers: {
                Accept: 'application.json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        $('#product-detail').removeClass('d-flex');
        $('#product-detail').addClass('d-none');

        let response = await request.json();

        productListDetailHtml(response);

    })
}

const spinerDetail = () => {
    $("#product-list-detail").empty()
    let html = ``;

    html += `<div class="col-12 col-lg-12 d-flex justify-content-center" id="product-detail">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>`;
    $("#product-list-detail").append(html);
}

const productListDetailHtml = (result) => {

    $("#product-list-detail").empty()
    let html = ``;

    if (result.productCategory === "topup") {
        result.product.forEach(function (item) {
            html += `<form action="topup/order" method="post" class="col-auto">
                        <input type="hidden" name="product" value="${item}">
                        <input type="hidden" name="group" value="${result.productCategory}">
                        <div class="card border-1 shadow-sm">
                            <img src="${window.location.origin+'/public/assets/icons/'+item.split(' ').join('_').toLowerCase()+'.png'}" width="40" class="ms-auto me-auto pt-2">
                            <div class="card-body p-2">
                                <button class="btn-no-style small text-black stretched-link">${item}</button>
                            </div>
                        </div>
                      </form>`;
        })
    }

    if (result.productCategory === 'ppob') {
        result.product.forEach(function (item) {
            html += `<form action="topup/order" method="post" class="col-auto">
                        <input type="hidden" name="product" value="${item.name}">
                        <input type="hidden" name="group" value="${result.productCategory}">
                        <div class="card  border-1 shadow-sm">
                            <img src="${window.location.origin+'/public/assets/icons/'+item.code.split(' ').join('_').toLowerCase()+'.png'}" width="40" class="ms-auto me-auto pt-2">
                            <div class="card-body p-2">
                                <button class="btn-no-style small text-black stretched-link">${item.name}</button>
                            </div>
                        </div>
                    </form>
                    `;
        })
    }

    $("#product-list-detail").append(html)
    console.log(result);
}

const initialProductView = async (classname) => {
    let initial = $(classname);

    if (initial.length) {
        const URL = window.location.origin+'/api/ppobtopup/get-product-detail'
        let category = $(classname).attr("data-category");
        let product = $(classname).attr('data-product');

        let data = {
            category,
            product
        }
        console.log(JSON.stringify(data));
        console.log(category);
        console.log(product);

        let request = await fetch(URL, {
            method: 'POST',
            headers: {
                Accept: 'application.json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        let response = await request.json();

        productListDetailHtml(response);
    }
}


/* carousel */
showProductList()

