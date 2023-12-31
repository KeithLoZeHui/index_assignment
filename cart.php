<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Cart | Farm.info
    </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li style="float: left"><a href="index.php">Farm.info</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="wiki.php">Wiki</a></li>
                <li><a href="cart.html">Cart</a></li>
            </ul>
        </nav>
    </header>

    <script>
        var currentPage = window.location.pathname.split('/').pop();
        var linkToCurrentPage = document.querySelector(`[href="${currentPage}"]`);
        linkToCurrentPage.setAttribute("class", "active");
    </script>


    <main>
        <h1>Cart</h1>

        <!-- TODO make this page -->
        <form action="/checkout_cart.php" method="post">
            <table id="cart-table" onchange="calculateSum()">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="select-all" id="select-all" onchange="selectAllItems()"> </th>
                        <th colspan="2">Product info</th>
                        <th>Price</th>
                        <th>Seller</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><input type="checkbox" name="select-item" id="select_item_1"
                                onchange="updateSelectAllCheckbox()"></td>
                        <td><img src="images/img_nature.jpg" alt="Nature"></td>
                        <td>Product name</td>
                        <td>RM49.90</td>
                        <td>Seller name</td>
                        <td>2</td>
                        <td>RM99.80</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="select-item" id="select_item_1"
                                onchange="updateSelectAllCheckbox()"></td>
                        <td><img src="images/img_nature.jpg" alt="Nature"></td>
                        <td>Product name</td>
                        <td>RM49.90</td>
                        <td>Seller name</td>
                        <td>2</td>
                        <td>RM99.80</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="select-item" id="select_item_1"
                                onchange="updateSelectAllCheckbox()"></td>
                        <td><img src="images/img_nature.jpg" alt="Nature"></td>
                        <td>Product name</td>
                        <td>RM49.90</td>
                        <td>Seller name</td>
                        <td>2</td>
                        <td>RM99.80</td>
                    </tr>
                </tbody>
            </table>

            <section class="checkout">
                <span id="total-price">Total from 2 item(s): RM99.80</span>
                <button type="submit">Checkout</button>
            </section>
        </form>

        <script>
            function calculateSum() {
                var table = document.getElementById("cart-table");
                var totalPriceElement = document.getElementById("total-price");
                var priceSum = 0;
                var quantitySum = 0;

                for (var i = 1; i < table.rows.length; i++) {
                    let checked = table.rows[i].cells[0].children[0].checked;

                    if (checked) {
                        let priceString = table.rows[i].cells[6].innerHTML;
                        priceString = priceString.substring(2);
                        priceString = priceString.replace(".", "");
                        priceSum += parseInt(priceString, 10);

                        let quantity = table.rows[i].cells[5].innerHTML;
                        quantitySum += parseInt(quantity);
                    }
                }

                totalPriceElement.innerHTML = `Total from ${quantitySum} item(s): RM${(priceSum / 100).toFixed(2)}`;
                console.log(priceSum);
            }

            function updateSelectAllCheckbox() {
                var table = document.getElementById("cart-table");
                var selectAllCheckbox = document.getElementById("select-all");
                let checkedCount = 0;

                for (var i = 1; i < table.rows.length; i++) {
                    if (table.rows[i].cells[0].children[0].checked) {
                        checkedCount++;
                    }
                }

                if (checkedCount == 0) {
                    selectAllCheckbox.indeterminate = false;
                    selectAllCheckbox.checked = false;
                } else if (checkedCount == table.rows.length - 1) {
                    selectAllCheckbox.indeterminate = false;
                    selectAllCheckbox.checked = true;
                } else {
                    selectAllCheckbox.indeterminate = true;
                }
            }

            function selectAllItems() {
                var table = document.getElementById("cart-table");
                if (table.rows[0].cells[0].children[0].checked) {
                    for (var i = 1; i < table.rows.length; i++) {
                        table.rows[i].cells[0].children[0].checked = true;
                    }
                } else {
                    for (var i = 1; i < table.rows.length; i++) {
                        table.rows[i].cells[0].children[0].checked = false;
                    }
                }
            }

        </script>
    </main>

    <footer>
        <p>Contact us at: contact@farm.info</p>
    </footer>
</body>

</html>