<?php include '../includes/header.php'; ?>
<?php
// Sample products data (later connect with MySQL)
$products = [
    1 => [
        'id' => 1,
        'name' => 'New Featured MacBook Pro',
        'brand' => 'Apple',
        'desc' => 'With Apple M2 Pro Chip - 16GB RAM, 512GB SSD',
        'price' => 1299.00,
        'old_price' => 1499.00,
        'rating' => 5,
        'reviews' => 124,
        'image' => 'assets/images/macbook.png',
        'badge' => 'Best Seller',
        'category' => 'laptops'
    ],
    2 => [
        'id' => 2,
        'name' => 'Sony WH-1000XM5 Noise Cancelling Headphones',
        'brand' => 'Sony',
        'desc' => 'Industry Leading Noise Cancellation - 30hr Battery',
        'price' => 349.99,
        'old_price' => 399.99,
        'rating' => 5,
        'reviews' => 892,
        'image' => 'assets/images/item2.png',
        'badge' => '-50% OFF',
        'category' => 'headphones'
    ],
    3 => [
        'id' => 3,
        'name' => 'Apple Watch Series 9',
        'brand' => 'Apple',
        'desc' => 'GPS + Cellular - Always-On Retina Display',
        'price' => 449.00,
        'old_price' => 499.00,
        'rating' => 5,
        'reviews' => 567,
        'image' => 'assets/images/item1.png',
        'badge' => 'New Arrival',
        'category' => 'smartwatches'
    ],
    4 => [
        'id' => 4,
        'name' => 'Razer Blade 16 Gaming Laptop',
        'brand' => 'Razer',
        'desc' => 'RTX 4080 - 240Hz QHD+ Display - RGB Keyboard',
        'price' => 2799.00,
        'old_price' => 3299.00,
        'rating' => 4,
        'reviews' => 89,
        'image' => 'assets/images/item3.png',
        'badge' => 'Limited Stock',
        'category' => 'laptops'
    ],
    5 => [
        'id' => 5,
        'name' => 'Samsung Galaxy S24 Ultra',
        'brand' => 'Samsung',
        'desc' => '200MP Camera - S Pen - Titanium Frame',
        'price' => 1199.00,
        'old_price' => 1399.00,
        'rating' => 5,
        'reviews' => 1203,
        'image' => 'assets/images/item4.png',
        'badge' => 'Hot Deal',
        'category' => 'smartphones'
    ],
    6 => [
        'id' => 6,
        'name' => 'Bose QuietComfort Ultra Earbuds',
        'brand' => 'Bose',
        'desc' => 'Spatial Audio - World-Class Noise Cancellation',
        'price' => 299.00,
        'old_price' => null,
        'rating' => 5,
        'reviews' => 412,
        'image' => 'assets/images/earbuds.png',
        'category' => 'headphones'
    ],
    7 => [
        'id' => 7,
        'name' => 'JBL Flip 6 Portable Speaker',
        'brand' => 'JBL',
        'desc' => 'Waterproof - 12hr Playtime - PartyBoost',
        'price' => 129.99,
        'old_price' => 149.99,
        'rating' => 4,
        'reviews' => 892,
        'image' => 'assets/images/speaker.png',
        'category' => 'speakers'
    ],
    8 => [
        'id' => 8,
        'name' => 'DJI Mini 4 Pro Drone',
        'brand' => 'DJI',
        'desc' => '4K 60fps - Under 249g - 34min Flight',
        'price' => 759.00,
        'old_price' => null,
        'rating' => 5,
        'reviews' => 234,
        'image' => 'assets/images/drone.png',
        'badge' => 'Trending',
        'category' => 'cameras'
    ]
];
?>

<div class="container mx-auto px-4 py-12">
    <h2 class="text-4xl font-bold text-center mb-8">Trending Products</h2>

    <!-- Category Tabs -->
    <!-- <div class="flex justify-center space-x-4 mb-10 flex-wrap">
        <button class="px-8 py-3 rounded-full font-semibold text-white bg-emerald-600 hover:bg-emerald-700 transition">Electronics</button>
        <button class="px-8 py-3 rounded-full font-semibold bg-gray-200 hover:bg-gray-300 transition">Smart Devices</button>
        <button class="px-8 py-3 rounded-full font-semibold bg-gray-200 hover:bg-gray-300 transition">Gadgets</button>
    </div> -->

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
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