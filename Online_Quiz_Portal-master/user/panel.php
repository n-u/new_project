<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quizlet.io</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .temp{
            padding: 20px;
        }
    </style>
</head>

<body class="bg-primary overflow-hidden">
    <nav>
        <div class="logo d-flex justify-content-between p-9 temp">
            <img src="../Assets/logo-white.png" alt="logo" width="110" height="30">
            <button class="btn float-end btn-top p-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                <i class="fa fa-bars" style="font-size: 36px; color: white"></i>
            </button>
        </div>
    </nav>
    <div class="offcanvas offcanvas-start w-25" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
        <div class="offcanvas-header">
            <h6 class="offcanvas-title d-none d-sm-block" id="offcanvas">Menu</h6>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-0">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
                <li class="nav-item">
                    <a href="#" class="nav-link text-truncate">
                        <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link text-truncate">
                        <i class="fs-5 bi-speedometer2"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-truncate">
                        <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Orders</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fs-5 bi-bootstrap"></i><span class="ms-1 d-none d-sm-inline">Bootstrap</span>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-link text-truncate">
                        <i class="fs-5 bi-grid"></i><span class="ms-1 d-none d-sm-inline">Products</span></a>
                </li>
                <li>
                    <a href="#" class="nav-link text-truncate">
                        <i class="fs-5 bi-people"></i><span class="ms-1 d-none d-sm-inline">Customers</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>