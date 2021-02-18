<?php
class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function selectAll($table)
    {
        try {
            $statement = $this->pdo->prepare("select * from {$table}");
            $statement->execute();
        } catch (PDOException $e) {
            return $e->getmessage();
        }
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function select($table, $col, $val)
    {
        try {
            //dd("select * from {$table} where {$col}={$val}");
            $statement = $this->pdo->prepare("select * from {$table} where {$col}='{$val}'");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function selectM($table, $field, $col, $val, $limit, $offset)
    {
        try {
            //dd("select * from {$table} where {$col}={$val}");
            $statement = $this->pdo->prepare("select `$field` from {$table} where {$col}='{$val}' limit $limit offset $offset");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    // private function where(){

    // }
    public function query($string)
    {
        //dd($string);
        try {
            $statement = $this->pdo->prepare($string);
            //dd($statement);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            return $e->getmessage();
        }
    }
    public function updateOrInsert($table, $condition_parameters, $column_parrameters)
    {
        // dd(array_keys($condition_parameters));
        // dd($column_parrameters);
        $where = '';
        foreach ($condition_parameters as $k => $v) {
            if (!empty($where))
                $where .= " AND ";
            $where .= "$k = $v";
        }
        // dd($where);
        // echo "select count(*) num from $table where $where";
        $num = (int)$this->query("select id num from $table where $where")[0]->num;
        // dd($num);
        if (!$num)
            return $this->insert($table, array_merge($condition_parameters, $column_parrameters));
        return $this->update($table, $column_parrameters, $num);
    }
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(',', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        // dd($sql);
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
            // dd($this->pdo->lastInsertId());
            return $this->pdo->lastInsertId();
        } catch (Exception $e) {
            // dd($e->getCode());
            return $e->getmessage();
        }
    }
    public function update($table, $parameters, $where)
    {
        $sql = sprintf(
            'update %s set %s where id=%d',
            $table,
            implode(',', array_map(function ($k) {
                return "$k=:$k";
            }, array_keys($parameters))),
            $where
        );
        // dd($sql);
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
            // dd($this->pdo->lastInsertId());
            return 1;
        } catch (Exception $e) {
            return $e->getmessage();
        }
    }
    public function delete($table, $id)
    {
        try {
            //echo 'try';
            $statement = $this->pdo->prepare("delete from {$table} where `id`=$id");
            $statement->execute();
            return 1;
        } catch (Exception $e) {
            //echo 'catch';
            return $e->getMessage();
        }
    }
}
