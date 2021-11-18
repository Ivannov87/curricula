<div class="col-sm-3"></div>
<div class="col-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cargar</h4>
            <p class="card-description">
                Documento
            </p>
            <form class="forms-sample" method="POST"  enctype="multipart/form-data" >

                <div class="form-group">
                    <label for="exampleFormControlFile1">Elige un documento</label>
                    <input type="file" accept=".pdf,.doc,.docx" class="form-control-file" id="documentoI" name="documentoI" required>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputDesc1">Descripción del cambio por</label>
                    <input type="text" class="form-control" id="cambioI" placeholder="Descripción" name="cambioI" required >
                </div>
                 <div class="form-group">
                    <label for="exampleInputName1">Subido por</label>
                    <input type="text" class="form-control" id="usuarioI" placeholder="Name" name="usuarioI" value="<?php print $_SESSION["Usr"] ?>" readonly required >
                    <input type="hidden" id="usuarioIdI" name="usuarioIdI" value="<?php print $_SESSION["usrId"] ?>"/>
                </div>
               
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a  class="btn btn-light" href="inicio.php?root=principal">Cancel</a>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-3"></div>

<?php 

$registrar = new ArchivoC();
$registrar -> InsertF();

?>