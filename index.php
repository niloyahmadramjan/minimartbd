<?php include 'includes/header.php'; ?>
<?php include 'includes/hero_slider.php'; ?>  
<?php include 'includes/products.php'; ?>

<div class=" max-w-7xl mx-auto px-4">

<!-- ★★★★★ SECTION 1: MODERN CATEGORY GRID ★★★★★ -->
<section class="my-20">
    <div class="text-center mb-12">
        <h2 class="text-5xl font-extrabold text-gray-900 mb-3">Explore Our Collections</h2>
        <p class="text-gray-600 text-lg">Find exactly what you're looking for</p>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
        <?php
        $categories = [
            ['name'=>'Smartphones',     'icon'=>'fa-mobile-alt',      'bg'=>'from-blue-500 to-cyan-500',        'hover'=>'group-hover:scale-110'],
            ['name'=>'Laptops',         'icon'=>'fa-laptop',          'bg'=>'from-purple-500 to-pink-500',      'hover'=>'group-hover:rotate-6'],
            ['name'=>'Headphones',      'icon'=>'fa-headphones',      'bg'=>'from-orange-500 to-red-500',       'hover'=>'group-hover:-rotate-6'],
            ['name'=>'Smart Watch',     'icon'=>'fa-clock',           'bg'=>'from-teal-500 to-green-500',       'hover'=>'group-hover:scale-110'],
            ['name'=>'Speakers',        'icon'=>'fa-volume-up',       'bg'=>'from-indigo-500 to-purple-500',    'hover'=>'group-hover:rotate-6'],
            ['name'=>'Cameras',         'icon'=>'fa-camera',          'bg'=>'from-pink-500 to-rose-500',        'hover'=>'group-hover:scale-110'],
            ['name'=>'Gaming',          'icon'=>'fa-gamepad',         'bg'=>'from-violet-500 to-fuchsia-500',   'hover'=>'group-hover:-rotate-6'],
            ['name'=>'Accessories',     'icon'=>'fa-plug',            'bg'=>'from-emerald-500 to-lime-500',     'hover'=>'group-hover:scale-110'],
        ];
        foreach($categories as $cat): ?>
        <a href="pages/products.php?category=<?php echo strtolower($cat['name']); ?>" 
           class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 bg-white">
            <div class="p-8 text-center">
                <div class="bg-gradient-to-br <?php echo $cat['bg']; ?> w-20 h-20 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-lg transform transition-transform duration-300 <?php echo $cat['hover']; ?>">
                    <i class="fas <?php echo $cat['icon']; ?> text-4xl text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition"><?php echo $cat['name']; ?></h3>
                <p class="text-sm text-gray-500 mt-1">Explore Now</p>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- ★★★★★ SECTION 2: PREMIUM FLASH SALE ★★★★★ -->
<section class="my-20 relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 shadow-2xl">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDEzNGg0djRoLTR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-30"></div>
    <div class="relative py-16 px-8">
        <div class="text-center mb-8">
            <div class="inline-block bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-6 py-2 rounded-full text-sm font-bold mb-4 animate-pulse">
                ⚡ FLASH SALE ALERT
            </div>
            <h2 class="text-6xl font-black text-white mb-3 drop-shadow-lg">Mega Flash Sale</h2>
            <p class="text-2xl text-purple-200 font-semibold">Save up to 70% on Premium Products</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl mx-auto mb-8">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-xl">
                <div class="text-5xl font-black text-white" id="days">03</div>
                <div class="text-purple-200 text-sm font-semibold mt-2">Days</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-xl">
                <div class="text-5xl font-black text-white" id="hours">12</div>
                <div class="text-purple-200 text-sm font-semibold mt-2">Hours</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-xl">
                <div class="text-5xl font-black text-white" id="mins">45</div>
                <div class="text-purple-200 text-sm font-semibold mt-2">Minutes</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-xl">
                <div class="text-5xl font-black text-white" id="secs">28</div>
                <div class="text-purple-200 text-sm font-semibold mt-2">Seconds</div>
            </div>
        </div>
        
        <div class="text-center">
            <a href="pages/products.php?sale=true" class="inline-block bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold text-xl px-16 py-5 rounded-full shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300">
                SHOP SALE NOW <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- ★★★★★ SECTION 3: TRENDING & TOP PICKS ★★★★★ -->
