<?php
session_start();

// Get cart count (works with session or DB later)
$cartCount = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['quantity'] ?? 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MiniMartBD</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
    .cart-pulse { animation: pulse 2s infinite; }
    @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); } 70% { box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); } 100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); } }
  </style>
</head>
<body class="bg-gray-50">

  <!-- Top Offer Bar -->
  <div class="bg-gradient-to-r from-pink-600 via-red-600 to-rose-600 text-white text-center py-3 text-sm font-bold shadow-lg">
    <i class="fas fa-gift mr-2"></i>
    Get 25% OFF on First Order! Use Code: <span class="text-yellow-300">GET25OFF</span>
    <a href="#" class="ml-3 underline hover:no-underline font-extrabold">SHOP NOW</a>
  </div>

  <!-- Main Header -->
  <header class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">

        <!-- Logo -->
        <a href="index.php" class="flex items-center space-x-4 group">
          <div class="bg-gradient-to-br from-emerald-500 to-teal-600 p-4 rounded-2xl shadow-xl group-hover:scale-110 transition duration-300">
            <i class="fas fa-store text-white text-3xl"></i>
          </div>
          <div>
            <h1 class="text-3xl font-black bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">
              MiniMartBD
            </h1>
            <p class="text-xs font-medium text-gray-500 tracking-wider">Fresh • Fast • Everyday</p>
          </div>
        </a>

        <!-- Search Bar (Desktop + Mobile) -->
        <div class="flex-1 max-w-2xl mx-8">
          <div class="relative">
            <input 
              type="text" 
              placeholder="Search for products, brands and more..." 
              class="w-full px-6 py-4 pl-14 rounded-full border-2 border-gray-200 focus:border-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-100 transition shadow-inner text-gray-700 font-medium"
            >
            <i class="fas fa-search absolute left-5 top-5 text-emerald-600 text-xl"></i>
            <button class="absolute right-2 top-2 bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-full font-bold transition shadow-md">
              Search
            </button>
          </div>
        </div>

        <!-- Right Side: User + Cart -->
        <div class="flex items-center space-x-8">

          <!-- User Account -->
          <?php if(isset($_SESSION['user'])): ?>
            <div class="flex items-center space-x-4 group">
              <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                <?= strtoupper(substr($_SESSION['user'], 0, 1)) ?>
              </div>
              <div class="hidden lg:block">
                <p class="text-xs text-gray-500">Welcome back</p>
                <p class="font-bold text-gray-800"><?= htmlspecialchars($_SESSION['user']) ?></p>
              </div>
              <a href="logout.php" class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-xl font-bold text-sm transition shadow">
                Logout
              </a>
            </div>
          <?php else: ?>
            <a href="login.php" class="flex items-center  bg-emerald-600 hover:bg-emerald-700 text-white px-7 rounded-2xl font-bold transition shadow-xl hover:shadow-2xl transform hover:scale-105">
              <i class="fas fa-user-plus text-xl"></i>
              <span>Login</span>
            </a>
          <?php endif; ?>

          <!-- Cart -->
          <a href="cart.php" class="relative group">
            <div class=" bg-gradient-to-br py-2 items-center text-center from-emerald-500 to-teal-600 rounded-2xl shadow-xl group-hover:shadow-2xl transition transform group-hover:scale-110">
              <i class="fas fa-shopping-cart text-center text-white text-xl"></i>
            </div>
            <?php if($cartCount > 0): ?>
              <span class="absolute -top-3 -right-3 bg-red-500 text-white text-sm font-bold rounded-full w-9 h-9 flex items-center justify-center shadow-2xl cart-pulse border-4 border-white">
                <?= $cartCount ?>
              </span>
            <?php else: ?>
              <span class="absolute -top-3 -right-3 bg-gray-400 text-white text-xs rounded-full w-8 h-8 flex items-center justify-center shadow-lg border-4 border-white">
                0
              </span>
            <?php endif; ?>
            <span class="ml-4 font-bold text-xl text-emerald-600 hidden lg:inline">$0.00</span>
          </a>
        </div>
      </div>
    </div>
  </header>

  <script>
    // Replace feather icons
    feather?.replace();
  </script>
</body>
</html>