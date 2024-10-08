<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>

    <!--======================  Favicon ===========================-->
    <link rel="icon" type="image/x-icon" href="./img/favicon.png">

    <!--=============== BOXICON ===============-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--======================  CSS ===========================-->
    <link rel="stylesheet" href="./assets/css/style4todo.css">
</head>
<body>

    <?php
        session_start();

        if(!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] !== true)
        {
            header("Location: index.php");
            exit();
        }

        echo '<h1> Welcome '. htmlspecialchars($_SESSION['username']) .' !</h1>
              <a class="logout__button" href="logout.php">Logout</a>';
    ?>
    
    <main class="main">
            

        <!--============    CARD TO DO LIST Card    ==================-->
        <section class="todo__card" id="todo-card">
            
            <!--============    CARD TO DO LIST Content    ==================-->
            <div class="contents__card">

                <header class="header__card">
                    <h1>To do list</h1>
                    <h3>Get things done, one item at a time.</h3>
                    <hr>
                </header>

                <div class="list__task__container">
                    <ul class="list__task" id="list-tasks">
                        <p class="text__EmptyList" id="text-Empty">
                            List task is empty right now!
                            Let's add your first task now
                            <i class='bx bxs-coffee bx-tada'></i>
                        </p>
                        <!-- <li class="task__content" id="taskContent">
                            <p class="name__task" id="nameTask">${task}</p>
                            <div class="action__task">
                                <i class='bx bxs-check-square bx-sm bx__Checked' style="display: none" id="iChecked" onclick="checkTask(${idTask},${activeCheckBox})"></i>
                                <i class='bx bx-checkbox-square bx-md bx__noCheck' id="iNoCheck" onclick="checkTask(${idTask},${activeCheckBox})"></i>
                                <i class='bx bxs-trash bx-sm bx__trash' id="deleTask" onclick="deleteTask(${idTask})"></i>
                            </div>
                        </li> -->

                    </ul>
                </div>

                <footer class="add__work__footer">
                    <div class="add__work__contents">

                        <div class="input__work">
                            <h3>Add to the todo list</h3>
                            <input class="input__namework" type="text" id="input-field" placeholder="   Write a task you want to do.">
                        </div>
                        
                        <div class="add__actions">
                            <button class="add__work" id="addTaskButton">
                                <i class='bx bxs-bookmark-alt-plus'></i> ADD ITEM
                            </button>
                        </div>

                    </div>
                </footer>

            </div>

        </section>

        <!--============    waring if input value = empty    ==================-->
        <div class="popup__alert" id="popu-waring">
            <i class='bx bxs-x-circle icon__close' id="close-waring"></i>
            <div class="popup__content">
                <i class='bx bxs-error bx-tada'></i>
                <p>Please enter a task you want to do! Don't enter empty. Thasks ^^</p>
            </div>
        </div>

    </main>


    <!--==================  JavaScripts =======================-->
    <script defer src="./assets/js/main.js"></script>
</body>
</html>