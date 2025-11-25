<?php include 'includes/header.php'; ?>

<?php
// Dummy product data (real project e database theke niba)
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

$id = $_GET['id'] ?? 1;
$product = $products[$id] ?? null;

if (!$product) {
    echo '<div class="container mx-auto px-4 py-20 text-center"><h2 class="text-3xl font-bold text-red-600">Product Not Found!</h2></div>';
    include '../includes/footer.php';
    exit;
}
?>

<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        <!-- Image -->
        <div>
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="w-full rounded-2xl shadow-2xl">
        </div>

        <!-- Details -->
        <div class="space-y-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900"><?php echo $product['name']; ?></h1>
                <p class="text-gray-600 mt-3"><?php echo $product['desc']; ?></p>
            </div>

            <!-- Rating -->
            <div class="flex items-center space-x-3">
                <?php for($i=1;$i<=5;$i++): ?>
                    <span class="<?php echo $i<=$product['rating']?'text-yellow-400':'text-gray-300'; ?> text-2xl">★</span>
                <?php endfor; ?>
                <span class="text-gray-500">(<?php echo $product['reviews']; ?> Reviews)</span>
            </div>

            <!-- Price -->
            <div class="text-5xl font-bold text-emerald-600">
                $<?php echo number_format($product['price'],2); ?>
                <?php if($product['old_price']): ?>
                    <span class="text-2xl line-through text-gray-400 ml-4">$<?php echo number_format($product['old_price'],2); ?></span>
                <?php endif; ?>
            </div>

            <!-- Quantity + Add to Cart -->
            <div class="flex items-center space-x-6">
                <div class="flex items-center border-2 border-gray-300 rounded-lg">
                    <button onclick="this.nextElementSibling.value--;" class="px-5 py-3 hover:bg-gray-100">-</button>
                    <input type="number" value="1" min="1" class="w-20 text-center py-3 font-semibold" id="qty">
                    <button onclick="this.previousElementSibling.value++;" class="px-5 py-3 hover:bg-gray-100">+</button>
                </div>
                <button onclick="addToCart(<?php echo $product['id']; ?>, '<?php echo addslashes($product['name']); ?>', <?php echo $product['price']; ?>)"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 px-12 rounded-full text-lg transition shadow-lg">
                    ADD TO CART
                </button>
            </div>

            <div class="border-t pt-6 text-gray-600 space-y-2">
                <p>Brand: <strong><?php echo $product['brand']; ?></strong></p>
                <p>Availability: <strong class="text-emerald-600">In Stock</strong></p>
            </div>
        </div>
    </div>
</div>

<script>
function addToCart(id, name, price) {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    let qty = parseInt(document.getElementById('qty').value);
    let existing = cart.find(item => item.id == id);
    if (existing) {
        existing.qty += qty;
    } else {
        cart.push({id, name, price, qty});
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    alert(qty + ' × ' + name + ' added to cart!');
    updateCartCount();
}
function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    let total = cart.reduce((sum, i) => sum + i.qty, 0);
    document.querySelectorAll('.cart-count').forEach(el => el.textContent = total);
}
updateCartCount();
</script>

<?php include '../includes/footer.php'; ?>