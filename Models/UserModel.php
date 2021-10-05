<?php
class UserModel extends BaseModel{
    const TABLE= 'users';

    public function getAll($select=['*'], $orderBys=[], $limit= 15){
 
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }

    public function findById($select=['*'], $id){
        return $this->getById(self::TABLE, $select, $id);
    }

    public function store($data){
        return $this->create(self::TABLE, $data);
    }
    public function delete(){
        return __METHOD__;
    }
}
?>