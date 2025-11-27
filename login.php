<?php
session_start();
include_once("includes/db.php");

$error = "";
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields!";
    } else {
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['name'];
                $_SESSION['user_id'] = $user['id'];
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid password!";
            }
        } else {
            $error = "No account found with this email!";
        }
        $stmt->close();
    }
}

include_once("includes/header.php");
?>

<div class="max-w-7xl mx-auto bg-gray-50 px-4 py-12">
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-12 bg-white rounded-3xl shadow-2xl overflow-hidden">

        <!-- Left Side - Ecommerce Promo -->
        <div class="hidden lg:flex flex-col justify-center items-center  text-black p-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative z-10 text-center">
                <div class="mb-10">
                    <svg class="w-32 h-32 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h1 class="text-5xl font-bold mb-4">Welcome to MiniMart BD</h1>
                <p class="text-xl mb-8 opacity-90">Shop the best products at unbeatable prices</p>
                <div class="space-y-4 text-lg">
                    <p>Fast Delivery</p>
                    <p>100% Original Products</p>
                    <p>Easy Returns</p>
                </div>
                <div class="mt-12">
                    <div class="inline-flex items-center space-x-3 bg-white bg-opacity-20 backdrop-blur-md rounded-full px-8 py-4">
                        <span class="text-3xl">5.0</span>
                        <span class="text-sm">Trusted by 50,000+ Happy Customers</span>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black to-transparent opacity-30"></div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="flex flex-col justify-center px-8 py-12 lg:px-16">
            <div class="max-w-md w-full mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-4xl font-bold text-gray-900">Welcome Back!</h2>
                    <p class="mt-3 text-gray-600">Log in to continue shopping</p>
                </div>

                <?php if ($error): ?>
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-center">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" required 
                               class="w-full px-5 py-4 border border-gray-300 rounded-xl focus:ring-4 focus:ring-purple-500 focus:border-transparent transition"
                               placeholder="you@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" required
                               class="w-full px-5 py-4 border border-gray-300 rounded-xl focus:ring-4 focus:ring-purple-500 focus:border-transparent transition"
                               placeholder="••••••••">
                    </div>

                    <button type="submit" name="login"
                            class="w-full py-5 rounded-xl text-white font-bold text-lg shadow-lg transform transition-all duration-300
                                   bg-gradient-to-r from-purple-600 via-pink-600 to-red-600
                                   hover:from-purple-700 hover:via-pink-700 hover:to-red-700
                                   hover:shadow-2xl hover:scale-105 hover:ring-4 hover:ring-purple-300">
                        Login Now
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        Don't have an account? 
                        <a href="register.php" class="font-bold text-purple-600 hover:text-purple-800 hover:underline">
                            Register Now
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("includes/footer.php"); ?>