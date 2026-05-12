<?php
// 1. 直接在这里连接，确保万无一失
$mysqli = new mysqli("localhost", "root", "", "cisc3003_exam");

if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error);
}

// 2. 检查是否有数据提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 这里的 username 必须对应你 HTML input 里的 name
    $user = $_POST['username'] ?? 'No Name';
    $pass = $_POST['password'] ?? 'No Password';
    
    // 3. 准备 SQL (A.08: Prepared Statement)
    // 确保你的 users 表现在有 username 和 password 两列
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ss", $user, $pass);
        
        if ($stmt->execute()) {
            // A.10: 成功插入的反馈
            echo "<div style='text-align:center; margin-top:50px;'>";
            echo "<h1>Registration Successful!</h1>";
            echo "<p>Data has been saved to MySQL table 'users'.</p>";
            echo "<a href='../index.php' style='padding:10px; background:blue; color:white; text-decoration:none;'>Back to Home</a>";
            echo "</div>";
        } else {
            echo "Execution failed: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // 如果这里还报 Unknown column 'password'，说明你第一步的 SQL 没跑成功
        echo "SQL Prepare failed: " . $mysqli->error;
    }
}

// 4. 强制要求的 Footer
echo "<footer style='position:fixed; bottom:0; width:100%; text-align:center; padding:20px; border-top:1px solid #ccc;'>
        <strong>CISC3003 Web Programming: Chen Joaquin Antonio + DC226973 + 2026</strong>
      </footer>";

$mysqli->close();
?>