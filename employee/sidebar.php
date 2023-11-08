<section class="side-bar" id="sidebar">
        <a href="" class="brand">
            <span class="text"><?php if (isset($_SESSION['employee_name'])) {
                echo $_SESSION["employee_name"];
            } ?></span>
        </a>
        <ul class="side-menu top">
            <!-- <li class="">
                <a href="home.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li> -->
            <li>
                <a href="home.php?bookings">
                    <i class="fa-solid fa-bookmark"></i>
                    <span class="text">Bookings</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="">
                    <i class="fa-solid fa-gear"></i>
                    <span class="text">Settings</span>
                </a>
            </li>

            <li>
                <a href="../index.php" class="logout">
                <i class="fa-solid fa-house"></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- <script>
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        allSideMenu.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});
    </script> -->