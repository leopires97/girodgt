<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
                    <div class="mdk-drawer__content">
                        <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>
                            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                                <a href="#" class="flex d-flex align-items-center text-underline-0 text-body">
                                    <span class="avatar mr-3">
                                        <img src="assets/images/avatar/none.jpg" alt="avatar" class="avatar-img rounded-circle">
                                    </span>
                                    <span class="flex d-flex flex-column">
                                        <strong>Usuário</strong>
                                        <small class="text-muted text-uppercase"><?=$_SESSION['login']?></small>
                                    </span>
                                </a>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong>Usuário</strong></div>
                                            <div><?=$_SESSION['login']?></div> 
                                        </div>
                                        <div class="dropdown-divider"></div>                                 
                                        <a class="dropdown-item" href="#">Alterar Senha</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="?logout=1">Logout</a>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-heading sidebar-m-t">Menu</div>
					
                            <ul class="sidebar-menu">
<?php if($_SESSION['nivel']==1){?>								
                                <li class="sidebar-menu-item active open">
                                    <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                        <span class="sidebar-menu-text">Cadastros</span>
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu collapse show " id="dashboards_menu">
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='veiculos.php'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="veiculos.php">
                                                <span class="sidebar-menu-text">Veiculos</span>
                                            </a>
                                        </li>										
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='familias.php'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="familias.php">
                                                <span class="sidebar-menu-text">Familias</span>
                                            </a>
                                        </li>
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='modelos.php'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="modelos.php">
                                                <span class="sidebar-menu-text">Modelos / Marcas</span> 
                                            </a>
                                        </li>		
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='aplicacao.php'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="aplicacao.php">
                                                <span class="sidebar-menu-text">Aplicação</span> 
                                            </a>
                                        </li>	
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='produtos.php?site=caseih'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="produtos.php?site=caseih">
                                                <span class="sidebar-menu-text">Produtos Caseih</span> 
                                            </a>
                                        </li>	
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='produtos.php?site=newholland'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="produtos.php?site=newholland">
                                                <span class="sidebar-menu-text">Produtos Newholland</span> 
                                            </a>
                                        </li>	
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='produtos.php?site=caseihconstruction'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="produtos.php?site=caseihconstruction">
                                                <span class="sidebar-menu-text">Produtos Caseih Construction</span> 
                                            </a>
                                        </li>	
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='produtos.php?site=newhollandconstruction'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="produtos.php?site=newhollandconstruction">
                                                <span class="sidebar-menu-text">Produtos Newholland Construction</span> 
                                            </a>
                                        </li>											
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='usuarios.php'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="usuarios.php">
                                                <span class="sidebar-menu-text">Usuarios</span> 
                                            </a>
                                        </li>	
										
									
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='concessionarias.php'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="concessionarias.php">
                                                <span class="sidebar-menu-text">Concessionarias</span> 
                                            </a>
                                        </li>			
										
<!--                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='news.php'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="news.php">
                                                <span class="sidebar-menu-text">News</span> 
                                            </a>
                                        </li>	-->					
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='videos.php'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="videos.php">
                                                <span class="sidebar-menu-text">Videos</span> 
                                            </a>
                                        </li>			
<!--                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='paises.php'){echo ' active';}?>">
                                            <a class="sidebar-menu-button" href="paises.php">
                                                <span class="sidebar-menu-text">Paises</span> 
                                            </a>
                                        </li>	-->										
										
                                    </ul>
                                </li>

   <?php }?>                          

                                <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='pedidos.php'){echo ' active open';}?>" >
                                    <a class="sidebar-menu-button" data-toggle="collapse" href="#pages_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                                        <span class="sidebar-menu-text">Relatórios</span>
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu collapse" id="pages_menu">
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='pedidos.php'){echo ' active';}?>" >
                                            <a class="sidebar-menu-button" href="pedidos.php">
                                                <span class="sidebar-menu-text">Pedidos</span>
                                            </a>
                                        </li>
										
                                        <li class="sidebar-menu-item <?php if((basename($_SERVER['SCRIPT_NAME']))=='historico.php'){echo ' active';}?>" >
                                            <a class="sidebar-menu-button" href="historico.php">
                                                <span class="sidebar-menu-text">Histórico Usuários</span>
                                            </a>
                                        </li>										
										
										
                                        


                                    </ul>
                                </li>

                           
                          
                            </ul>
                            <div class="sidebar-heading"> <a href="http://www.fastinfo.com.br" target="_blank">By Fastinfo</a> </div>



                        </div>
                    </div>
                </div>