<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MiniMartBD</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Icons (Feather Icons CDN) -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">

  <!-- Top Discount Bar -->
  <div class="bg-emerald-600 text-white text-center py-2 text-sm font-medium">
    Get Upto 25% Discount On First Order: <span class="font-bold">GET25OFF</span> - <a href="#" class="underline hover:no-underline">SHOP NOW →</a>
  </div>

  <!-- Main Header -->
  <header class="bg-white shadow-sm border-b">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row items-center justify-between py-4 gap-4">

        <!-- Logo -->
        <div class="flex items-center">
          <a href="index.php" class="flex items-center space-x-3">
            <div class="bg-emerald-600 text-white p-3 rounded-xl">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 7L13 15L8.5 10.5L3 16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21 7H15M21 7V13" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <span class="text-2xl font-bold text-emerald-600">MiniMartBD</span>
          </a>
        </div>

        <!-- Search Bar -->
        <div class="w-full max-w-2xl">
          <div class="flex">
            <button class="bg-gray-100 px-5 flex border border-r-0 border-gray-300 rounded-l-lg text-gray-600 hover:bg-gray-200 transition hidden md:block">
             Categories
            </button>
            <input type="text" placeholder="Search product here..." class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-emerald-600">
            <button class="bg-emerald-600 text-white px-6 rounded-r-lg hover:bg-emerald-700 transition">
              <i data-feather="search" class="w-5 h-5"></i>
            </button>
          </div>
        </div>

        <!-- Right Icons & Cart -->
        <div class="flex items-center space-x-6 text-gray-700">

          <!-- Track Order -->
          <a href="#" class="hidden md:flex items-center space-x-2 hover:text-emerald-600 transition">
            <i data-feather="package" class="w-5 h-5"></i>
            <span class="text-sm font-medium">Track Order</span>
          </a>

          <!-- Help Center -->
          <a href="#" class="hidden md:flex items-center space-x-2 hover:text-emerald-600 transition">
            <i data-feather="help-circle" class="w-5 h-5"></i>
            <span class="text-sm font-medium">Help Center</span>
          </a>

          <!-- Language & Currency -->
          <div class="flex items-center space-x-4 text-sm">
            <select class="border-none bg-transparent focus:outline-none cursor-pointer">
              <option>English</option>
            </select>
            <select class="border-none bg-transparent focus:outline-none cursor-pointer">
              <option>$ USD</option>
              <option>৳ BDT</option>
            </select>
          </div>

          <!-- User & Cart -->
          <div class="flex items-center space-x-5">
            <?php if(isset($_SESSION['user'])): ?>
              <div class="flex items-center space-x-3">
                <i data-feather="user" class="w-6 h-6"></i>
                <div>
                  <p class="text-xs text-gray-500">Hello,</p>
                  <p class="font-semibold"><?php echo htmlspecialchars($_SESSION['user']); ?></p>
                </div>
              </div>
              <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 text-sm">Logout</a>
            <?php else: ?>
              <a href="login.php" class="hover:text-emerald-600">
                <i data-feather="user" class="w-6 h-6"></i>
              </a>
            <?php endif; ?>

            <a href="cart.php" class="relative hover:text-emerald-600">
              <i data-feather="shopping-cart" class="w-7 h-7"></i>
              <span class="absolute -top-2 -right-2 bg-emerald-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">0</span>
              <span class="ml-2 font-semibold">$0.00</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Navigation Menu -->
  <nav class="bg-white border-b">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between py-4">
        <div class="flex items-center space-x-8">
          <button class="lg:hidden">
            <i data-feather="menu" class="w-6 h-6"></i>
          </button>
          <a href="#" class="hidden lg:flex items-center space-x-3 text-emerald-600 font-bold">
            <i data-feather="grid" class="w-5 h-5"></i>
            <span>SHOP BY CATEGORIES</span>
            <i data-feather="chevron-down" class="w-4 h-4"></i>
          </a>

          <ul class="hidden lg:flex items-center space-x-8 font-medium text-gray-700">
            <li><a href="index.php" class="hover:text-emerald-600 transition">HOME</a></li>
            <li><a href="#" class="hover:text-emerald-600 transition">SHOP <i data-feather="chevron-down" class="w-4 h-4 inline"></i></a></li>
            <li><a href="#" class="hover:text-emerald-600 transition">CATEGORIES <span class="bg-orange-500 text-white text-xs px-2 py-1 rounded">SALE</span></a></li>
            <li><a href="#" class="hover:text-emerald-600 transition text-red-600 font-bold">PRODUCTS HOT <i data-feather="flame" class="w-5 h-5 inline"></i></a></li>
            <li><a href="#" class="hover:text-emerald-600 transition">TOP DEALS <i data-feather="chevron-down" class="w-4 h-4 inline"></i></a></li>
            <li><a href="#" class="hover:text-emerald-600 transition">ELEMENTS <i data-feather="chevron-down" class="w-4 h-4 inline"></i></a></li>
          </ul>
        </div>

        <div class="flex items-center space-x-3 text-emerald-600 font-bold">
          <i data-feather="zap" class="w-6 h-6"></i>
          <span>TODAY'S DEAL</span>
        </div>
      </div>
    </div>
  </nav>

  <script>
    // Initialize feather icons
    feather.replace();
  </script>
</body>
</html>