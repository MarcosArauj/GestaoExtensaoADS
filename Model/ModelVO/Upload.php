<?php

class Upload {

    private $Arquivo;
    private $Nome;
    private $Result;
    private $Msg;
    private static $Diretorio;

    function __construct($Diretorio = null) {
        self::$Diretorio = ( (string) $Diretorio ? $Diretorio : '../Arquivos/');
        if (!file_exists(self::$Diretorio) && !is_dir(self::$Diretorio)):
            mkdir(self::$Diretorio, 0777);
        endif;
    }

/*    public function Imagem(array $Imagem) {
        $this->Arquivo = $Imagem;
        $this->Nome = $Imagem['name'];
        $this->MoveArquivo();
    }*/

    //Faz upload do arquivo
    public function MoveArquivo() {
        if (move_uploaded_file($this->Arquivo['tmp_name'], self::$Diretorio . $this->Nome)):
            $this->Result = $this->Nome;
        else:
            $this->Result = false;

        endif;
    }

    function getResult() {
        return $this->Result;
    }

    function getMsg() {
        return $this->Msg;
    }

    public function File($File, $MaxFileSize = null) {
        $this->Arquivo = $File;
        $this->Nome = $File['name'];
        $MaxFileSize = ((int) $MaxFileSize ? $MaxFileSize : 2);

        $FileAccept = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf'];

        if ($this->Arquivo['size'] > ($MaxFileSize * (1024 * 1024))):
            $this->Result = false;
        elseif (!in_array($this->Arquivo['type'], $FileAccept)):
            $this->Result = false;
        else:
        $this->MoveArquivo();
        endif;
    }

}
