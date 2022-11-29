<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{@title}}</title>
    <link href="/style/css/site/site.css" rel="stylesheet" />
    <link href="/style/css/product/product.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                    <p>Add to cart</p>
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