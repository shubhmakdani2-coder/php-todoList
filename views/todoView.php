<?php
require_once "../code/todoCode.php";


function getUsername()
{
    if (isset($_SESSION['user']['uname'])) {
        return htmlspecialchars($_SESSION['user']['uname']);
    } else {
        return "Guest";
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        /* height: 100vh; */
        margin: 0;
        
        background: 
    linear-gradient( rgba(0,0,0,0.5), rgba(0,0,0,0.7)), /* gradient overlay */
    url('../assets/gif7.gif') no-repeat center center / cover;
        
        
    }

    .frosted-glass {
  
  background: linear-gradient( rgba(0,0,0,0.0), rgba(0,0,0,0.5)); /* semi-transparent background */
  
  
  box-shadow:  1px 1px 1px rgba(255,255,255, 0.4);
  
}
@keyframes gradientAnimation { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

    .modal-backdrop.show {

        background-color: black;
        /* semi-transparent dark blur */
        backdrop-filter: blur(5px);
    }

    .editBg {

        background: linear-gradient(135deg, #378dc3ff, #1d5d71ff);
        background-size: 300% 300%;
        animation: gradientAnimation 4s ease infinite;

    }

    .deleteBg {
        background: linear-gradient(135deg, #ED213A, #93291E);
        background-size: 300% 300%;
        animation: gradientAnimation 4s ease infinite;
    }

    .completeBg {
        background: linear-gradient(135deg, #11998e, #38ef7d);
        background-size: 300% 300%;
        animation: gradientAnimation 4s ease infinite;
    }

    .completedBg {
        background: linear-gradient(135deg, #24FE41, #11998e);
        background-size: 300% 300%;
        animation: gradientAnimation 4s ease infinite;
    }

    .table-no-bg,
    .table-no-bg thead,
    .table-no-bg tbody,
    .table-no-bg tr,
    .table-no-bg th,
    .table-no-bg td {
        background-color: transparent !important;
    }

    ::placeholder {
        color: white !important;
        opacity: 1;
        /* Ensures full visibility */
    }

    /* For better browser support */
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
    width: 5px; /* width of scrollbar */
}
.custom-input:focus {
    outline: none;                  /* remove default outline */
    border-color: #fff;          /* change border color */
    box-shadow: 0 0 0px #fff;    /* custom glow */
    background-color: #222;         /* optional background change */
    color: transparent;                   /* text color */
}


.table-responsive::-webkit-scrollbar-thumb {
    background: rgba(255,255,255, 0.5); /* thumb color */
    border-radius: 3px;
    animation: gradientAnimation 4s ease infinite;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(#fff);
}

    
</style>

<body>
    <nav class="navbar ">
        <div class="container-fluid">
            <a class="navbar-brand"></a>
            <form class="d-flex" action="../code/logout.php" method="post">
                <h2 class="text-bottom text-light pe-4 text-capitalize">Hello, <?php echo getUsername(); ?></h2>
                <button class="btn btn-outline-light ms-2" type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container w-75 text-center text-light mt-5 p-5 rounded-4 frosted-glass" >
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="row border g-0 rounded-3 ms-3 me-3 overflow-hidden ">
                <div class="col-10 ">
                    <input type="text" name="todoname" class="form-control text-center bg-transparent border-0 custom-input  text-light " placeholder="Please Enter Todos..." required>
                </div>
                <div class="col-2 ">
                    <button type="submit" name="todo" class="btn btn-light w-100 rounded-2">Add Todos</button>
                </div>
            </div>
        </form>

        <!-- table -->
        <?php if (isset($_SESSION['user']['uid'])) { ?>
            <div class="container  text-center text-light  p-5 rounded-3  " >
                <div class="table-responsive  rounded-2 " style="max-height: 200px; overflow-y: auto;  border: 2px solid rgba(255,255,255,0.5); border-bottom: none;" >
                    <table class="table table-borderless  table-hover  text-capitalize text-center table-success-emphasis table-no-bg">
                        <thead class="sticky-top"style="background: linear-gradient(rgba(0,0,0,0.1)); backdrop-filter: blur(30px);">
                            <tr>
                                <th class="w-25 text-light">#</th> <!-- about 25% -->
                                <th class="w-50 text-wrap text-light">Todo</th> <!-- 50% -->
                                <th class="w-25 text-light">Action</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr class="">
                                    <td class=" text-light align-middle"><?= $index++ ?></td>
                                    <td class="text-wrap text-light align-middle"><?= htmlspecialchars($row['todoname']) ?></td>
                                    <td class="align-middle">
                                        <?php if ($row['operation'] == 1): ?>
                                            <button data-bs-toggle="modal" data-bs-target="#completedModel" class="btn btn-sm btn-success text-light pe-3 ps-3">
                                                <i class="bi bi-check2-circle me-1"></i>Completed
                                            </button>
                                        <?php else: ?>
                                            <button data-bs-toggle="modal" data-bs-target="#editModel<?= htmlspecialchars($row['tid']) ?>" class="btn btn-sm btn-primary me-1" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <div class="modal fade" id="editModel<?= htmlspecialchars($row['tid']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered ">
                                                    <div class="modal-content bg-transparent border-0 editBg">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title text-white">Edit Todo</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                                            <div class="modal-body text-white">
                                                                <input type="text" name="edittxttodo" class="form-control text-center bg-transparent text-light custom-input" placeholder="Please Enter Todo..." required>
                                                                <input type="hidden" name="tid" value="<?= $row['tid'] ?>">
                                                            </div>
                                                            <div class="modal-footer border-0">
                                                                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="editTodo" class="btn btn-light">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button data-bs-toggle="modal" data-bs-target="#completeModel<?= htmlspecialchars($row['tid']) ?>" class="btn btn-sm btn-success me-1" title="Complete" style="z-index: 10;">
                                                <i class="bi bi-check2-circle"></i>
                                            </button>
                                            <div class="modal fade" id="completeModel<?= htmlspecialchars($row['tid']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered ">
                                                    <div class="modal-content bg-transparent border-0 completeBg">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title text-white">Complete Todo </h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                                            <div class="modal-body text-white">
                                                                Hooray you will complete todo.
                                                                <input type="hidden" name="tid" value="<?= $row['tid'] ?>">
                                                            </div>
                                                            <div class="modal-footer border-0">
                                                                <button type="button" class="btn btn-outline-light " data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="completeTodo" class="btn btn-light text-success">Complete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button data-bs-toggle="modal" data-bs-target="#deleteModel<?= htmlspecialchars($row['tid']) ?>" class="btn btn-sm btn-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <div class="modal fade" id="deleteModel<?= htmlspecialchars($row['tid']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered ">
                                                    <div class="modal-content bg-transparent border-0 deleteBg">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title text-white">Delete Todo </h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                                            <div class="modal-body text-white">
                                                                Are you sure you want to delete this todo?
                                                                <input type="hidden" name="tid" value="<?= $row['tid'] ?>">
                                                            </div>
                                                            <div class="modal-footer border-0">
                                                                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="deleteTodo" class="btn btn-light text-danger">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>


            </div>


    </div>

    <!-- modellllll -->
    <!-- Edit Modal -->









    <div class="modal fade" id="completedModel"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content bg-transparent border-0 completedBg">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white">Completed Todo </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-white">
                    Hooray, Keep it up completing the task.
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light text-success" data-bs-dismiss="modal">Done</button>

                </div>
            </div>
        </div>
    </div>





</body>

</html>