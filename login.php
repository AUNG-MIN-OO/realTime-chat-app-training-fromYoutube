<?php include_once 'header.php'; ?>
<body>
<div class="wrapper">
    <section class="form login">
        <header>Real Time Chat App</header>
        <form action="#">
            <div class="error-txt">This is an error message!</div>
            <div class="fields input">
                <label for="">Email</label>
                <input type="text" name="email" placeholder="enter your email">
            </div>
            <div class="fields input">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="enter your password">
                <i class="fas fa-eye"></i>
            </div>
            <div class="fields button">
                <input type="submit" value="Continue to chat">
            </div>
        </form>
        <div class="link">Not yet singed up?<a href="index.php">SignUp Here</a></div>
    </section>
</div>

<script src="js/pass-show-hide.js"></script>
<script src="js/login.js"></script>

</body>
</html>