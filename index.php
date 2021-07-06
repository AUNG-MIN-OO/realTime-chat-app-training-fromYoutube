<?php
    session_start();
    if (isset($_SESSION['unique_id'])){
        header("location:users.php");
    }
?>
<?php include_once 'header.php'; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Real Time Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="fields input">
                        <label for="">First Name</label>
                        <input type="text" required name="fname" placeholder="first name">
                    </div>
                    <div class="fields input">
                        <label for="">Last Name</label>
                        <input type="text" required name="lname" placeholder="last name">
                    </div>
                </div>
                <div class="fields input">
                    <label for="">Email</label>
                    <input type="text" required name="email" placeholder="enter your email">
                </div>
                <div class="fields input">
                    <label for="">Password</label>
                    <input type="password" required name="password" placeholder="enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="fields image">
                    <label for="">Select Image</label>
                    <input type="file" required name="image">
                </div>
                <div class="fields button">
                    <input type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link">Already Singed Up?<a href="login.php">Log In Here</a></div>
        </section>
    </div>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/signUp.js"></script>
</body>
</html>