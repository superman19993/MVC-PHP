<?php
class UserModel extends BaseModel{
    const TABLE= 'users';

    public function getAll($select=['*'], $orderBys=[], $limit= 15){
 
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }

    public function findById($id){
        return __METHOD__;
    }

    public function delete(){
        return __METHOD__;
    }
}
?>