<h1>This is the login view</h1>

<?php if(Session::get('username')): ?>

<?php echo Session::get('username'); ?> Logged in (<a href="/logout">Logout</a>)

<?php else: ?>

<form action="/login" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Username">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Password">

    <input type="submit" value="Submit">
 </form>

 <?php endif; ?>
