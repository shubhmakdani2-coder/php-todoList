<?php
require_once '../code/adminCode.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<style>
    body {
        background:
            linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
            /* gradient overlay */
            url('../assets/gif7.gif') no-repeat center center / cover;
        /* image */
    }


    .frosted-glass {

        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7));
        /* semi-transparent background */

        backdrop-filter: blur(3px);
        /* frosted glass effect */
        box-shadow: 1px 1px 1px rgba(255, 255, 255, 0.4);

    }

    .frosted-glass-cyan {

        background: linear-gradient(rgba(0, 213, 255, 0.1), rgba(0, 0, 0, 0.7));
        /* semi-transparent background */

        backdrop-filter: blur(3px);
        /* frosted glass effect */
        box-shadow: 1px 1px 1px rgba(255, 255, 255, 0.4);

    }

    .frosted-glass-red {

        background: linear-gradient(rgba(255, 0, 0, 0.1), rgba(0, 0, 0, 0.7));
        /* semi-transparent background */

        backdrop-filter: blur(3px);
        /* frosted glass effect */
        box-shadow: 1px 1px 1px rgba(255, 255, 255, 0.4);

    }

    .frosted-glass:hover {
        transform: translateY(-10px);
        background: linear-gradient(rgba(0, 195, 255, 0.1), rgba(245, 85, 5, 0.4), rgba(0, 0, 0, 0.7));
        /* semi-transparent background */

        backdrop-filter: blur(3px);
        /* frosted glass effect */
        box-shadow: 1px 10px 10px rgba(255, 255, 255, 0.4);
        color: transparent;
        /* Makes the text fill transparent */
        -webkit-text-stroke: 1px black;
        transition: all 0.4s ease;
    }

    .frosted-glass-cyan:hover {
        transform: translateY(-10px);
        background: linear-gradient(rgba(0, 195, 255, 0.1), rgba(5, 245, 229, 0.4), rgba(0, 0, 0, 0.7));
        /* semi-transparent background */

        backdrop-filter: blur(3px);
        /* frosted glass effect */
        box-shadow: 1px 10px 10px rgba(255, 255, 255, 0.4);
        color: transparent;
        /* Makes the text fill transparent */
        -webkit-text-stroke: 1px white;
        transition: all 0.4s ease;
    }

    .frosted-glass-red:hover {
        transform: translateY(-10px);
        background: linear-gradient(rgba(255, 30, 0, 0.1), rgba(245, 5, 5, 0.8), rgba(0, 0, 0, 0.7));
        /* semi-transparent background */

        backdrop-filter: blur(3px);
        /* frosted glass effect */
        box-shadow: 1px 10px 10px rgba(255, 255, 255, 0.4);
        color: transparent;
        /* Makes the text fill transparent */
        -webkit-text-stroke: 1px white;
        transition: all 0.4s ease;

    }

    h2,
    h1 {
        color: transparent;
        /* Makes the text fill transparent */
        -webkit-text-stroke: 0.5px white;
    }
</style>

<body>
    <nav class="navbar ">
        <div class="container-fluid">
            <h1 class="navbar-brand text-light"></h1>
            <form class="d-flex" action="../code/logout.php" method="post">
                <h4 class="text-bottom text-light pe-4 text-capitalize">Hello, Admin</h4>
                <button class="btn btn-outline-light ms-2" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container w-100 text-center text-light  p-3">
        <h2 class="text-start">USERS</h2>
        <form action="./AdminData.php" method="post">
    <div class="row mb-2">
        <button type="submit" name="activeUser" class="col m-2 p-5 rounded-4 frosted-glass border-0 w-100 text-light">
            <h5>Active User</h5>
            <h2><?php echo getDataCount("SELECT COUNT(*) FROM users WHERE usertype = '1'"); ?></h2>
        </button>

        <button type="submit" name="blockedUser" class="col m-2 p-5 rounded-4 frosted-glass border-0 w-100 text-light">
            <h5>Blocked User</h5>
            <h2><?php echo getDataCount("SELECT COUNT(*) FROM users WHERE usertype = '2'"); ?></h2>
        </button>

        <button type="submit" name="totalUser" class="col m-2 p-5 rounded-4 frosted-glass-cyan border-0 w-100 text-light">
            <h5>Total User</h5>
            <h2><?php echo getDataCount("SELECT COUNT(*) FROM users"); ?></h2>
        </button>
    </div>
</form>


        <h2 class="text-start">TODOS</h2>
        <div class="row ">
            <div class="col m-2 p-5 rounded-4 frosted-glass">
                <h5>In Progress</h5>
                <h2><?php echo (getDataCount("select COUNT(*) from todos where operation = '0' "));  ?></h2>
            </div>
            <div class="col m-2 p-5 rounded-4 frosted-glass">
                <h5>Completed</h5>
                <h2><?php echo (getDataCount("select COUNT(*) from todos where operation = '1' "));  ?></h2>
            </div>
            <div class="col m-2 p-5 rounded-4 frosted-glass-red">
                <h5>Deleted</h5>
                <h2><?php echo (getDataCount("select COUNT(*) from todos where operation = '2' "));  ?></h2>
            </div>
            <div class="col m-2 p-5 rounded-4 frosted-glass-cyan">
                <h6>Total TODOS till now..</h6>
                <h2><?php echo (getDataCount("select COUNT(*) from todos "));  ?></h2>
            </div>
        </div>

    </div>
</body>

</html>