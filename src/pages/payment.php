<!DOCTYPE html>

<?php
session_start();
include '../../config/database.php';
$total_price = isset($_GET['total']) ? floatval($_GET['total']) : 0.00;
if (!isset($_SESSION['user_id'])) {
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>تنبيه</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .alert {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            .alert h2 {
                color: #d9534f;
            }
            .alert a {
                text-decoration: none;
                color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <div class="alert">
            <h2>تنبيه!</h2>
            <p>يرجى تسجيل الدخول أولاً.</p>
            <a href="login.html?total=<?php echo $total; ?>">الذهاب إلى صفحة تسجيل الدخول</a>
        </div>
    </body>
    </html>';
    exit();
}
$user_id = $_SESSION['user_id'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/payment.css">
    <title>Payment page</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="payment-responsive">
    <header class="payment-page">
        <div class="container">
            <form action="process_payment.php" method="POST" class="information">

                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" name="total_price" value="<?php echo number_format($total_price, 2); ?>">

                <div class="left">
                    <h3>BILLING ADDRESS</h3>
                    Full name
                    <input type="text" class="info" id="full-name" name="full_name" placeholder="Enter name">

                    Email
                    <input type="text" class="info" id="email" name="email" placeholder="Enter email">

                    Address
                    <input type="text" class="info" id="address" name="address" placeholder="Enter address">

                    City
                    <input type="text" class="info" id="city" name="city" placeholder="Enter city">
                    
                    <div id="option">
                        <label for="">
                            State
                            <select id="state" name="state">
                                <option value="">Choose state</option>
                                <option value="saudi_arabia">Saudi Arabia</option>
                                <option value="egypt">Egypt</option>
                                <option value="oman">Oman</option>
                            </select>
                        </label>
                        <label for="">
                            Zip code
                            <input type="text" id="zip-code" name="zip_code" placeholder="Zip code">
                        </label>
                    </div>
                </div>
                <div class="right">
                    <h3 class="payment-disc">PAYMENT</h3>
                    Accepted card <br>
                    <label class="custom-radio">
                        <input type="radio" name="payment_method" id="visa" value="visa">Visa
                        <span class="radio-inner"></span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="payment_method" id="bok" value="bok">BOK
                        <span class="radio-inner"></span>
                    </label>
                    <br><br>
                    <label for="card-number" id="card-number-label">
                        Credit card number
                        <input type="text" class="info" id="card-number" name="card_number" placeholder="Enter card number">
                    </label>
                    Exp month
                    <input type="text" class="info" id="exp-month" name="exp_month" placeholder="Enter Month">
                    <div id="option">
                        <label for="exp-year" id="exp-year-label">
                            Exp year
                            <select id="exp-year" name="exp_year">
                                <option value="">Choose year</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </label>
                        <label for="cvv" id="cvv-label">
                            CVV
                            <input type="text" id="cvv" name="cvv" placeholder="CVV">
                        </label>
                    </div>

                    <div class="show-products">
                        <!-- <h3>Products</h3>
                        <select id="product-list" name="products">
                        </select> -->
                        <div class="total-price" id="total-price">
                            Total: $0.00
                        </div>
                        <input type="hidden" name="total_price" id="total-price-input" value="0.00">
                    </div>

                    <input type="submit" class="checkout" value="Payment">
                </div>
            </form>
        </div>
    </header>
    <script>
        $(document).ready(function() {
            // let cart = [
            //     {name:"product 1",price:10.00},
            //     {name:"product 2",price:20.00},
            //     {name:"product 3",price:30.00}
            // ];

            // let total = 0;
            // cart.forEach(function(item) {
            //     $('#product-list').append(`<option value="${item.price}">${item.name} - $${item.price.toFixed(2)}</option>`);
            //     total += item.price;
            //     $('#total-price').text('Total: $' + total.toFixed(2));
            // });

            // $('#total-price-input').val(total.toFixed(2));

            $('input[name="payment_method"]').change(function() {
                if ($('#bok').is(':checked')) {
                    $('.info').not('#card-number').addClass('disabled-input').attr('disabled', true);
                    $('#state, #zip-code, #exp-year, #cvv').addClass('disabled-input').attr('disabled', true);
                    $('#card-number').attr('placeholder', 'Enter account number');
                } else {
                    $('.info').removeClass('disabled-input').attr('disabled', false);
                    $("#state, #zip-code, #exp-year, #cvv").removeClass('disabled-input').attr('disabled', false);
                    $('#card-number').attr('placeholder', 'Enter card number');
                }
            });
            $('form').on('submit', function(event) {
            let accountNumber = $('#card-number').val();
            let paymentMethod = $('input[name="payment_method"]:checked').val();
            let fullName = $('#full-name').val().trim();
            let email = $('#email').val().trim();
            let address = $('#address').val().trim();
            let zipCode = $('#zip-code').val().trim();
            let cvv = $('#cvv').val().trim();
            // let paymentMethod = $('input[name="payment_method"]:checked').val();

            if (!paymentMethod) {
                event.preventDefault();
                alert("يرجى اختيار طريقة الدفع (BOK أو Visa).");
            } else if (paymentMethod === 'bok') {

                if (!accountNumber) {
                    event.preventDefault();
                    alert("يرجى إدخال رقم الحساب.");
                } else if (accountNumber.length !== 10 || isNaN(accountNumber)) {
                    event.preventDefault();
                    alert("رقم الحساب يجب أن يكون 10 خانات من الأرقام.");
                }
            }else if (paymentMethod === 'visa') {
                
                if (!fullName) {

                    event.preventDefault();
                    alert("يرجى إدخال الاسم الكامل.");
                    
                }
                if (!email || !email.includes('@')) {
                    event.preventDefault();
                    alert("يرجى إدخال بريد إلكتروني صحيح.");
                }

                if (!address) {
                    event.preventDefault();
                    alert("يرجى إدخال العنوان.");
                }
                
                if (!cvv || cvv.length !== 3 || isNaN(cvv)) {
                    event.preventDefault();
                    alert("يرجى إدخال CVV مكون من 3 خانات.");
                }
                if (!zipCode || zipCode.length < 5) {
                    event.preventDefault();
                    alert( " يرجى ادخال رمز zipcode صحيح مكون من خمسة ارقام");
                }
                let city = $('#city').val().trim();
            if (!city) {
                event.preventDefault();
                alert("يرجى إدخال المدينة.");
            }
            }
        });
        });
    </script>
</body>
</html>
