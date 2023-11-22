<section class="side-bar" id="sidebar">
        <a href="" class="brand">
            <span class="text">Admin</span>
        </a>
        <ul class="side-menu top">
            <li class="">
                <a href="dashboard.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php?invoices">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span class="text">Invoices</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php?bookings">
                    <i class="fa-solid fa-bookmark"></i>
                    <span class="text">Bookings</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php?employees">
                    <i class="fa-solid fa-users"></i>
                    <span class="text">Employees</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php?customers">
                    <i class="fa-solid fa-user-group"></i>
                    <span class="text">Customers</span>
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