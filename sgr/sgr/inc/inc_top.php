<div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0" id="navbar" data-primary>
                    <div class="container-fluid p-0">

                        <!-- Navbar toggler -->

                        <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>


                        <!-- Navbar Brand -->
                        <a href="<?=URL?>" class="navbar-brand ">
                            <img class="navbar-brand-icon" src="assets/images/icone.png" width="22" alt="">
                            <span>Sistema Especifer</span> 
                        </a>


                        <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                            <li class="nav-item dropdown">
                                <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                    <img src="assets/images/avatar/none.jpg" class="rounded-circle" width="32" alt="Frontted">
                                    <span class="ml-1 d-flex-inline">
                                        <span class="text-light"><?=$_SESSION['login']?></span>
                                    </span>
                                </a>
                                <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-item-text dropdown-item-text--lh">
                                        <div><strong>Usuário</strong></div>
                                        <div><?=$_SESSION['login']?></div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="?logout=1">Logout</a>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>