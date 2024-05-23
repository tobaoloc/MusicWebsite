<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>See what’s new</p>
        <h2>Shopping Cart</h2>
    </div>
</section>
<section class="bg-light my-5">
    <div class="container">
        <div class="row">
            <!-- cart -->
            <div class="col-lg-9">
                <div class="card border shadow-0">
                    <div class="m-4">
                        <h4 class="card-title mb-4">Your shopping cart</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col">#</th>
                                    <th scope="col">Album</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price ($)</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="table-shoppingCart">
                                <?php
                                if (isset($_SESSION['shoppingCart']) && (is_array($_SESSION['shoppingCart']))) {
                                    $sum = 0;
                                    for ($i = 0; $i < sizeof($_SESSION['shoppingCart']); $i++) {
                                        $sum += $_SESSION['shoppingCart'][$i][2];
                                        echo '<tr align="center">
                                    <td>' . ($i + 1) . '</td>
                                    <td width = "160px"><img src="' . $_SESSION['shoppingCart'][$i][0] . '" alt=""></td>
                                    <td>' . $_SESSION['shoppingCart'][$i][1] . '</td>
                                    <td>' . $_SESSION['shoppingCart'][$i][2] . '</td>
                                    <td>
                                    <a href="delete-shoppingcart.php?delid=' . $i . '">
                                    <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    </td>
                                    </tr>';
                                    }
                                    $unit = $sum >= 1000 ? "₫" : "$";
                                    echo '<tr>
                                        <th colspan="4">Total:</th>
                                        <th>
                                        <div>' . $sum . $unit . ' <div>
                                        </th>
                                        </tr>';
                                }
                                ?>
                                <!-- <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    </tr> -->
                            </tbody>
                        </table>
                    </div>

                    <div class="border-top pt-4 mx-4 mb-4">
                        <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut
                            aliquip
                        </p>
                    </div>
                </div>
            </div>
            <!-- cart -->
            <!-- summary -->
            <div class="col-lg-3">
                <form action="checkout.php" method="post">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Have coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                                    <button class="btn btn-light border">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['shoppingCart']) && (is_array($_SESSION['shoppingCart']))) {
                                $tax = $sum * 0.10;
                                $total = number_format($sum + $tax, 2);

                                ?>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total price:</p>
                                    <p class="mb-2">
                                        <strong><?php echo $sum ?><?php echo $unit ?></strong>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Discount:</p>
                                    <p class="mb-2 text-success">-0<?php echo $unit ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">TAX (10%):</p>
                                    <p class="mb-2"><?php echo $tax ?><?php echo $unit ?></p>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Amount:</p>
                                    <p class="mb-2 fw-bold"><?php echo $total ?><?php echo $unit ?></p>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="mt-3">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button collapsed btn btn-success w-100 shadow-0 mb-2"
                                                id="makePurchaseButton" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                                aria-controls="panelsStayOpen-collapseTwo">
                                                Make Purchase
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                            <div class="accordion-body">
                                                <button id="vnpay" type="submit"></button>
                                                <hr>
                                                <div id="paypal-button-container" class="paypal-button-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- summary -->
        </div>
    </div>
</section>
<!-- cart + summary -->
<!-- Modal -->
<div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="purchaseModalLabel">Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="purchaseImage" src="" alt="Purchase Image">
            </div>
        </div>
    </div>
</div>

<script
    src="https://www.paypal.com/sdk/js?client-id=AYtILqlto0tjEJ5QajqHt95c7UNGEnwGUFoLDqbf3GeLdLacKQNGnSZMwWWEF2_ABWs8MQjLoYF9_H8f"></script>
<script>
    var orderId;
    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    "amount": {
                        "value": <?php echo $total ?>,
                        "currency_code": 'USD'
                    },
                    "description": "Order description"
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                console.log(details);
                if (details.status == "COMPLETED") {
                    $.ajax({
                        url: "<?php echo getUrl("purchase-success.php") ?>",
                        success: function (data) {
                            window.location.href =
                                "<?php echo getUrl("?action=payment_success&order_id=") ?>"+data;
                        }
                    })
                }
            });
        },
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay',
            height: 40
        }
    }).render('#paypal-button-container');
</script>