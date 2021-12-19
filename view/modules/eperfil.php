<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Perfiles</h4>
            <p class="card-description">
                Editar Perfil
            </p>
            <form class="forms-sample" method="POST">
          

                <?php
                $edit = new PerfilC();
                $edit->EditP();
                
                $update = new PerfilC();
                $update->UpdateP();
                ?>

            </form>
        </div>
    </div>
</div>
