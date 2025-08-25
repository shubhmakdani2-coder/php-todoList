<?php
require_once '../code/adminDataCode.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>

<style>
    body {
        background:
            linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
            /* gradient overlay */
            url('../assets/gif3.gif') no-repeat center center / cover;
        /* image */
    }

    ::placeholder {
        color: white !important;
        opacity: 1;
        /* Ensures full visibility */
    }

    .frosted-glass {

        background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.7));
        /* semi-transparent background */

        backdrop-filter: blur(3px);
        /* frosted glass effect */
        box-shadow: 1px 1px 1px rgba(255, 255, 255, 0.4);

    }

    .custom-input:focus {
        outline: none;
        /* remove default outline */
        border-color: #fff;
        /* change border color */
        box-shadow: 0 0 0px #fff;
        /* custom glow */
        background-color: #222;
        /* optional background change */
        color: transparent;
        /* text color */
    }

    .table-no-bg,
    .table-no-bg thead,
    .table-no-bg tbody,
    .table-no-bg tr,
    .table-no-bg th,
    .table-no-bg td {
        background-color: transparent !important;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.5);
        /* thumb color */
        border-radius: 3px;
        animation: gradientAnimation 4s ease infinite;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(#fff);
    }

    ::-webkit-input-placeholder {
        color: white !important;
    }

    :-ms-input-placeholder {
        color: white !important;
    }

    ::-ms-input-placeholder {
        color: white !important;
    }



    .table-responsive::-webkit-scrollbar {
        width: 5px;
        /* width of scrollbar */
    }
</style>

<body>
    <nav class="navbar ">
        <div class="container-fluid">
            <h1 class="navbar-brand text-light"></h1>
            <form class="d-flex" action="../views/adminPanel.php" method="post">
                <button class="btn btn-outline-light ms-2" type="submit">Back</button>
            </form>
        </div>
    </nav>
    <div class="container w-100 text-center text-light  p-5 frosted-glass rounded-3">
        <h1>Users</h1>
        <div class="row">
            <div class="col">

                <div class="container  text-center text-light  p-5 rounded-3  ">
                    <h6>Total active users : <?php
                                                $rowCount = mysqli_fetch_array($countResult);
                                                echo ($rowCount[0]) ?? 0; ?>
                    </h6>
                    <div class="table-responsive  rounded-2 "
                        style="max-height: 200px; overflow-y: auto;  border: 2px solid rgba(255,255,255,0.5); border-bottom: none;">
                        <table
                            class="table table-borderless  table-hover  text-capitalize text-center table-success-emphasis table-no-bg">
                            <thead class="sticky-top"
                                style="background: linear-gradient(rgba(0,0,0,0.1)); backdrop-filter: blur(30px);">
                                <tr>
                                    <!-- about 25% -->
                                    <th class="w-50 text-wrap text-light">Email</th> <!-- 50% -->
                                    <th class="w-25 text-light">Action</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td class="text-wrap  text-light align-middle"><?= htmlspecialchars($row['email']) ?></td>
                                            <td class="text-light align-middle">
                                                <form action="../code/adminDataCode.php" method="post">
                                                    <input type="hidden" name="uid" value="<?= $row['uid'] ?>">
                                                    <button type="submit" name="blockuser" class="btn btn-danger"><i class="bi bi-x-circle-fill me-1">

                                                        </i>Block
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td class="text-light" colspan="2">No data</td>
                                    </tr>
                                <?php

                                }

                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">

                <div class="container  text-center text-light  p-5 rounded-3  ">
                    <h6>Total block users : <?php
                                                $rowCount2 = mysqli_fetch_array($countResult2);
                                                echo ($rowCount2[0]) ?? 0; ?>
                    </h6>
                    <div class="table-responsive  rounded-2 "
                        style="max-height: 200px; overflow-y: auto;  border: 2px solid rgba(255,255,255,0.5); border-bottom: none;">
                        <table
                            class="table table-borderless  table-hover  text-capitalize text-center table-success-emphasis table-no-bg">
                            <thead class="sticky-top"
                                style="background: linear-gradient(rgba(0,0,0,0.1)); backdrop-filter: blur(30px);">
                                <tr>
                                    <!-- about 25% -->
                                    <th class="w-50 text-wrap text-light">Email</th> <!-- 50% -->
                                    <th class="w-25 text-light">Action</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                if ($result2 && mysqli_num_rows($result2) > 0) {
                                    while ($row = mysqli_fetch_assoc($result2)) {
                                ?>
                                        <tr>
                                            <td class="text-wrap  text-light align-middle"><?= htmlspecialchars($row['email']) ?></td>
                                            <td class="text-light align-middle">
                                                <form action="../code/adminDataCode.php" method="post">
                                                    <input type="hidden" name="uid" value="<?= $row['uid'] ?>">
                                                    <button type="submit" name="unblockuser" class="btn btn-success"><i class="bi bi-check-circle-fill me-1">

                                                        </i>Un-block
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td class="text-light" colspan="2">No data</td>
                                    </tr>
                                <?php

                                }

                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>