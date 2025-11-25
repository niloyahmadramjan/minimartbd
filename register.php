<?php
include_once("includes/header.php");
include_once("includes/db.php"); // make sure your db.php is correct

// Handle registration form
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($check->num_rows > 0){
        $error = "Email already registered";
    } else {
        $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
        if($conn->query($sql) === TRUE){
            $_SESSION['user'] = $name;
            header("Location: index.php");
            exit();
        } else {
            $error = "Registration failed: " . $conn->error;
        }
    }
}
?>

<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Register</h2>

    <?php if(isset($error)): ?>
        <p class="text-red-500 mb-4"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="name" placeholder="Name" class="w-full mb-3 p-2 border rounded" required>
        <input type="email" name="email" placeholder="Email" class="w-full mb-3 p-2 border rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full mb-3 p-2 border rounded" required>
        <button type="submit" name="register" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Register</button>
    </form>
</div>

<?php include_once("includes/footer.php"); ?>
