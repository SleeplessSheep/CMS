<?php include 'layouts/header.php'; ?>
<script type="text/javascript" src="/public/js/password.js"></script>
<script type="text/javascript" src="/public/js/register.js"></script>

<h2>Account Register</h2>

<form action="/api/register" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <p id="emailStatus"></p>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="button" id="togglePassword">👁️</button>
    <p id="passwordStrength">❌ Too Weak</p>

    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required>
    <button type="button" id="toggleConfirmPassword">👁️</button>

    <button type="submit" id="registerButton" disabled>Register</button>
</form>

<p>Already have an account? <a href="/login.php">Login here</a></p>

<?php include 'layouts/footer.php'; ?>
