<?php
require_once '../code/loginCode.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
body {
    background: 
    linear-gradient( rgba(0,0,0,0.5), rgba(0,0,0,0.7)), /* gradient overlay */
    url('../assets/gif1.gif') no-repeat center center / cover; /* image */
}    


.frosted-glass {
  
  background: linear-gradient( rgba(0,0,0,0.5), rgba(0,0,0,0.0)); /* semi-transparent background */
  
  backdrop-filter: blur(3px); /* frosted glass effect */
  box-shadow:  1px 1px 1px rgba(255,255,255, 0.4);
  
}
.white-placeholder::placeholder {
  color: rgba(255, 255, 255, 0.811);
  opacity: 1; /* Ensures the color is fully visible */
}
.custom-input:focus {
    outline: none;                  /* remove default outline */
    border-color: #fff;          /* change border color */
    box-shadow: 0 0 5px #fff;    /* custom glow */
    background-color: #222;         /* optional background change */
    color: white;                   /* text color */
}

</style>

<body >
    <div class="container w-50 text-center  text-light mt-5 p-5 rounded-5 frosted-glass" >
        <h2 class="mb-5">Sign In</h2>
        <div class="mb-3">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="exampleFormControlInput1" class="form-label ">Email address</label>
                <input type="email" name="email" class="form-control outline bg-transparent text-light white-placeholder custom-input" placeholder="name@gmail.com" required>
        </div>
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" name="password" class="form-control bg-transparent text-light white-placeholder custom-input" placeholder="*******" required>
        <button type="submit" name="log" class="btn btn-outline-light mt-5 w-25 rounded-3 ">Sign In</button>
        <div class="mt-5">
            </form>

            <h5>For Sign up: <a class="text-light"
                    href="registration.php"> Sign Up</a></h5>
        </div>

    </div>

</body>

</html>