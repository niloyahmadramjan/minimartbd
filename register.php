<?php
session_start();
include_once("includes/db.php");

$error = "";
if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } elseif (strlen($password) < 6) {
        $error = "Password must be 6+ characters!";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Email already registered!";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $insert->bind_param("sss", $name, $email, $hashed);
            
            if ($insert->execute()) {
                $_SESSION['user'] = $name;
                header("Location: index.php");
                exit();
            } else {
                $error = "Registration failed!";
            }
        }
        $stmt->close();
    }
}

include_once("includes/header.php");
?>

<div class="min-h-full flex items-center justify-center bg-gray-50 px-4 py-12">
    <div class="max-w-7xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 bg-white rounded-3xl shadow-2xl overflow-hidden">

        <!-- Left Side - Same Beautiful Promo -->
        <div class="hidden lg:flex flex-col justify-center items-center  p-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative z-10 text-center">
                <div class="mb-10">
                    <svg class="w-32 h-32 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                              d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <h1 class="text-5xl font-bold mb-4">Join MiniMart BD</h1>
                <p class="text-xl mb-8 opacity-90">Create your account in seconds</p>
                <div class="space-y-4 text-lg">
                    <p>Exclusive Deals</p>
                    <p>Free Shipping on First Order</p>
                    <p>24/7 Customer Support</p>
                </div>
                <div class="mt-12">
                    <div class="inline-flex items-center space-x-3 bg-white bg-opacity-20 backdrop-blur-md rounded-full px-8 py-4">
                        <span class="text-3xl">Join Free</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="flex flex-col justify-center px-8 py-12 lg:px-16">
            <div class="max-w-md w-full mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-4xl font-bold text-gray-900">Create Account</h2>
                    <p class="mt-3 text-gray-600">Start shopping in minutes</p>
                </div>

                <?php if ($error): ?>
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-center">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" required 
                               class="w-full px-5 py-4 border border-gray-300 rounded-xl focus:ring-4 focus:ring-purple-500 focus:border-transparent transition"
                               placeholder="John Doe">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" required 
                               class="w-full px-5 py-4 border border-gray-300 rounded-xl focus:ring-4 focus:ring-purple-500 focus:border-transparent transition"
                               placeholder="you@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" required minlength="6"
                               class="w-full px-5 py-4 border border-gray-300 rounded-xl focus:ring-4 focus:ring-purple-500 focus:border-transparent transition"
                               placeholder="Create a strong password">
                    </div>

                    <button type="submit" name="register"
                            class="w-full py-5 rounded-xl text-white font-bold text-lg shadow-lg transform transition-all duration-300
                                   bg-gradient-to-r from-purple-600 via-pink-600 to-red-600
                                   hover:from-purple-700 hover:via-pink-700 hover:to-red-700
                                   hover:shadow-2xl hover:scale-105 hover:ring-4 hover:ring-purple-300">
                        Register Now
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        Already have an account? 
                        <a href="login.php" class="font-bold text-purple-600 hover:text-purple-800 hover:underline">
                            Login Here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("includes/footer.php"); ?>