<section class="my-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Best Sellers -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-cyan-600 p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold mb-2">🏆 Best Sellers</h3>
                        <p class="text-blue-100">Most loved by customers</p>
                    </div>
                    <i class="fas fa-trophy text-6xl opacity-20"></i>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <?php 
                $bestsellers = [
                    ['name'=>'iPhone 15 Pro Max', 'price'=>'1,299', 'rating'=>5],
                    ['name'=>'Samsung Galaxy S24', 'price'=>'999', 'rating'=>5],
                    ['name'=>'Sony WH-1000XM5', 'price'=>'399', 'rating'=>5],
                    ['name'=>'MacBook Pro M3', 'price'=>'1,999', 'rating'=>5]
                ];
                $rank = 1;
                foreach($bestsellers as $item): ?>
                <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl hover:shadow-md transition group">
                    <div class="bg-gradient-to-br from-blue-600 to-cyan-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg shadow-lg">
                        <?php echo $rank++; ?>
                    </div>
                    <div class="flex-1">
                        <p class="font-bold text-gray-800 group-hover:text-blue-600 transition"><?php echo $item['name']; ?></p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-blue-600 font-bold text-xl">$<?php echo $item['price']; ?></span>
                            <div class="flex text-yellow-400 text-xs">
                                <?php for($i=0; $i<$item['rating']; $i++): ?>
                                <i class="fas fa-star"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-fire text-orange-500 text-2xl"></i>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Hot Deals -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-600 to-red-600 p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold mb-2">🔥 Hot Deals</h3>
                        <p class="text-orange-100">Limited time offers</p>
                    </div>
                    <i class="fas fa-bolt text-6xl opacity-20"></i>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <?php 
                $hotdeals = [
                    ['name'=>'AirPods Pro 2', 'discount'=>35, 'stock'=>'12 left'],
                    ['name'=>'iPad Air M2', 'discount'=>25, 'stock'=>'8 left'],
                    ['name'=>'Canon EOS R6', 'discount'=>40, 'stock'=>'5 left'],
                    ['name'=>'PS5 Bundle', 'discount'=>20, 'stock'=>'15 left']
                ];
                foreach($hotdeals as $deal): ?>
                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-orange-50 to-red-50 rounded-xl hover:shadow-md transition group">
                    <div>
                        <p class="font-bold text-gray-800 group-hover:text-orange-600 transition"><?php echo $deal['name']; ?></p>
                        <p class="text-sm text-red-600 font-semibold mt-1">
                            <i class="fas fa-exclamation-circle"></i> Only <?php echo $deal['stock']; ?>
                        </p>
                    </div>
                    <div class="text-right">
                        <div class="bg-gradient-to-r from-red-600 to-orange-600 text-white px-5 py-2 rounded-full font-bold text-lg shadow-lg">
                            -<?php echo $deal['discount']; ?>%
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ★★★★★ NEW SECTION 4: WHY CHOOSE US ★★★★★ -->
<section class="my-20">
    <div class="text-center mb-12">
        <h2 class="text-5xl font-extrabold text-gray-900 mb-3">Why Shop With Us?</h2>
        <p class="text-gray-600 text-lg">Your satisfaction is our priority</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <?php
        $benefits = [
            ['icon'=>'fa-shipping-fast', 'title'=>'Free Shipping', 'desc'=>'On orders over $50', 'color'=>'from-blue-500 to-cyan-500'],
            ['icon'=>'fa-shield-alt', 'title'=>'Secure Payment', 'desc'=>'100% protected', 'color'=>'from-green-500 to-emerald-500'],
            ['icon'=>'fa-undo', 'title'=>'Easy Returns', 'desc'=>'30-day guarantee', 'color'=>'from-purple-500 to-pink-500'],
            ['icon'=>'fa-headset', 'title'=>'24/7 Support', 'desc'=>'Always here for you', 'color'=>'from-orange-500 to-red-500']
        ];
        foreach($benefits as $benefit): ?>
        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 text-center group">
            <div class="bg-gradient-to-br <?php echo $benefit['color']; ?> w-20 h-20 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                <i class="fas <?php echo $benefit['icon']; ?> text-3xl text-white"></i>
            </div>
            <h4 class="text-xl font-bold text-gray-800 mb-2"><?php echo $benefit['title']; ?></h4>
            <p class="text-gray-600"><?php echo $benefit['desc']; ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ★★★★★ NEW SECTION 5: FEATURED BRANDS ★★★★★ -->
