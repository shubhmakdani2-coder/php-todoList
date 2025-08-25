<?php
require_once '../code/registerCode.php';
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<style>
body::-webkit-scrollbar {
    width: 6px; /* width of scrollbar */
}

body::-webkit-scrollbar-track {
    background: rgba(0,0,0); /* track color */
    
}


body::-webkit-scrollbar-thumb {
    background: rgba(255,255,255, 0.5); /* thumb color */
    border-radius: 30px;
    
}


body {
    background: 
    linear-gradient( rgba(0,0,0,0.5), rgba(0,0,0,0.7)), /* gradient overlay */
    url('../assets/gif2.gif') no-repeat center center / cover; /* image */
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
  <div class="container w-50 text-center   text-light mt-5 p-5 mb-5 rounded-5 frosted-glass"
    >
    <h2 class="mb-5">Sign up</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="username" class="form-control bg-transparent text-light white-placeholder custom-input custom-input" placeholder="Please Enter your Name" required>
      </div>
      <div class="row">
        <div class="col mb-3">
          <label for="exampleFormControlInput1" class="form-label">Age</label>
          <input type="number" min="10"  name="age" class="form-control bg-transparent text-light white-placeholder custom-input " placeholder="Please enter yor age" required>
        </div>
        <div class="col mb-3">
          <label for="inputPassword5" class="form-label">Gender</label>
          <select class="form-select bg-transparent text-light custom-input  " name="gender"> custom-input
            <option class="bg-dark " value="Male">Male</option>
            <option class="bg-dark " value="Female">Female</option>
            <option class="bg-dark " value="Not to say">Not to say</option>
          </select>
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control bg-transparent text-light white-placeholder custom-input" name="email" placeholder="name@gmail.com" required>
      </div>
      <div>
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" class="form-control bg-transparent text-light white-placeholder custom-input" name="password" placeholder="*******" required>
      </div>

      <button type="submit " name="reg" class="btn btn-outline-light mt-5 w-25  rounded-3 ">Sign up</button>
    </form>

    <div class="mt-5">
      <h5>For Sign in: <a class="text-light" href="login.php"> Sign In</a></h5>
    </div>

  </div>

</body>

</html>