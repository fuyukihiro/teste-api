<?php

namespace api\models\querybuilder;

class Update {

    private $where;

    public function where($where) {
        $this->where = $where;

        return $this;
    }

    public function sql($table, $atrr) {

        $sql = "UPDATE {$table} SET ";

        unset($atrr[array_keys($this->where)[0]]);

        foreach ($atrr as $campo => $value) {
            $sql .= "{$campo} = :{$campo}, ";
        }
        
        $sql = rtrim($sql, ', ');

        $where = array_keys($this->where);

        $sql .= " WHERE {$where[0]} = :{$where[0]}";
        
        return $sql;
    }

}