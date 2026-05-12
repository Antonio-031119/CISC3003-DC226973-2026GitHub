<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Scenario B</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
   <div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="php/process.php" method="POST">
				<h1>Join Us</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>	
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>		
				</div>
				<span>Use Your Emal To SingUp</span>
				<input type="text" name="username" placeholder="Enter your name" required>
				<input type="password" name="password" placeholder="Create password">
				<button type="submit">Register</button>
			</form>
		</div>
		
		<div class="form-container sign-in-container">
		<form action="php/process.php" method="POST">
			<h1>Login</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>	
					<a href="#" class="social"><i class="fab fa-linked-in"></i></a>		
				</div>
				<span>Use Your Emal SignUp</span>
				<input type="text" name="username" placeholder="Enter your name" required>
				<input type="password" name="password" placeholder="Create password">
				<button type="submit">login</button>
			</form>
		</div>
		
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Hello, Again</h1>
					<img src="images/website_7376495.png" style="width:150px;margin-top:20px">
					<p>Log in to stay connectrd with us</p>
				    <button class="ghost" id="signIn">Sign In</button>
				</div>
				
				<div class="overlay-panel overlay-right">
					<h1>Welcome</h1>
					<img src="images/unsecure_10399884.png" style="width:150px;margin-top:20px">
					<p>Log in to stay connectrd with us</p>
				    <button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
		
	</div>

    <footer style="margin-top: 50px; padding: 20px; border-top: 2px solid #444; text-align: center;">
        <strong>CISC3003 Web Programming: Chen Joaquin Antonio + DC226973 + 2026</strong>
    </footer>
</body>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

 // C.07: Ajax 实时检查用户名
    const usernameInput = document.querySelector('input[name="username"]');

    usernameInput.addEventListener('input', function() {
        const username = this.value;
        if (username.length > 0) {
            fetch('check_user.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'username=' + encodeURIComponent(username)
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'taken') {
                    this.style.border = '2px solid red'; // 占用显示红色
                } else {
                    this.style.border = '2px solid green'; // 可用显示绿色
                }
            });
        }
    });
</script>
</html>