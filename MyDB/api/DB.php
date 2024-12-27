<?php
    class DB
    {
        protected $dns="mysql:host=localhost;charset=utf8;dbname=db99";
        protected $table;
        protected $pdo;

        function __construct($table)
        {
            $this->table = $table;
            $this->pdo = new PDO($this->dns, 'root', '');
        }

        function a2s($array)
        {
            $tmp=[];
            foreach($array as $key => $val)
            {
                $tmp[] = "`key`='$val'";
            }
            return $tmp;
        }

        function save($array)
        {
            if(isset($array['id']))
            {
                $id = $array['id'];
                unset($array['id']);
                $tmp = $this->a2s($array);
                $sql = "UPDATE $this->table SET ".join(',',$tmp)." WHERE `id`='$id'";
            }else
            {
                $cols = array_keys($array);
                $sql = "INSERT INTO $this->table (`".join("`,`",$cols)."`) VALUES ('".join("','",$array)."')";
            }
            $this->pdo->exec($sql);
        }

        function del($id)
        {
            $sql = "DELETE $this->table WHERE ";

            if(is_array(id))
            {
                $tmp = $this->a2s($id);
                $sql = $sql.join(" && ", $tmp);
            }else
            {
                $sql = $sql."`id`='$id'";
            }
            $this->pdo->exec($sql);
        }

        function all(...$arg)
        {
            $sql="SELECT * FROM $this->table ";
            if(!empty($arg[0]))
            {
                if(is_array($arg[0]))
                {
                    $tmp = $this->a2s($arg);
                    $sql = $sql." WHERE ".join(" && ", $tmp);
                }else
                {
                    $sql = $sql.$arg[0];
                }
            }

            if(!empty($arg[1]))
            {
                $sql= $sql.$arg[1];
            }

            return $this->fetchAll($sql);

        }

        function find($id)
        {
            $sql="SELECT * FROM $this->table WHERE ";
            if(is_array($id))
            {
                $tmp = $this->a2s($id);
                $sql = $sql.join(" && ", $tmp);
            }else
            {
                $sql = $sql."`id`='$id'";
            }
            return $this->fetchOne($sql);
        }

        function fetchOne($sql)
        {
            //echo $sql;
            return $this->pdo->query($sql)->fetchOne(PDO::FETCH_ASSOC);
        }
        function fetchAll($sql)
        {
            //echo $sql;
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }

        function count($where=[])
        {
            return $this->math("count", "*", $where);
        }
        function sum($col, $where=[])
        {
            return $this->math("sum", $col, $where);
        }
        function avg($col, $where=[])
        {
            return $this->math("avg", $col, $where);
        }
        function max($col, $where=[])
        {
            return $this->math("max", $col, $where);
        }
        function min($col, $where=[])
        {
            return $this->math("min", $col, $where);
        }

        function math($math, $col, $where=[])
        {
            $sql = "SELECT $math($col) $this->table ";
            if(!empty($where))
            {
                $tmp = $this->a2s($where);
                $sql = $sql." WHERE ".join(" && ", $tmp);
            }
            return $this->pdo->query($sql)->fetchColumn();
        }
    }

    function q($sql)
    {
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=db99");
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function dd($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    function to($url)
    {
        header("location:".$url);
    }
?>