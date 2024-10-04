<div class="container-sm">
    <div class="d-flex flex-row-reverse">
        <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
            Cerrar sesión
        </button>
        <button class="btn btn-primary me-4 px-4 py-2 disabled" type="button">
            usuario@dominio.com
        </button>
        <button class="btn disabled mx-4" id="display-realtime-clock" type="button">
        </button>
    </div>
</div>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header ">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">SwiftCode</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p>¿Confirmar que desea salir?</p>
        <a href="<?php echo SALIR; ?>" class="nav-link"><button type="button"
                class="btn btn-outline-primary me-2 px-5">Salir</button></a>
    </div>
</div>