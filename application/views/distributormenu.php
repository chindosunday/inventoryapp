<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <!-- <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a> -->
        </li><!-- End Dashboard Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo site_url('profile'); ?>">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo site_url('requestpage/myrequest'); ?>">
                <i class=" bi bi-person"></i>
                <span>View Requests</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Stock Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <!-- <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>Create New Stock</span>
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo site_url('viewstock'); ?>">
                        <i class="bi bi-circle"></i><span>View All Stock & Prices</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>View all Staff</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>View all Distributors</span>
            </a>
        </li>
 -->


        <!-- 
        <li class="nav-item">
            <a class="nav-link collapsed" href="charts-chartjs.html">
                <i class="bi bi-bar-chart"></i><span>Charts</span>
            </a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <!-- 
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a> -->
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo site_url('logout'); ?>">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->

        <!-- End Error 404 Page Nav -->
        <!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->