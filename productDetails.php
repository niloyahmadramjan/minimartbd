<?php include 'includes/header.php'; ?>

<?php
// Dummy product data (real project e database theke niba)
$products = [
    1 => ['id'=>1, 'name'=>'New Featured MacBook Pro', 'brand'=>'Cartify', 'desc'=>'With Apple M1 Pro Chip', 'price'=>200.00, 'old_price'=>null, 'rating'=>4, 'reviews'=>3, 'image'=>'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/1-home_default/new-featured-macbook-pro.jpg'],
    2 => ['id'=>2, 'name'=>'Rumbloo Silicone Controller Grip', 'brand'=>'EcomZone', 'desc'=>'For Oculus Quest 2', 'price'=>130.00, 'old_price'=>null, 'rating'=>5, 'reviews'=>2, 'image'=>'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/2-home_default/rumbloo-silicone-controller-grip-cover.jpg'],
    3 => ['id'=>3, 'name'=>'The best is yet to come Framed poster', 'brand'=>'EcoShop', 'desc'=>'Premium artwork', 'price'=>150.00, 'old_price'=>null, 'rating'=>5, 'reviews'=>5, 'image'=>'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/3-home_default/the-best-is-yet-to-come-framed-poster.jpg'],
    4 => ['id'=>4, 'name'=>'Samsung QN85AA Neo QLED TV', 'brand'=>'MegaMart', 'desc'=>'85-inch 4K Smart TV', 'price'=>190.00, 'old_price'=>null, 'rating'=>4, 'reviews'=>3, 'image'=>'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/4-home_default/samsung-qn85aa-series-neo-qled.jpg'],
    5 => ['id'=>5, 'name'=>'Apple AirPods Max', 'brand'=>'SmartShop', 'desc'=>'Bluetooth Headset', 'price'=>175.50, 'old_price'=>195.00, 'rating'=>5, 'reviews'=>3, 'image'=>'https://prestashop.codezeel.com/PRS23/PRS230557/default/en/5-home_default/apple-airpods-max.jpg']
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