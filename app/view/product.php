<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{@title}}</title>
    <link href="/style/css/site/site.css" rel="stylesheet" />
    <link href="/style/css/product/product.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script>
        function AddToCart() {
            let productId = document.getElementById("product_id").value;
            let productQuantity = document.getElementById("product_quantity").value;

            const product = {
                product_id: parseInt(productId),
                product_quantity: parseInt(productQuantity)
            }

            const req = new XMLHttpRequest();
            req.open('POST', '/cart/add');
            req.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            req.addEventListener('load', function() {
                if (req.readyState === 4) {
                    document.getElementById('cart-output').textContent = req.responseText;
                } else {
                    console.log("Request error");
                }
            });
            req.send(JSON.stringify(product));
        };
    </script>
</head>
<body>
    <!-- header -->
    {@include_element[header]}}
    <!-- list of the products -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-4 p-4 product-image">
                <img src="/upload/products/{@product_image}}" alt="{@product_name}} image">
            </div>
            <div class="col p-4">
                <div claas="row">
                    <h1>{@product_name}}</h1>
                </div>
                <div class="row mt-4 p-3 border-bottom">
                    <p>${@product_price}}</p>
                </div>
                <div class="row mt-4 p-3 border-bottom">
                    <p>
                        <form action="/cart/add" method="post" class="form-control">
                            <select name="product_quantity" id="product_quantity" class="form-select mb-3 w-auto">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <input type="hidden" id="product_id" name="product_id" value="{@product_id}}" />
                            <button id="add-to-cart" onclick="AddToCart(); return false;" class="btn btn-primary">Add to cart</button>
                            <div id="cart-output"></div>
                        </form>
                    </p>
                </div>
                <div class="row mt-4 p-3">
                    <p>{@product_description}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    {@include_element[footer]}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>