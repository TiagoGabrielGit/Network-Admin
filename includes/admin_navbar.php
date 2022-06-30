<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">CRM</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/pessoas/pessoas.php">
                <i class="bi bi-person"></i>
                <span>Pessoas</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/empresas/empresas.php">
                <i class="bi bi-person-fill"></i>
                <span>Empresas</span>
            </a>
        </li>



        <li class="nav-heading">Administração</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/cadastros/cadastros.php">
                <i class="bi bi-file-diff"></i>
                <span>Cadastros</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#gerenciamento-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Gerenciamento</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="gerenciamento-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="/gerenciamento/usuarios/usuarios.php">
                        <i class="bi bi-circle"></i><span>Usuários</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#sistema-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-info-circle"></i><span>Sistema</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="sistema-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="/sistema/changelog.php">
                        <i class="bi bi-circle"></i><span>Changelog</span>
                    </a>
                </li>

                <li>
                    <a href="/sistema/relataBug/relateBug.php">
                        <i class="bi bi-circle"></i><span>Relatar um problema</span>
                    </a>
                </li>

                <li>
                    <a href="/sistema/sugestaoMelhoria/sugereMelhoria.php">
                        <i class="bi bi-circle"></i><span>Sugerir uma melhoria</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>

</aside><!-- End Sidebar-->