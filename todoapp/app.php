
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<?php
include "../includes/db.php";

// -------- ADD TASK --------
if (isset($_POST["add"])) {
    $task = trim($_POST["task"]);
    if ($task !== "") {
        $stmt = $conn->prepare("INSERT INTO tasks (task) VALUES (?)");
        $stmt->bind_param("s", $task);
        $stmt->execute();
    }
    header("Location: app.php");
    exit;
}

// -------- DELETE TASK --------
if (isset($_GET["delete"])) {
    $id = intval($_GET["delete"]);
    $conn->query("DELETE FROM tasks WHERE id=$id");
    header("Location: app.php");
    exit;
}

// -------- MARK COMPLETED --------
if (isset($_GET["complete"])) {
    $id = intval($_GET["complete"]);
    $conn->query("UPDATE tasks SET completed=1 WHERE id=$id");
    header("Location: app.php");
    exit;
}

// -------- MARK UNCOMPLETED --------
if (isset($_GET["undo"])) {
    $id = intval($_GET["undo"]);
    $conn->query("UPDATE tasks SET completed=0 WHERE id=$id");
    header("Location: app.php");
    exit;
}

// -------- UPDATE TASK --------
if (isset($_POST["update"])) {
    $id = intval($_POST["id"]);
    $task = trim($_POST["task"]);
    $conn->query("UPDATE tasks SET task='$task' WHERE id=$id");
    header("Location: app.php");
    exit;
}

// -------- SEARCH TASKS --------
$search = "";
$query = "SELECT * FROM tasks";

if (isset($_GET["search"]) && trim($_GET["search"]) !== "") {
    $search = $conn->real_escape_string($_GET["search"]);
    $query .= " WHERE task LIKE '%$search%'";
}

$query .= " ORDER BY id DESC";

$tasks = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo App – Full Features</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen py-10">

<div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-lg">

    <h1 class="text-3xl font-bold text-center mb-6">Advanced Todo App</h1>

    <!-- Search -->
    <form method="GET" class="mb-4 flex gap-2">
        <input 
            type="text" 
            name="search" 
            value="<?php echo htmlspecialchars($search); ?>"
            placeholder="Search tasks..." 
            class="w-full px-3 py-2 border rounded-lg"
        >
        <button class="bg-green-600 text-white px-4 py-2 rounded-lg">Search</button>
    </form>

    <!-- Add Task -->
    <form method="POST" class="flex gap-2 mb-5">
        <input 
            type="text" 
            name="task" 
            placeholder="Write a task..." 
            class="w-full px-3 py-2 border rounded-lg"
            required
        >
        <button 
            name="add" 
            class="bg-blue-600 text-white px-4 py-2 rounded-lg"
        >
            Add
        </button>
    </form>

    <!-- Task List -->
    <ul class="space-y-3">
        <?php while ($row = $tasks->fetch_assoc()): ?>
        <li class="p-3 bg-gray-50 border rounded-lg">

            <div class="flex justify-between items-center">
                <div>
                    <!-- Completed Task Style -->
                    <span class="text-lg <?php echo $row['completed'] ? 'line-through text-gray-500' : ''; ?>">
                        <?php echo htmlspecialchars($row["task"]); ?>
                    </span>
                </div>

                <div class="flex gap-3">

                    <!-- Complete / Undo -->
                    <?php if ($row['completed'] == 0): ?>
                        <a href="app.php?complete=<?php echo $row['id']; ?>" 
                           class="text-green-600 font-semibold">Complete</a>
                    <?php else: ?>
                        <a href="app.php?undo=<?php echo $row['id']; ?>" 
                           class="text-yellow-600 font-semibold">Undo</a>
                    <?php endif; ?>

                    <!-- Edit Popup -->
                    <button 
                        onclick="openEdit(<?php echo $row['id']; ?>, '<?php echo htmlspecialchars($row['task']); ?>')"
                        class="text-blue-600 font-semibold">
                        Edit
                    </button>

                    <!-- Delete -->
                    <a 
                        href="app.php?delete=<?php echo $row['id']; ?>" 
                        class="text-red-600 font-semibold"
                        onclick="return confirm('Delete this task?');"
                    >
                        Delete
                    </a>
                </div>
            </div>

        </li>
        <?php endwhile; ?>
    </ul>

</div>


<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-5 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-3">Edit Task</h2>

        <form method="POST">
            <input type="hidden" name="id" id="editId">

            <input 
                type="text" 
                id="editTask" 
                name="task" 
                class="w-full px-3 py-2 border rounded-lg mb-3" 
                required
            >

            <div class="flex justify-end gap-3">
                <button 
                    type="button" 
                    onclick="closeEdit()" 
                    class="px-4 py-2 bg-gray-300 rounded-lg"
                >
                    Cancel
                </button>

                <button 
                    name="update" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg"
                >
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openEdit(id, task) {
    document.getElementById('editId').value = id;
    document.getElementById('editTask').value = task;
    document.getElementById('editModal').classList.remove("hidden");
}

function closeEdit() {
    document.getElementById('editModal').classList.add("hidden");
}
</script>

</body>
</html>
