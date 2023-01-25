<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="/style/css/site/site.css" rel="stylesheet" />
    <script>
        function removeItem(itemNumber) {
            // Remove item from the page
            const element = document.getElementById(itemNumber);
            element.remove();

            const product = {
                item_id: parseInt(itemNumber)
            }

            const req = new XMLHttpRequest();
            req.open('POST', '/cart/remove');
            req.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            req.send(JSON.stringify(product));
        }
    </script>
</head>
<body>
<!-- header -->
{@include_element[header]}}
<!-- list of the products -->
<div class="container">
    <div class="row mb-3{@display_option}}">
        <div class="col-4"></div>
        <div class="col-1">
            Qty
        </div>
    </div>
    {@cart_items}}
    <div class="mt-5{@display_option}}">
        <a href="/cart/delete" class="btn btn-danger">Clear the cart</a>
    </div>
</div>
<!-- footer -->
{@include_element[footer]}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>