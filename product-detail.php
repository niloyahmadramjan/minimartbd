<?php
require 'config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$product_id = (int)$_GET['id'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://fakestoreapi.com/products/" . $product_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$product = json_decode($response, true);

if (!$product) {
    die("Product not found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['title']) ?> - MiniMartBD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

<?php include 'header.php'; ?>

<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="text-sm text-gray-600 mb-6">
        <a href="index.php" class="hover:text-blue-600">Home</a> /
        <a href="index.php" class="hover:text-blue-600">Groceries</a> /
        <a href="index.php" class="hover:text-blue-600">Snacks</a> /
        <span class="text-gray-900"><?= htmlspecialchars($product['title']) ?></span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Left: Images -->
        <div>
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-6">
                <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['title']) ?>"
                     class="w-full max-h-96 object-contain mx-auto">
            </div>

            <!-- Thumbnail Gallery -->
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-4 shadow cursor-pointer border-2 border-blue-500">
                    <img src="<?= $product['image'] ?>" class="w-full h-24 object-contain">
                </div>
                <div class="bg-white rounded-xl p-4 shadow cursor-pointer hover:border-blue-500 transition">
                    <img src="<?= $product['image'] ?>" class="w-full h-24 object-contain opacity-70">
                </div>
                <div class="bg-white rounded-xl p-4 shadow cursor-pointer hover:border-blue-500 transition">
                    <img src="<?= $product['image'] ?>" class="w-full h-24 object-contain opacity-70">
                </div>
                <div class="bg-white rounded-xl p-4 shadow cursor-pointer hover:border-blue-500 transition">
                    <img src="<?= $product['image'] ?>" class="w-full h-24 object-contain opacity-70">
                </div>
            </div>
        </div>

        <!-- Right: Product Info -->
        <div>
            <h1 class="text-4xl font-bold mb-4"><?= htmlspecialchars($product['title']) ?></h1>

            <div class="flex items-center gap-4 mb-6">
                <div class="flex text-yellow-400">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <i class="fas fa-star <?= $i <= round($product['rating']['rate']) ? '' : '-half-alt text-gray-300' ?>"></i>
                    <?php endfor; ?>
                </div>
                <span class="text-gray-600">(<?= $product['rating']['count'] ?> reviews)</span>
            </div>

            <div class="flex items-baseline gap-4 mb-8">
                <span class="text-4xl font-bold text-blue-600">$<?= number_format($product['price'], 2) ?></span>
                <span class="text-2xl text-gray-500 line-through">$<?= number_format($product['price'] * 1.3, 2) ?></span>
                <span class="bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full font-medium">11% OFF</span>
            </div>

            <p class="text-gray-700 mb-8 leading-relaxed">
                <?= nl2br(htmlspecialchars($product['description'])) ?>
            </p>

            <!-- Add to Cart Section -->
            <div class="flex items-center gap-6 mb-8">
                <div class="flex items-center border rounded-lg">
                    <button class="qty-btn px-4 py-3 hover:bg-gray-100" data-action="minus">-</button>
                    <input type="text" value="1" class="qty-input w-16 text-center font-medium" readonly>
                    <button class="qty-btn px-4 py-3 hover:bg-gray-100" data-action="plus">+</button>
                </div>

                <button id="add-to-cart-btn"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-4 rounded-xl flex items-center justify-center gap-3 transition">
                    <i class="fas fa-shopping-cart"></i>
                    Add to Cart
                </button>

                <button class="p-4 border rounded-xl hover:bg-gray-50 transition">
                    <i class="far fa-heart text-xl"></i>
                </button>
            </div>

            <!-- Tabs -->
            <div class="border-t pt-8">
                <div class="flex gap-8 border-b mb-6">
                    <button class="tab-btn pb-3 px-1 border-b-2 border-blue-600 text-blue-600 font-medium">Description</button>
                    <button class="tab-btn pb-3 px-1 text-gray-600 hover:text-blue-600">Ingredients</button>
                    <button class="tab-btn pb-3 px-1 text-gray-600 hover:text-blue-600">Reviews</button>
                </div>

                <div class="tab-content">
                    <p class="text-gray-700 leading-relaxed">
                        Get ready for a flavor explosion! MiniMartBD's <?= htmlspecialchars($product['title']) ?> are not for the faint of heart. 
                        We start with the finest, locally-sourced potatoes, slice them to the perfect thickness, and kettle-cook them to a golden, crispy perfection. 
                        But the real magic is in our secret spice blend. A carefully guarded recipe of chili, paprika, and other exotic spices creates a 
                        multi-layered heat that builds with every bite, balanced by a savory, slightly smoky finish. Perfect for parties, movie nights, or 
                        whenever you need to add a little spice to your life.<br><br>
                        Kettle-cooked for extra crunch.<br>
                        Made with 100% natural potatoes.<br>
                        No artificial flavors or preservatives.<br>
                        A bold and spicy flavor that lingers.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
// Quantity Handler
document.querySelectorAll('.qty-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        let input = document.querySelector('.qty-input');
        let val = parseInt(input.value);
        if (this.dataset.action === 'plus') val++;
        if (this.dataset.action === 'minus' && val > 1) val--;
        input.value = val;
    });
});

// Add to Cart
document.getElementById('add-to-cart-btn').addEventListener('click', function() {
    const isLoggedIn = <?= isLoggedIn() ? 'true' : 'false' ?>;

    if (!isLoggedIn) {
        Swal.fire({
            icon: 'warning',
            title: 'Login Required',
            text: 'Please login to add items to your cart',
            confirmButtonText: 'Login Now'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php';
            }
        });
        return;
    }

    const quantity = document.querySelector('.qty-input').value;

    fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            id: <?= $product['id'] ?>,
            title: <?= json_encode($product['title']) ?>,
            price: <?= $product['price'] ?>,
            image: <?= json_encode($product['image']) ?>,
            quantity: quantity
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Added!', `${quantity} item(s) added to cart`, 'success');
        }
    });
});
</script>

</body>
</html>