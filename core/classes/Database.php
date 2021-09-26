<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{
    /*gestão do banco de dados*/

    private $ligacao;       //variavel ligacao
    /*
        1. ligar
        2. comunicar
        3. fechar
    */
//=====================================================================================================
    private function ligar()         //funcao para 1.ligar à base de dados
    {
        $this->ligacao = new PDO(           //cria um objeto PDO
            'mysql:'. 
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'. 
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)

        //seria como ter ::: new PDO('mysql:host=localhost;dbname=php_store') 
        );

        //debug (mostrar informações de erro)
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //PDO::ERROR_WARNING = a por 1
    }
//=====================================================================================================
    private function desligar()      //funcao para 3.desligar a conexão à base de dados   
    {   
        $this->ligacao=null;
    }
//=====================================================================================================
//========== C R U D ==================================================================================
//=====================================================================================================
    public function select($sql, $parametros = null)    //$parametros null impede SQL injection, ataques de hackers
    {
        //verifica se é uma instrução SELECT
        if (!preg_match("/^SELECT/i ",$sql))        //se nao começar por instrução select ^(minusc/MAIUSC)
        {
            throw new Exception('Base de dados - Não é uma instrução SELECT');
        }

        //funcao 1.ligar à BD
        $this->ligar();     

        $resultados=null;       //resultados é a variável para devolver resultados da função select
        
        //comunica
        try         //executar a query metodo try catch
        {
            //comunicação com BD funcao 2.Comunicar
            if(!empty($parametros))     //se existirem parametros
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultado= $executar->fetchAll(PDO::FETCH_CLASS);      //todas os resultados vêm em forma de classe, objetos PDO
            }
            else
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();       //se não tiver parametros executa igual mas sem parametros
                $resultado= $executar->fetchAll(PDO::FETCH_CLASS); 
            }
        } 
        catch (PDOException $e)   //para ter acesso ao erro, uso a variável $e
        {
            //caso exista erro
            return false;
        }


        $this->desligar();  //funcao 3.desligar da BD

        return $resultado;  //devolver os resultados obtidos
    }
//=====================================================================================================
    public function insert($sql, $parametros = null)    //$parametros null impede SQL injection, ataques de hackers
    {
        //verifica se é uma instrução INSERT
        if (!preg_match("/^INSERT/i ",$sql))        //se nao começar por instrução select ^(minusc/MAIUSC)
        {
            throw new Exception('Base de dados - Não é uma instrução INSERT');
        }

        //funcao 1.ligar à BD
        $this->ligar();     

      
        //comunica
        try         //executar a query metodo try catch
        {
            //comunicação com BD funcao 2.Comunicar
            if(!empty($parametros))     //se existirem parametros
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }
            else
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();       //se não tiver parametros executa igual mas sem parametros 
            }
        } 
        catch (PDOException $e)   //para ter acesso ao erro, uso a variável $e
        {
            //caso exista erro
            return false;
        }
        $this->desligar();  //funcao 3.desligar da BD
    }
//=====================================================================================================
    public function update($sql, $parametros = null)    //$parametros null impede SQL injection, ataques de hackers
    {
        //verifica se é uma instrução UPDATE
        if (!preg_match("/^UPDATE/i ",$sql))        //se nao começar por instrução UPDATE ^(minusc/MAIUSC)
        {
            throw new Exception('Base de dados - Não é uma instrução UPDATE');
        }

        //funcao 1.ligar à BD
        $this->ligar();     

    
        //comunica
        try         //executar a query metodo try catch
        {
            //comunicação com BD funcao 2.Comunicar
            if(!empty($parametros))     //se existirem parametros
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }
            else
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();       //se não tiver parametros executa igual mas sem parametros 
            }
        } 
        catch (PDOException $e)   //para ter acesso ao erro, uso a variável $e
        {
            //caso exista erro
            return false;
        }
        $this->desligar();  //funcao 3.desligar da BD
    }
//=====================================================================================================
public function delete($sql, $parametros = null)    //$parametros null impede SQL injection, ataques de hackers
    {
        //verifica se é uma instrução DELETE
        if (!preg_match("/^DELETE/i ",$sql))        //se nao começar por instrução DELETE ^(minusc/MAIUSC)
        {
            throw new Exception('Base de dados - Não é uma instrução DELETE');
        }

        //funcao 1.ligar à BD
        $this->ligar();     


        //comunica
        try         //executar a query metodo try catch
        {
            //comunicação com BD funcao 2.Comunicar
            if(!empty($parametros))     //se existirem parametros
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }
            else
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();       //se não tiver parametros executa igual mas sem parametros 
            }
        } 
        catch (PDOException $e)   //para ter acesso ao erro, uso a variável $e
        {
            //caso exista erro
            return false;
        }
        $this->desligar();  //funcao 3.desligar da BD
    }

//=====================================================================================================
//====   genérica =====================================================================================
//=====================================================================================================
public function statement($sql, $parametros = null)    //$parametros null impede SQL injection, ataques de hackers
    {
        //verifica se é uma instrução diferente das anteriores, nem SELECT, nem INSERT nem UPDATE nem DELETE
        if (preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i ",$sql))        //se nao começar por instrução nem SELECT, nem INSERT nem UPDATE nem DELETE ^(minusc/MAIUSC)
        {
            throw new Exception('Base de dados - Instrução inválida');
        }

        //funcao 1.ligar à BD
        $this->ligar();     


        //comunica
        try         //executar a query metodo try catch
        {
            //comunicação com BD funcao 2.Comunicar
            if(!empty($parametros))     //se existirem parametros
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }
            else
            {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();       //se não tiver parametros executa igual mas sem parametros 
            }
        } 
        catch (PDOException $e)   //para ter acesso ao erro, uso a variável $e
        {
            //caso exista erro
            return false;
        }
        $this->desligar();  //funcao 3.desligar da BD
    }
}

    /*
    CRUD
    Create  - INSERT
    Read    - SELECT
    Update  - UPDATE
    Delete  - DELETE

define ('MYSQL_SERVER',      'localhost');       
define ('MYSQL_DATABASE',    'php_store');
define ('MYSQL_USER',        'user_php_store');
define ('MYSQL_PASS',        '');
define ('MYSQL_CHARSET',     'utf8');
*/

?>