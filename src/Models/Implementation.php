<?php
namespace Ecomais\Models;

use Ecomais\Models\DataException;
use Ecomais\Services\Data;

class Implementation
{

    private string $passwd;
    private string $imageName;
    private string $key;
    private Data $sql;

    public function __construct() 
    {
        $this->sql = new Data();
    }

    /**
     * Criptografia Bcrypt
     * @param string $passwd
     * senha 
     * @return string 
     * Retorna uma nova criptografia
     */
    public function criptPasswd(string $passwd): string
    {
        if (empty($passwd)) throw new DataException("Null value",DataException::NOT_ACCEPTABLE);

        $this->passwd =  password_hash($passwd, PASSWORD_DEFAULT);
        return $this->passwd;
    }

    /**
     * Criptografia de imagem
     * @param string $file
     * um array da variável global
     * @return string
     */
    public function criptImage(array $file): string
    {
        if (empty($file)) throw new DataException("Null file",DataException::NOT_ACCEPTABLE);
        $this->imageName = strtoupper(uniqid(hash("sha512",time() . pathinfo($file["name"])["filename"]))) . "." . pathinfo($file["name"])["extension"];

        return $this->imageName;
    }

    /**
     * Cria um token de 8 bits
     * @param string $param
     * @return string
     */
    public function createToken(string $param): string
    {
        if (empty($param)) throw new DataException("Null value",DataException::NOT_ACCEPTABLE);

        $numberRandom = random_int(100,1999);
        $this->key =  hash("sha512", uniqid(imap_binary($param)) . $numberRandom);

        return $this->key;
    }

    /**
     * @param string $param
     * O email a ser verificado
     * @return bool
     * Retorna true | false 
     */
    public function isEmail(string $param): bool
    {
        if (empty($param)) throw new DataException("Null value",DataException::NOT_ACCEPTABLE);

       return (preg_match("/^(.)+\@[a-zA-Z]+\.[a-zA-Z]+$/i",$param)) ? true : false;
    }

    /**
     * Verifica se o usuário está logado
     * @return bool
     */
    public function isLogged($table):bool
    {
        if (isset($_COOKIE['_id'])) {
            $this->getSession(['read_and_close'  => true]); 
                $token =  hash("whirlpool","ARBDL{$_SERVER['REMOTE_ADDR']}ARBDL{$_SERVER['HTTP_USER_AGENT']}");
                $id = (strcasecmp($table,"empresa") === 0) ? "id_empresa" : "id_usuario";

                $this->sql->open();
                $row = $this->sql
                        ->show($table,"","$id = ?",3)
                        ->prepareParam([$_COOKIE['_id']])
                        ->executeSql();
                $this->sql->close();

                if (!empty($row)) {
                    if(
                        strcasecmp($_COOKIE["ECOSESLOGIN"], $token) === 0 && 
                        strcasecmp($_COOKIE['_id'],$row[$id]) === 0
                      ) 
                        return true;
                }

        } 
        return false;
    }

    /**
     * @param array $arr
     * Um array associativo com chave/valor ou array único com chave/valor
     * @return object
     */
    public function toObject(array $arr): object
    {
        $object = new class{};
        foreach($arr as $k => $v) {
            if(is_array($v))
                foreach($v as $key => $val) $object->$key = $val;
            else
            $object->$k = $v;
        }  
        return $object;
    }

    /**
     * @param object $object
     * Um objeto 
     * @return array
     */
    public function toArray(object $object): array
    {
        $array = array();
        foreach($object as $key => $val) $array[$key] = $val;
        return $array;
    }

    /**
     * Por questões de usar muito a session verificando se ela está ativa
     * Foi criada essa função pra diminuir repetição de código
     * @return bool
    */
    public function getSession(array $optionsSession = []): bool
    {
        if (session_status() == PHP_SESSION_DISABLED || session_status() == PHP_SESSION_NONE) {
            session_start($optionsSession);
            return true;
        }

        return false;
    }

}