<section class="my-20 bg-gradient-to-br from-gray-50 to-blue-50 rounded-3xl py-16 px-8">
    <div class="text-center mb-12">
        <h2 class="text-5xl font-extrabold text-gray-900 mb-3">Trusted Brands</h2>
        <p class="text-gray-600 text-lg">We partner with the world's leading manufacturers</p>
    </div>
    <div class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-10 gap-6">
        <?php
        $brands = ['apple.com', 'samsung.com', 'sony.com', 'xiaomi.com', 'dell.com', 'hp.com', 'lenovo.com', 'logitech.com', 'jbl.com', 'bose.com'];
        foreach($brands as $brand): ?>
        <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center">
            <img src="https://logo.clearbit.com/<?php echo $brand; ?>" alt="<?php echo $brand; ?>" class="h-12 w-auto grayscale hover:grayscale-0 transition-all duration-300">
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ★★★★★ NEW SECTION 6: CUSTOMER TESTIMONIALS ★★★★★ -->
<section class="my-20">
    <div class="text-center mb-12">
        <h2 class="text-5xl font-extrabold text-gray-900 mb-3">What Customers Say</h2>
        <p class="text-gray-600 text-lg">Real reviews from real people</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php
        $testimonials = [
            ['name'=>'Rahim Khan', 'location'=>'Dhaka', 'review'=>'Amazing service! Got my iPhone delivered within 24 hours. Authentic product with warranty.', 'rating'=>5, 'avatar'=>'RK'],
            ['name'=>'Ayesha Siddika', 'location'=>'Chittagong', 'review'=>'Best prices in Bangladesh! Bought a MacBook and got a free case plus screen protector.', 'rating'=>5, 'avatar'=>'AS'],
            ['name'=>'Kamal Ahmed', 'location'=>'Sylhet', 'review'=>'Customer support is outstanding. They helped me choose the perfect laptop for my needs.', 'rating'=>5, 'avatar'=>'KA']
        ];
        foreach($testimonials as $review): ?>
        <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-gradient-to-br from-blue-500 to-purple-500 w-16 h-16 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                    <?php echo $review['avatar']; ?>
                </div>
                <div>
                    <p class="font-bold text-gray-800 text-lg"><?php echo $review['name']; ?></p>
                    <p class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt"></i> <?php echo $review['location']; ?></p>
                </div>
            </div>
            <div class="flex text-yellow-400 mb-4">
                <?php for($i=0; $i<$review['rating']; $i++): ?>
                <i class="fas fa-star"></i>
                <?php endfor; ?>
            </div>
            <p class="text-gray-600 italic leading-relaxed">"<?php echo $review['review']; ?>"</p>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <span class="text-green-600 text-sm font-semibold"><i class="fas fa-check-circle"></i> Verified Purchase</span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ★★★★★ NEW SECTION 7: NEWSLETTER SIGNUP ★★★★★ -->
<section class="my-20 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-3xl overflow-hidden shadow-2xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div class="p-12 text-white">
            <h2 class="text-5xl font-black mb-4">Stay in the Loop! 📧</h2>
            <p class="text-xl text-purple-100 mb-8">Subscribe to get exclusive deals, new arrivals, and special offers delivered to your inbox!</p>
            <ul class="space-y-3 text-lg">
                <li><i class="fas fa-check-circle text-green-300 mr-2"></i> Early access to sales</li>
                <li><i class="fas fa-check-circle text-green-300 mr-2"></i> Exclusive discount codes</li>
                <li><i class="fas fa-check-circle text-green-300 mr-2"></i> New product launches</li>
            </ul>
        </div>
        <div class="p-12 bg-white/10 backdrop-blur-lg">
            <form class="space-y-4">
                <div>
                    <input type="text" placeholder="Your Name" class="w-full px-6 py-4 rounded-xl border-2 border-white/30 bg-white/20 text-white placeholder-white/70 focus:outline-none focus:border-white transition">
                </div>
                <div>
                    <input type="email" placeholder="Your Email Address" class="w-full px-6 py-4 rounded-xl border-2 border-white/30 bg-white/20 text-white placeholder-white/70 focus:outline-none focus:border-white transition">
                </div>
                <button type="submit" class="w-full bg-white text-purple-600 font-bold text-lg px-8 py-4 rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    Subscribe Now <i class="fas fa-paper-plane ml-2"></i>
                </button>
                <p class="text-sm text-purple-100 text-center">🔒 We respect your privacy. Unsubscribe anytime.</p>
            </form>
        </div>
    </div>
</section>

</div>

<!-- Enhanced Countdown Timer Script -->
<script>
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
    
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("days").innerHTML = "00";
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("mins").innerHTML = "00";
        document.getElementById("secs").innerHTML = "00";
    }
}, 1000);
</script>

<?php include 'includes/footer.php'; ?>