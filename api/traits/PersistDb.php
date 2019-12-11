<?php

namespace api\traits;

use api\models\querybuilder\Create;
use api\models\querybuilder\Update;

trait PersistDb {

    public function create($atrr) {
        
        $atrr = (array) $atrr;

        $sql = Create::sql($this->table, $atrr);
        
        $create = $this->conn->prepare($sql);

        return $create->execute($atrr);
    }

    public function update($atrr, $where) {
        
        $atrr = (array) $atrr;
        
        $sql = (new Update)->where($where)->sql($this->table, $atrr);

        $update = $this->conn->prepare($sql);
        $update->execute($atrr);

        return $update->rowCount();
    }
}