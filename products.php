<?php
require 'config.php';

// Fetch products from FakeStoreAPI
$products = [];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://fakestoreapi.com/products");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

if ($response) {
    $products = json_decode($response, true);
}

// Group by category for filter
$categories = array_unique(array_column($products, 'category'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>MiniMartBD - Shop All Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-50">

<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-blue-600">MiniMartBD</h1>
                <nav class="ml-10 hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-blue-600">Home</a>
                    <a href="#" class="text-gray-900 font-medium">Shop</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Deals</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">About Us</a>
                </nav>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search products..." class="pl-10 pr-4 py-2 border rounded-lg w-64 hidden lg:block"/>
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <?php if (isLoggedIn()): ?>
                    <span class="text-sm text-gray-700">Hi, <?= $_SESSION['username'] ?></span>
                    <a href="logout.php" class="text-red-600 text-sm">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">Login</a>
                <?php endif; ?>
                <a href="#" class="relative">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                </a>
            </div>
        </div>
    </div>
</header>

<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-8">Shop All Products</h2>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Filters Sidebar -->
        <aside class="lg:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold">Filters</h3>
                    <button class="text-blue-600 text-sm">Clear All</button>
                </div>

                <div class="mb-6">
                    <h4 class="font-medium mb-3">Categories</h4>
                    <?php foreach($categories as $cat): ?>
                        <label class="flex items-center mb-2">
                            <input type="checkbox" class="mr-3 category-filter" value="<?= htmlspecialchars($cat) ?>">
                            <span class="capitalize"><?= ucwords(str_replace('-', ' ', $cat)) ?> (<?= count(array_filter($products, fn($p) => $p['category'] === $cat)) ?>)</span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div>
                    <h4 class="font-medium mb-3">Price Range</h4>
                    <input type="range" min="0" max="1000" value="1000" class="w-full price-range">
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>$0</span>
                        <span class="price-max">$1000</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Product Grid -->
        <div class="lg:col-span-3">
            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-600">Showing <strong><?= count($products) ?></strong> products</p>
                <select class="border rounded-lg px-4 py-2 sort-select">
                    <option>Popular</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="rating">Highest Rated</option>
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 product-grid">
                <?php foreach($products as $product): ?>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition product-card" 
                         data-price="<?= $product['price'] ?>" 
                         data-rating="<?= $product['rating']['rate'] ?>" 
                         data-category="<?= $product['category'] ?>">
                        <?php if($product['price'] < 30): ?>
                            <span class="absolute top-4 left-4 bg-green-500 text-white text-xs px-3 py-1 rounded-full">SALE</span>
                        <?php endif; ?>
                        <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['title']) ?>" 
                             class="w-full h-64 object-contain p-6 bg-gray-50">
                        <div class="p-4">
                            <h3 class="font-medium text-lg mb-2 line-clamp-2"><?= htmlspecialchars($product['title']) ?></h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    <?php for($i=1; $i<=5; $i++): ?>
                                        <i class="fas fa-star <?= $i <= round($product['rating']['rate']) ? '' : '-half-alt text-gray-300' ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-sm text-gray-600 ml-2">(<?= $product['rating']['count'] ?>)</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-blue-600">$<?= number_format($product['price'], 2) ?></span>
                                <button 
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-medium add-to-cart"
                                    data-id="<?= $product['id'] ?>"
                                    data-title="<?= htmlspecialchars($product['title']) ?>"
                                    data-price="<?= $product['price'] ?>"
                                    data-image="<?= $product['image'] ?>">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', function() {
        const isLoggedIn = <?= isLoggedIn() ? 'true' : 'false' ?>;

        if (!isLoggedIn) {
            Swal.fire({
                icon: 'warning',
                title: 'Login Required',
                text: 'Please login to add items to cart',
                confirmButtonText: 'Login Now',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
            return;
        }

        const product = {
            id: this.dataset.id,
            title: this.dataset.title,
            price: this.dataset.price,
            image: this.dataset.image
        };

        fetch('add_to_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(product)
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                Swal.fire('Added!', 'Product added to cart', 'success');
            }
        });
    });
});

// Filtering & Sorting
document.querySelectorAll('.category-filter').forEach(cb => {
    cb.addEventListener('change', filterProducts);
});
document.querySelector('.price-range').addEventListener('input', function() {
    document.querySelector('.price-max').textContent = '$' + this.value;
    filterProducts();
});
document.querySelector('.sort-select').addEventListener('change', filterProducts);

function filterProducts() {
    const selectedCats = Array.from(document.querySelectorAll('.category-filter:checked')).map(cb => cb.value);
    const maxPrice = document.querySelector('.price-range').value;
    const sortBy = document.querySelector('.sort-select').value;

    const cards = document.querySelectorAll('.product-card');

    cards.forEach(card => {
        const price = parseFloat(card.dataset.price);
        const category = card.dataset.category;

        const matchesCat = selectedCats.length === 0 || selectedCats.includes(category);
        const matchesPrice = price <= maxPrice;

        card.style.display = matchesCat && matchesPrice ? '' : 'none';
    });

    // Sorting
    const grid = document.querySelector('.product-grid');
    const items = Array.from(cards);

    items.sort((a, b) => {
        if (sortBy === 'price-low') return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
        if (sortBy === 'price-high') return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
        if (sortBy === 'rating') return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
        return 0;
    });

    items.forEach(item => grid.appendChild(item));
}
</script>
</body>
</html>