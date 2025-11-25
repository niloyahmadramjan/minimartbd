<?php include 'includes/header.php'; ?>
<?php include 'includes/hero_slider.php'; ?>  
<?php include 'includes/products.php'; ?>

<div class="container mx-auto px-4">

<!-- ★★★★★ SECTION 1: CATEGORY BANNER GRID (8 Categories) ★★★★★ -->
<section class="my-16">
    <h2 class="text-4xl font-bold text-center mb-10">Shop by Category</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <?php
        $categories = [
            ['name'=>'Smartphones',     'icon'=>'fa-mobile-alt',      'color'=>'emerald'],
            ['name'=>'Laptops',         'icon'=>'fa-laptop',          'color'=>'blue'],
            ['name'=>'Headphones',      'icon'=>'fa-headphones',      'color'=>'purple'],
            ['name'=>'Smart Watch',     'icon'=>'fa-clock',           'color'=>'pink'],
            ['name'=>'Speakers',        'icon'=>'fa-volume-up',       'color'=>'red'],
            ['name'=>'Cameras',         'icon'=>'fa-camera',          'color'=>'yellow'],
            ['name'=>'Gaming',          'icon'=>'fa-gamepad',         'color'=>'indigo'],
            ['name'=>'Accessories',     'icon'=>'fa-plug',            'color'=>'green'],
        ];
        foreach($categories as $cat): ?>
        <a href="pages/products.php?category=<?php echo strtolower($cat['name']); ?>" 
           class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-br from-<?php echo $cat['color']; ?>-600 to-<?php echo $cat['color']; ?>-800 opacity-90"></div>
            <div class="relative p-10 text-center text-white">
                <i class="fas <?php echo $cat['icon']; ?> text-6xl mb-4"></i>
                <h3 class="text-xl font-bold"><?php echo $cat['name']; ?></h3>
            </div>
            <div class="absolute inset-0 border-4 border-white opacity-0 group-hover:opacity-100 transition rounded-2xl"></div>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- ★★★★★ SECTION 2: FLASH SALE WITH COUNTDOWN ★★★★★ -->
<section class="bg-red-600 text-white rounded-3xl py-12 my-16 overflow-hidden relative">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative container mx-auto px-8 text-center">
        <h2 class="text-5xl font-bold mb-4">Flash Sale – Up to 70% OFF!</h2>
        <p class="text-xl mb-8">Limited time only • Ends in</p>
        <div class="grid grid-cols-4 gap-4 max-w-2xl mx-auto text-4xl font-bold">
            <div class="bg-white text-red-600 rounded-xl py-6"><span id="days">03</span><br><small>Days</small></div>
            <div class="bg-white text-red-600 rounded-xl py-6"><span id="hours">12</span><br><small>Hours</small></div>
            <div class="bg-white text-red-600 rounded-xl py-6"><span id="mins">45</span><br><small>Mins</small></div>
            <div class="bg-white text-red-600 rounded-xl py-6"><span id="secs">28</span><br><small>Secs</small></div>
        </div>
        <a href="pages/products.php?sale=true" class="inline-block mt-8 bg-white text-red-600 font-bold text-xl px-12 py-5 rounded-full hover:bg-gray-100 transition">
            SHOP NOW
        </a>
    </div>
</section>

