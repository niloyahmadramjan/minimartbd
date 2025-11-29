<?php
require 'config.php';

// ---------- PAGINATION SETTINGS ----------
$itemsPerPage = 6;
$page         = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset       = ($page - 1) * $itemsPerPage;

// ---------- FETCH ALL PRODUCTS ----------
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://fakestoreapi.com/products");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // in case of localhost SSL issues
$response = curl_exec($ch);
curl_close($ch);

$allProducts  = $response ? json_decode($response, true) : [];
$totalProducts = count($allProducts);
$totalPages    = ceil($totalProducts / $itemsPerPage);

// Apply pagination
$products = array_slice($allProducts, $offset, $itemsPerPage);

// Categories for sidebar
$categories = array_unique(array_column($allProducts, 'category'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniMartBD - Shop All Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

<?php include_once("includes/header.php")?>
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-8">Shop All Products</h2>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Filters -->
        <aside class="lg:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow sticky top-24">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold">Filters</h3>
                    <a href="index.php" class="text-blue-600 text-sm hover:underline">Clear All</a>
                </div>

                <div class="mb-6">
                    <h4 class="font-medium mb-3">Categories</h4>
                    <?php foreach($categories as $cat): ?>
                        <label class="flex items-center mb-2">
                            <input type="checkbox" class="mr-3 category-filter rounded" value="<?= htmlspecialchars($cat) ?>">
                            <span class="capitalize text-gray-700">
                                <?= ucwords(str_replace(['-', '_'], ' ', $cat)) ?>
                                (<?= count(array_filter($allProducts, fn($p) => $p['category'] === $cat)) ?>)
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div>
                    <h4 class="font-medium mb-3">Price Range</h4>
                    <input type="range" min="0" max="1000" value="1000" class="w-full price-range accent-blue-600">
                    <div class="flex justify-between text-sm text-gray-600 mt-2">
                        <span>$0</span>
                        <span class="price-max">$1000</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Products + Pagination -->
        <div class="lg:col-span-3">
            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-600">
                    Showing <strong><?= count($products) ?></strong> of <strong><?= $totalProducts ?></strong> products
                </p>
                <select class="border border-gray-300 rounded-lg px-4 py-2 sort-select">
                    <option value="">Popular</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="rating">Highest Rated</option>
                </select>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="product-grid">
                <?php foreach($products as $product): ?>
                    <a href="product-detail.php?id=<?= $product['id'] ?>" class="group block">
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-2xl transition-all product-card"
                             data-price="<?= $product['price'] ?>"
                             data-rating="<?= $product['rating']['rate'] ?>"
                             data-category="<?= $product['category'] ?>">
                            <?php if($product['price'] < 50): ?>
                                <span class="absolute top-3 left-3 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full z-10">SALE</span>
                            <?php endif; ?>

                            <div class="p-6 bg-gray-50 group-hover:bg-gray-100 transition">
                                <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['title']) ?>" class="w-full h-64 object-contain mx-auto">
                            </div>

                            <div class="p-5">
                                <h3 class="font-medium text-lg mb-2 line-clamp-2 group-hover:text-blue-600">
                                    <?= htmlspecialchars($product['title']) ?>
                                </h3>
                                <div class="flex items-center gap-2 mb-3">
                                    <div class="flex text-yellow-400">
                                        <?php for($i=1;$i<=5;$i++): ?>
                                            <i class="fas fa-star <?= $i <= round($product['rating']['rate']) ? '' : '-half-alt text-gray-300' ?> text-sm"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <span class="text-sm text-gray-600">(<?= $product['rating']['count'] ?>)</span>
                                </div>
                                <div class="text-2xl font-bold text-blue-600 mb-4">
                                    $<?= number_format($product['price'], 2) ?>
                                </div>

                                <div class="flex gap-3">
                                    <button class="flex-1 bg-gray-100 text-gray-800 font-medium py-2.5 rounded-lg hover:bg-blue-600 hover:text-white transition">
                                        View Details
                                    </button>
                                    <button class="add-to-cart bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2.5 rounded-lg transition"
                                        data-id="<?= $product['id'] ?>"
                                        data-title="<?= htmlspecialchars($product['title']) ?>"
                                        data-price="<?= $product['price'] ?>"
                                        data-image="<?= $product['image'] ?>">
                                        <i class="fas fa-cart-plus mr-2"></i>Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
            <div class="flex justify-center mt-12">
                <nav class="flex items-center space-x-2">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?= $page-1 ?>" class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-100">Previous</a>
                    <?php else: ?>
                        <span class="px-4 py-2 bg-gray-100 text-gray-400 border rounded-lg cursor-not-allowed">Previous</span>
                    <?php endif; ?>

                    <?php for($i=1; $i<=$totalPages; $i++): ?>
                        <?php if($i == $page): ?>
                            <a href="?page=<?= $i ?>" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium"><?= $i ?></a>
                        <?php else: ?>
                            <a href="?page=<?= $i ?>" class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-100"><?= $i ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?= $page+1 ?>" class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-100">Next</a>
                    <?php else: ?>
                        <span class="px-4 py-2 bg-gray-100 text-gray-400 border rounded-lg cursor-not-allowed">Next</span>
                    <?php endif; ?>
                </nav>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
// Add to Cart (prevent going to detail page)
document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        if (<?= isLoggedIn() ? 'true' : 'false' ?> === false) {
            Swal.fire({
                icon: 'warning',
                title: 'Login Required',
                text: 'Please login to add items to cart',
                confirmButtonText: 'Login Now'
            }).then(res => { if(res.isConfirmed) location.href='login.php'; });
            return;
        }

        const product = {
            id: this.dataset.id,
            title: this.dataset.title,
            price: this.dataset.price,
            image: this.dataset.image,
            quantity: 1
        };

        fetch('add_to_cart.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(product)
        })
        .then(r => r.json())
        .then(data => {
            if(data.success) {
                Swal.fire({icon:'success', title:'Added!', text:'Item added to cart', timer:1500, showConfirmButton:false});
            }
        });
    });
});
</script>
</body>
</html>