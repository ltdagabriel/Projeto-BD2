<form id="cadastro" name="cadastro" method="get">
    <div class="form-group">
            <label for="exampleInputName2">Nome <a style="color:red">*</a></label>
            <input name="nome" type="text" class="form-control" id="exampleInputName2" placeholder="Nome do Personagem">
    </div>

    <div class="form-group">
            <label for="exampleInputLink2">Foto</label>
            <input name="foto" type="url" class="form-control" id="exampleInputName2" placeholder="<imagemlink>">
    </div>


    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="cadastrar_personagem" type="submit" class="btn btn-default">Enviar</button>
                    </div>
            </div>
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="limpar" type="reset" class="btn btn-default">Limpar</button>
                    </div>
            </div>
            <div class="form-group">
            <span class="style1" style="color:red">* Campos com * s&atilde;o obrigat&oacute;rios!          </span>
            </div>
    </div>
</form>

<?php
if (isset($_GET['cadastrar_personagem'])) {
    require_once 'classes/Entidades/personagem.php';
    require_once 'classes/ConectBD/personagem.php';
    $personagemDAO = new personagemDAO();
    $personagem = new personagem();
    $personagem->set_nome($_GET['nome']);
    $personagem->set_foto($_GET['foto']);

    if ($personagemDAO->cadastrar($personagem)) {
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Cadastrado com sucesso');
        </script>
        <?php
    }     
    else{
         ?>
            <script language='javascript' type='text/javascript'>
                alert('Ja existente');
            </script>
        <?php
    }
}

?>