<?php

require_once("Conexao.php");
require_once("serie.php");

    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once($map->Entidade_Obra());

class obraDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(obra $entObra) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO obra VALUE (:titulo, :sinopse, :foto, :idade, :dataL, :data, :hora)");
            $param = array(
                ":titulo" => $entObra->get_Titulo(),
                ":sinopse" => $entObra->get_Sinopse(),
                ":foto" => $entObra->get_Foto(),
                ":idade" => $entObra->get_FEtaria(),
                ":dataL" => $entObra->get_DataLancamento(),
                ":data" => date("Y/m/d"),
                ":hora" => date("h:i:s")
            );
            
            return $stmt->execute($param);            
        } catch (PDOException $ex) {
            echo " Falha ao Cadastrar: {$ex->getMessage()} ";
        }
    }
    
    function consultartitulo($titulo,$data) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM obra WHERE titulo = :titulo and data_lancamento = :data");
            $param = array(
                ":titulo" => $titulo,
                ":data" => $data,
                );


            $stmt->execute($param);

            return ($stmt->rowCount() > 0);
        } catch (PDOException $ex) {
            echo "Falha na consulta: {$ex->getMessage()} \n";
        }
    }
    function delete($titulo,$data){
        try{

                $stmt = $this->pdo->prepare("DELETE FROM obra WHERE titulo = :titulo and data_lancamento = :data");
                $param = array(
                        ":titulo"  => $titulo,
                        ":data"  => $data
                );

                $stmt->execute($param);

        }catch (PDOException $ex) {
            echo "Deu para apagar Não: {$ex->getMessage()}";
			return null;
        }
    }
    public function Get($titulo,$data){
        try {
            $stmt = $this->pdo->prepare("SELECT titulo,sinopse,foto,Faixa_Etaria_idade,data_lancamento,data_adicionado,hora_adicionado FROM obra WHERE titulo = :titulo and data_lancamento = :data");
            $param = array(
                ":titulo" => $titulo,
                ":data" => $data               
            );
            $stmt->execute($param);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $obra= new obra();
            $obra->set_Titulo($row['titulo']);
            $obra->set_Data_Add($row['data_adicionado']);
            $obra->set_Data_Lancamento($row['data_lancamento']);
            $obra->set_FEtaria($row['Faixa_Etaria_idade']);
            $obra->set_Foto($row['foto']);
            $obra->set_Sinopse($row['sinopse']);
            $obra->set_Hora_Add($row['hora_adicionado']);
            return $obra;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar obra : {$ex->getMessage()} \n";
        }
    }

        function atualizar(obra $entObra, $obra_titulo, $obra_dataLanc) {
        try {
            $titulo = $entObra->get_Titulo();
            $sinopse = $entObra->get_Sinopse();      
            $foto = $entObra->get_Foto();
            $FEtaria = $entObra->get_FEtaria();
            $DataLancamento = $entObra->get_DataLancamento();

            $stmt = $this->pdo->prepare("UPDATE obra SET titulo = :titulo, sinopse= :sinopse, foto= :foto, idade= :idade, dataL =:dataLancamento WHERE titulo = :obra_titulo and data_lancamento = :obra_dataLanc ");
            $param = array(
                ":titulo" => $titulo,
                ":sinopse" => $sinopse,
                ":foto" => $foto,
                ":idade" => $FEtaria,
                ":dataL" => $DataLancamento,
                ":obra_titulo" => $obra_titulo,
                ":data_lancamento" => $obra_dataLanc
            );
            
            return $stmt->execute($param);            
        } catch (PDOException $ex) {
            echo " Falha ao atualizar obra: {$ex->getMessage()} ";
        }
    }

}

?>