<nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="margin:auto">
    <div class="container">
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=index&controller=product&type=import">Nhâp hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=index&controller=product&type=export">Bán hàng</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=revenue&controller=product">Lợi nhuận</a>
                </li>
                <?php if (isset($admin) & $admin['user_role'] == 1) : ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=user&action=index">Người dùng</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="index.php?controller=Auth&action=logout">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>