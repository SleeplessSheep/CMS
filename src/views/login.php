<?php include 'layouts/header.php'; ?>
<script src="/public/js/password.js"></script>
<h2>Login</h2>
<form action="/api/login" method="POST">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="button" id="togglePassword">👁️</button>
    <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="/register.php">Register here</a></p>
<?php include 'layouts/footer.php'; ?>
