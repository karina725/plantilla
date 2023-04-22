<ul class="nav justify-content-center">
    <?php if(isset(session()->user)){ ?>
        <li>
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                <?=session()->name?>
            </a>
        </li>
        <li>
            <a class="nav-link" href="logout">Salir</a>
        </li>
    <?php } ?>
</ul>