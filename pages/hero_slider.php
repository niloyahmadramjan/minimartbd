<?php
// Hero Slider Data - 4 Slides
$slides = [
    [
        'image' => 'assets/images/item2.png',
        'headline' => 'AMAZING TIME OFFER!',
        'subheadline' => 'Upto 50% Discount<br>On Noise Cancelling Headphones',
        'button_text' => 'SHOP NOW',
        'button_link' => 'pages/products.php?category=headphones',
        'category' => 'Headphones'
    ],
    [
        'image' => 'assets/images/item1.png',
        'headline' => 'PREMIUM SMARTWATCHES!',
        'subheadline' => 'Upto 40% Off<br>Premium Smartwatches',
        'button_text' => 'SHOP NOW',
        'button_link' => 'pages/products.php?category=smartwatches',
        'category' => 'Smartwatches'
    ],
    [
        'image' => 'assets/images/item3.png',
        'headline' => 'LIMITED TIME DEAL!',
        'subheadline' => 'Upto 30% Discount<br>On Gaming Laptops',
        'button_text' => 'SHOP NOW',
        'button_link' => 'pages/products.php?category=laptops',
        'category' => 'Laptops'
    ],
    [
        'image' => 'assets/images/item4.png',
        'headline' => 'FLASH SALE ALERT!',
        'subheadline' => 'Upto 35% Discount<br>On Latest Smartphones',
        'button_text' => 'SHOP NOW',
        'button_link' => 'pages/products.php?category=smartphones',
        'category' => 'Smartphones'
    ]
];
?>

<!-- Hero Slider Section -->
<section class="relative overflow-hidden bg-white">
    <div class="container mx-auto px-4 py-8">
        <!-- Slider Container -->
        <div id="heroSlider" class="relative h-96 md:h-[500px] lg:h-[600px] rounded-lg overflow-hidden shadow-sm flex items-center">
            <?php foreach ($slides as $index => $slide): ?>
                <div class="slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out flex items-center justify-between bg-white"
                     data-slide="<?php echo $index; ?>">

                    <!-- Text Left -->
                    <div class="w-full md:w-1/2 px-6 md:px-12 z-10">
                        <?php if(!empty($slide['headline'])): ?>
                            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 translate-x-[-100px] opacity-0 slide-in-left">
                                <?php echo $slide['headline']; ?>
                            </h1>
                        <?php endif; ?>

                        <p class="text-xl md:text-2xl mb-6 leading-relaxed translate-x-[-100px] opacity-0 slide-in-left delay-200">
                            <?php echo $slide['subheadline']; ?>
                        </p>

                        <a href="<?php echo $slide['button_link']; ?>"
                           class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold px-8 py-3 rounded-full text-lg transition-colors duration-300 translate-x-[-100px] opacity-0 slide-in-left delay-400">
                            <?php echo $slide['button_text']; ?>
                            <svg class="inline w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>

                    <!-- Image Right -->
                    <div class="hidden md:block w-1/2 h-full">
                        <img src="<?php echo $slide['image']; ?>" alt="<?php echo $slide['category']; ?>" class="h-full w-full object-contain">
                    </div>

                    <!-- Dark Overlay for Text Readability -->
                    <div class="absolute inset-0 bg-black bg-opacity-20 md:bg-opacity-0"></div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Navigation Dots -->
        <div class="flex justify-center mt-6 space-x-2">
            <?php for ($i = 0; $i < count($slides); $i++): ?>
                <button onclick="goToSlide(<?php echo $i; ?>)"
                        class="w-3 h-3 rounded-full transition-all duration-300 <?php echo $i === 0 ? 'bg-green-500 scale-125' : 'bg-gray-300 hover:bg-green-400'; ?>"></button>
            <?php endfor; ?>
        </div>

        <!-- Small Green Arrow -->
        <div class="absolute bottom-4 right-4 text-green-500">
            <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

<style>
    .slide.active {
        opacity: 1 !important;
    }
    .slide-in-left {
        animation: slideInLeft 0.8s ease-out forwards;
    }
    @keyframes slideInLeft {
        from { transform: translateX(-100px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    .delay-200 { animation-delay: 0.2s; }
    .delay-400 { animation-delay: 0.4s; }
</style>

<script>
    let currentSlide = 0;
    const totalSlides = <?php echo count($slides); ?>;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('[onclick^="goToSlide"]');

    function showSlide(n){
        slides.forEach(slide => slide.classList.remove('active'));
        slides[n].classList.add('active');

        const texts = slides[n].querySelectorAll('.slide-in-left');
        texts.forEach(text => {
            text.style.animation = 'none';
            text.offsetHeight;
            text.style.animation = null;
        });

        dots.forEach((dot,index)=>{
            dot.classList.toggle('bg-green-500', index===n);
            dot.classList.toggle('scale-125', index===n);
        });
    }

    function nextSlide(){
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    function goToSlide(n){
        currentSlide = n;
        showSlide(n);
    }

    setInterval(nextSlide,5000);
    showSlide(0);
</script>