<!-- ★★★★★ SECTION 3: BEST SELLERS + HOT DEALS (2 Tabs) ★★★★★ -->
<section class="my-16">
    <div class="text-center mb-10">
        <h2 class="text-4xl font-bold">Best Sellers & Hot Deals</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Best Sellers -->
        <div class="bg-gradient-to-br from-emerald-500 to-emerald-700 text-white rounded-3xl p-8 shadow-2xl">
            <h3 class="text-3xl font-bold mb-6 flex items-center"><i class="fas fa-crown mr-3 text-yellow-400"></i> Best Sellers</h3>
            <?php for($i=1;$i<=4;$i++): ?>
            <div class="flex items-center space-x-4 bg-white bg-opacity-20 rounded-xl p-4 mb-4 hover:bg-opacity-30 transition">
                <div class="bg-white text-emerald-600 w-12 h-12 rounded-full flex items-center justify-center font-bold"><?php echo $i; ?></div>
                <div>
                    <p class="font-semibold">Premium Wireless Headphone</p>
                    <p class="text-2xl">$99.<sup>99</sup></p>
                </div>
                <i class="fas fa-fire text-orange-400 text-2xl ml-auto"></i>
            </div>
            <?php endfor; ?>
            <a href="#" class="block text-center mt-6 font-bold underline hover:no-underline">View All →</a>
        </div>

        <!-- Hot Deals -->
        <div class="bg-gradient-to-br from-purple-600 to-pink-600 text-white rounded-3xl p-8 shadow-2xl">
            <h3 class="text-3xl font-bold mb-6 flex items-center"><i class="fas fa-bolt mr-3 text-yellow-300"></i> Hot Deals Today</h3>
            <?php 
            $deals = ['AirPods Pro','MacBook Air M2','Sony Camera','iPhone 15 Pro'];
            foreach($deals as $deal): ?>
            <div class="flex items-center justify-between bg-white bg-opacity-20 rounded-xl p-5 mb-4 hover:bg-opacity-30 transition">
                <div>
                    <p class="font-bold"><?php echo $deal; ?></p>
                    <p class="text-sm opacity-90">Limited Stock!</p>
                </div>
                <span class="bg-red-500 px-4 py-2 rounded-full text-sm font-bold">-<?php echo rand(20,60); ?>%</span>
            </div>
            <?php endforeach; ?>
            <a href="#" class="block text-center mt-6 font-bold underline hover:no-underline">Grab Now →</a>
        </div>
    </div>
</section>

<!-- ★★★★★ SECTION 4: FEATURED BRANDS + TESTIMONIALS ★★★★★ -->
<section class="my-16 bg-gray-100 rounded-3xl py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Brands -->
        <div class="text-center">
            <h2 class="text-4xl font-bold mb-10">We Work With Top Brands</h2>
            <div class="grid grid-cols-3 md:grid-cols-5 gap-8 opacity-70">
                <img src="https://logo.clearbit.com/apple.com" alt="Apple" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://logo.clearbit.com/samsung.com" alt="Samsung" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://logo.clearbit.com/sony.com" alt="Sony" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://logo.clearbit.com/xiaomi.com" alt="Xiaomi" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://logo.clearbit.com/dell.com" alt="Dell" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://logo.clearbit.com/hp.com" alt="HP" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://logo.clearbit.com/lenovo.com" alt="Lenovo" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://logo.clearbit.com/logitech.com" alt="Logitech" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://logo.clearbit.com/jbl.com" alt="JBL" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://logo.clearbit.com/bose.com" alt="Bose" class="h-16 mx-auto grayscale hover:grayscale-0 transition">
            </div>
        </div>

        <!-- Testimonials -->
        <div class="bg-white rounded-3xl shadow-2xl p-10">
            <h2 class="text-4xl font-bold text-center mb-10">What Our Customers Say</h2>
            <div class="space-y-8">
                <div class="text-center">
                    <p class="text-lg italic">"Best online store in Bangladesh! Super fast delivery & original products"</p>
                    <div class="flex justify-center mt-4"><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i></div>
                    <p class="font-bold mt-3">— Rahim Khan, Dhaka</p>
                </div>
                <div class="text-center">
                    <p class="text-lg italic">"Got my iPhone 15 Pro at the lowest price + free case!"</p>
                    <div class="flex justify-center mt-4"><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i></div>
                    <p class="font-bold mt-3">— Ayesha Siddika, Chittagong</p>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

<!-- Countdown Timer Script -->
<script>
// Flash Sale Countdown (3 days from now)
let countdownDate = new Date().getTime() + (3*24*60*60*1000);
let x = setInterval(function() {
    let now = new Date().getTime();
    let distance = countdownDate - now;
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
    document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
    document.getElementById("mins").innerHTML = minutes.toString().padStart(2, '0');
    document.getElementById("secs").innerHTML = seconds.toString().padStart(2, '0');
    
    if (distance < 0) clearInterval(x);
}, 1000);
</script>

<?php include 'includes/footer.php'; ?>