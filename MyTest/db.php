<?php
    date_default_timezone_set("Asis/Taipei");
    session_start();
    class DB
    {
        protected $dns = "mysql:host=local;charset=utf-8;dbname=web13";
        protected $table;
        protected $pdo;

        public function __construct($table) {
            $this->table = $table;
            $this->pdo = new PDO($dns, "root", "");
        }

        function a2s($reg)
        {
            $tmp = [];
            foreach($reg as $key => $data)
            {
                $tmp[] = "`$key` = '$data'";
            }
            return $tmp;
        }
        function All(...$reg)
        {
            $sql = "SELECT * FROM $this->table ";
            if(!empty($reg[0]))
            {
                if(is_array[0])
                {
                    $where = $this->a2s($reg[0]);
                    $sql = $sql . " where ". join(" && ", $where);
                }else
                {
                    $sql = $sql . $reg[0];
                }
            }

            if(!empty($reg[1]))
            {
                $sql = $sql . $reg[1];
            }
            return $this->fetchAll($sql);
        }
        function find($reg)
        {
            if(is_array($reg))
            {
                $where = $this->a2s($reg);
                $sql = $sql . " where ". join(" && ", $where);
        }else
            {
                $sql = $sql . $reg;    
            }

        }
        function fetchOne($sql)
        {
            return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        }
        function fetchAll($sql)
        {
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }
        function del($id)
        {
            $sql = "DELETE FORM $this->table WHERE ";
            if(is_array($reg))
            {
                $where = $this->a2s($reg);
            }else
            {
                
            }
        }
    }
    function dd($reg)
    {
        echo "<pre>";
        print_r($reg);
        echo "</pre>";
    }
    function to($url)
    {
        header("loaction:".$url);
    }
?>