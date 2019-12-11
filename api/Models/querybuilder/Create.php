<?php

namespace api\models\querybuilder;

class Create {

    public static function sql($table, $atrr) {
        
        $sql = "INSERT INTO {$table}(";
        $sql .= implode(',', array_keys($atrr)).') values(';
        $sql .= ':'.implode(', :', array_keys($atrr)).')';

        return $sql;
    }
}