<?php
require("../global-methods.php");

//TODO Verificar se o email do usuário já existe no banco antes de continuar o cadastro

function salvar_alteracoes($id, $nome, $email, $datanascimento, $ativo){
    try {
        if ($id != "") {
            $stmt = db_connect()->prepare("UPDATE usuarios SET nome=?, email=?, datanascimento=?, ativo=? WHERE id = ?");
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $datanascimento);
            $stmt->bindParam(4, $ativo);
            $stmt->bindParam(5, $id);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success d-flex justify-content-center' width='80px' height='80px' role='alert'>
                    <p text-align= 'center'>Dados editados com sucesso!!</p>
                  </div>";
                anular_variaveis($id, $nome, $email, $datanascimento, $ativo);
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } else {
            echo "<div class='alert alert-danger d-flex justify-content-center' width='80px' height='80px' role='alert'>
                    <p text-align= 'center'>Id não identificado</p>
                  </div>";
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}

function anular_variaveis($id, $nome, $email, $datanascimento, $ativo){
    $id = null;
    $nome = null;
    $email = null;
    $datanascimento = null;
    $ativo = false;
}

function atualizar_tabela(){
    try {
        $stmt = db_connect()->prepare("SELECT * FROM usuarios");
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                imprimir_tabela($rs->id, $rs->nome, $rs->email, $rs->datanascimento, $rs->ativo);
            }
        } else {
            echo "<div class='alert alert-danger d-flex justify-content-center' width='80px' height='80px' role='alert'>
            <p text-align= 'center'>Erro: Não foi possível recuperar os dados do banco de dados</p>
          </div>";
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}

function action_deletar($id){
    if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
        try {
            $stmt = db_connect()->prepare("DELETE FROM usuarios WHERE id = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo "Registo foi excluído com êxito";
                $id = null;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
}

function preencher_form_com_informacoes($id){
    if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
        try {
            $stmt = selecionar_sql($id);
            if ($stmt->execute()) {
                $rs = $stmt->fetch(PDO::FETCH_OBJ);
                $id = $rs->id;
                $nome = $rs->nome;
                $email = $rs->email;
                $datanascimento = $rs->datanascimento;
                $ativo = $rs->ativo;

                imprimir_formulario_de_edicao($id, $nome, $email, $datanascimento, $ativo);

                return $rs;
                    
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
}
 
function selecionar_sql($id){
    $stmt = db_connect()->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    return $stmt;
}

function imprimir_formulario_de_edicao($id, $nome, $email, $datanascimento, $ativo){
    imprimir_campos_sem_input($id, $nome, $email, $datanascimento);

    if ($ativo == 1) {
        ativar_radio_ativo();
    } else {
        ativar_radio_inativo();
    }

    imprimir_botoes();
}

function imprimir_tabela($id, $nome, $email, $datanascimento, $ativo){
    echo "<tr>
            <td>" . $id . "</td>" .
            "<td>" . $nome . "</td>
            <td>" . $email . "</td>
            <td>" . $datanascimento . "</td>
            <td>" . $ativo . "</td>
            <td>
                <center>
                    <a class='btn' href=\"?act=upd&id=" . $id . "\">
                        <img src='../img/alterar.svg' class='icons'>
                    </a>"
                    . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                    . "<a class='btn' href=\"?act=del&id=" . $id . "\">
                        <img src='../img/excluir.svg' class='icons'>
                    </a>
                </center>
            </td>";
    echo "</tr>";
}

function imprimir_campos_sem_input($id, $nome, $email, $datanascimento){
    echo "<form class='row g-0 form-edicao' action='painel-adm.php' method='POST'>
    <div class='d-flex justify-content-evenly '>

        <input class='form-control' type='hidden' name='id' value='{$id}'/>
        <div class='mb-3 row input-adm' style='width:25%;>
            <label for='inputEmail4' class='form-label'>Nome</label>
            <input class='form-control' style='width:100%;' type='text' name='nome' value='{$nome}'/>
        </div>

        <div class='mb-3 row input-adm' style='width:25%;'>
            <label for='inputEmail4' class='form-label'>Email</label>
            <input class='form-control' type='text' name='email' value='{$email}'/>
        </div>

        <div class='mb-3 row input-adm' style='width:18%;'>
            <label for='inputEmail4' class='form-label'>Data de nascimento</label>
            <input class='form-control text-center'  type='date' name='datanascimento' value='{$datanascimento}'/>
        </div>
    ";
}

function ativar_radio_ativo(){
    echo "<div class='radio d-flex mt-4' style='width:5%;'>
    <div class='opcao-ativo mx-2'>
        <label for='ativo'>Ativo</label>
        <input type='radio' name='radio' id='ativo' value='1' checked='checked'>
    </div>
    <div class='opcao-inativo'>
        <label  for='inativo'>Inativo</label>
        <input type='radio' name='radio' id='inativo' value='0'>
    </div>
</div>";
}

function ativar_radio_inativo(){
    echo "<div class='radio  mt-4' style='width:5%;>
    <div class='opcao-ativo'>
        <label for='ativo'>Ativo</label>
        <input type='radio' name='radio' id='ativo' value='1'>
    </div>
    <div class='opcao-inativo'>
        <label for='inativo'>Inativo</label>
        <input type='radio' name='radio' id='inativo' value='0' checked='checked'>
    </div>
    </div>";
}

function imprimir_botoes(){
    echo "<div class=' mt-4' id='div-botaoSalvarAdm' style='width:5%;'>
    <input type='submit' name='salvar' value='Salvar' class='btn'/>" .
"</div>" .
"</div>" .
"</form>";
 }
