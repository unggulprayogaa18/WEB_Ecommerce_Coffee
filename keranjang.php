<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="data/stylekeranjang.css">
</head>

<body>
    <div class="container mt-5 p-3 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                    <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span
                            class="ml-2"><a href="shop_user.php">Continue Shopping</a></span></div>
                    <hr>
                    <h6 class="mb-0">Shopping cart</h6>
                    <div class="d-flex justify-content-between"><span>You have 4 items in your cart</span>
                        <div class="d-flex flex-row align-items-center"><span class="text-black-50">Sort by:</span>
                            <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>

                    <div id="cartItemsContainer">
                        <!-- Cart items will be dynamically added here -->
                    </div>


                </div>
            </div>
            <div class="col-md-4">
                <div class="payment-info">
                    <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img
                            class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div><span
                        class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio"
                            name="card" value="payment" checked> <span><img width="30"
                                src="https://img.icons8.com/color/48/000000/mastercard.png" /></span> </label>

                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                src="https://img.icons8.com/officel/48/000000/visa.png" /></span> </label>

                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span> </label>


                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                src="https://img.icons8.com/officel/48/000000/paypal.png" /></span> </label>
                    <div><label class="credit-card-label">Name on card</label><input type="text"
                            class="form-control credit-inputs" placeholder="Name"></div>
                    <div><label class="credit-card-label">Card number</label><input type="text"
                            class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                    <div class="row">
                        <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text"
                                class="form-control credit-inputs" placeholder="12/24"></div>
                        <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text"
                                class="form-control credit-inputs" placeholder="342"></div>
                    </div>
                    <hr class="line">
                    <div class="d-flex justify-content-between information"><span>Subtotal</span><span>$3000.00</span>
                    </div>
                    <div class="d-flex justify-content-between information"><span>Shipping</span><span>$20.00</span>
                    </div>
                    <div class="d-flex justify-content-between information"><span>Total(Incl.
                            taxes)</span><span>$3020.00</span></div><button
                        class="btn btn-primary btn-block d-flex justify-content-between mt-3"
                        type="button"><span>$3020.00</span><span>Checkout<i
                                class="fa fa-long-arrow-right ml-1"></i></span></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ... Your existing JavaScript code ...

            // Function to update the shopping cart section in HTML
            function updateShoppingCart() {
                const keranjangItems = JSON.parse(localStorage.getItem('keranjangItems')) || {};

                // Clear existing cart items
                cartItemsContainer.innerHTML = '';

                // Update cart items
                Object.keys(keranjangItems).forEach(function (namaProduk) {
                    const { count, image, hargasaatini, hargadiskon } = keranjangItems[namaProduk];

                    const totalharga = hargasaatini * count;
                    // Create a new cart item element
                    const cartItem = document.createElement('div');
                    cartItem.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mt-3', 'p-2', 'items', 'rounded');

                    // Create the content for the cart item
                    const content = `
                <div class="d-flex flex-row">
                    <img class="rounded" src="config/${image}" width="40">
                    <div class="ml-2">
                        <span class="font-weight-bold d-block">${namaProduk}</span>
                        <span class="spec">Harga Saat Ini: ${hargasaatini}, Harga Diskon: ${hargadiskon}</span>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <span class="d-block">${count}</span>
                    <span class="d-block ml-5 font-weight-bold">$${totalharga}</span>
                    <i class="fa fa-trash-o ml-3 text-black-50"></i>
                </div>
            `;

                    // Set the content of the cart item
                    cartItem.innerHTML = content;

                    // Append the cart item to the container
                    cartItemsContainer.appendChild(cartItem);


                    function addItemToCart(count, image, namaProduk, totalharga) {
                        $.ajax({
                            type: 'POST',
                            url: 'insert_to_cart.php',
                            data: {
                                count: count,
                                image: image,
                                namaProduk: namaProduk,
                                totalharga: totalharga
                            },
                            success: function (response) {
                                console.log(response); // Print message from PHP server
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText); // Print error message if there's an error
                            }
                        });
                    }
                });

                // Update the badge with the total count
                const keranjangcount = Object.values(keranjangItems).reduce((acc, count) => acc + count, 0);
                keranjangBadge.textContent = keranjangcount;
                keranjangBadge.style.display = keranjangcount > 0 ? 'inline-block' : 'none';
            }

            // Initial update of the shopping cart
            updateShoppingCart();
        });
    </script>
</body>

</html>