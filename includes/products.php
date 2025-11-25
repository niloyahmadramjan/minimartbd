<?php include '../includes/header.php'; ?>
<?php
// Sample products data (later connect with MySQL)
$products = [
    [
        'id' => 1,
        'name' => 'New Featured MacBook Pro',
        'brand' => 'Cartify',
        'desc' => 'With Apple M1 Pro Chip',
        'price' => 200.00,
        'old_price' => null,
        'rating' => 4,
        'reviews' => 3,
        'image' => 'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/1-home_default/new-featured-macbook-pro.jpg',
        'category' => 'electronics'
    ],
    [
        'id' => 2,
        'name' => 'Rumbloo Silicone Controller Grip Cover for Oculus Quest 2',
        'brand' => 'EcomZone',
        'desc' => 'Comfortable grip & protection',
        'price' => 130.00,
        'old_price' => null,
        'rating' => 5,
        'reviews' => 2,
        'image' => 'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/2-home_default/rumbloo-silicone-controller-grip-cover.jpg',
        'category' => 'gadgets'
    ],
    [
        'id' => 3,
        'name' => 'The best is yet to come Framed poster',
        'brand' => 'EcoShop',
        'desc' => 'Premium framed artwork',
        'price' => 150.00,
        'old_price' => null,
        'rating' => 5,
        'reviews' => 5,
        'image' => 'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/3-home_default/the-best-is-yet-to-come-framed-poster.jpg',
        'category' => 'gadgets'
    ],
    [
        'id' => 4,
        'name' => 'Samsung QN85AA Series Neo QLED 4K UHD Smart TV',
        'brand' => 'MegaMart',
        'desc' => '85-inch Quantum HDR 32X',
        'price' => 190.00,
        'old_price' => null,
        'rating' => 4,
        'reviews' => 3,
        'image' => 'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/4-home_default/samsung-qn85aa-series-neo-qled.jpg',
        'category' => 'electronics'
    ],
    [
        'id' => 5,
        'name' => 'Apple AirPods Max Bluetooth Headset',
        'brand' => 'SmartShop',
        'desc' => 'Active Noise Cancellation',
        'price' => 175.50,
        'old_price' => 195.00,
        'rating' => 5,
        'reviews' => 3,
        'image' => 'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/5-home_default/apple-airpods-max.jpg',
        'category' => 'headphones',
        'countdown' => true
    ]
];
?>

<div class="container mx-auto px-4 py-12">
    <h2 class="text-4xl font-bold text-center mb-8">Trending Products</h2>

    <!-- Category Tabs -->
    <div class="flex justify-center space-x-4 mb-10 flex-wrap">
        <button class="px-8 py-3 rounded-full font-semibold text-white bg-emerald-600 hover:bg-emerald-700 transition">Electronics</button>
        <button class="px-8 py-3 rounded-full font-semibold bg-gray-200 hover:bg-gray-300 transition">Smart Devices</button>
        <button class="px-8 py-3 rounded-full font-semibold bg-gray-200 hover:bg-gray-300 transition">Gadgets</button>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
        <?php foreach ($products as $p): ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                <div class="relative">
                    <a href="productDetails.php?id=<?php echo $p['id']; ?>">
                        <img src="<?php echo $p['image']; ?>" alt="<?php echo $p['name']; ?>" class="w-full h-48 object-contain p-6 group-hover:scale-110 transition">
                    </a>
                    <?php if(isset($p['countdown'])): ?>
                        <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded text-sm font-bold">-10%</div>
                    <?php endif; ?>
                </div>

                <div class="p-5 text-center">
                    <p class="text-xs text-gray-500"><?php echo $p['brand']; ?></p>
                    <h3 class="font-semibold text-lg mt-1 line-clamp-2 h-14">
                        <a href="productDetails.php?id=<?php echo $p['id']; ?>" class="hover:text-emerald-600">
                            <?php echo $p['name']; ?>
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 mt-2"><?php echo $p['desc']; ?></p>

                    <!-- Rating -->
                    <div class="flex justify-center mt-3">
                        <?php for($i=1; $i<=5; $i++): ?>
                            <span class="<?php echo $i <= $p['rating'] ? 'text-yellow-400' : 'text-gray-300'; ?> text-xl">★</span>
                        <?php endfor; ?>
                        <span class="text-sm text-gray-500 ml-2">(<?php echo $p['reviews']; ?>)</span>
                    </div>

                    <!-- Price -->
                    <div class="mt-4 text-2xl font-bold text-emerald-600">
                        $<?php echo number_format($p['price'], 2); ?>
                        <?php if($p['old_price']): ?>
                            <span class="text-sm line-through text-gray-400 ml-2">$<?php echo number_format($p['old_price'], 2); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Countdown (only for last product) -->
                    <?php if(isset($p['countdown'])): ?>
                        <div class="grid grid-cols-4 gap-2 mt-4 text-center text-xs">
                            <div><strong id="days">783</strong><br>DAYS</div>
                            <div><strong id="hours">09</strong><br>HRS</div>
                            <div><strong id="mins">22</strong><br>MIN</div>
                            <div><strong id="secs">52</strong><br>SEC</div>
                        </div>
                    <?php endif; ?>

                    <!-- Add to Cart Button -->
                    <button onclick="addToCart(<?php echo $p['id']; ?>, '<?php echo addslashes($p['name']); ?>', <?php echo $p['price']; ?>)"
                            class="mt-5 w-full bg-gray-200 hover:bg-emerald-600 hover:text-white text-gray-700 font-semibold py-3 rounded-full transition">
                        ADD TO CART
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
// Simple Add to Cart (Session-based)
function addToCart(id, name, price) {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    let existing = cart.find(item => item.id === id);
    if (existing) {
        existing.qty += 1;
        alert('Quantity updated!');
    } else {
        cart.push({id, name, price, qty: 1});
        alert(name + ' added to cart!');
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
}

function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    let total = cart.reduce((sum, item) => sum + item.qty, 0);
    document.querySelectorAll('.cart-count').forEach(el => el.textContent = total);
}
// Run on load
updateCartCount();
</script>

<?php include '../includes/footer.php'; ?>