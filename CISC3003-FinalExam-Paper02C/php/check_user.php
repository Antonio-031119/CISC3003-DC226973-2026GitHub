<?php
<?php
$mysqli = new mysqli("localhost", "root", "", "cisc3003_db");

if (isset($_POST["username"])) {
    $user = $_POST["username"];
    // C.07: 使用 Ajax 检查
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "taken"; // 用户名已被占用
    } else {
        echo "available"; // 可以使用
    }
    $stmt->close();
}
$mysqli->close();
?>