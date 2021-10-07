<?php
class UserModel extends BaseModel{
    const TABLE= 'users';

    public function getAll($select=['*'], $orderBys=[], $limit= 15){
 
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }

    public function find($id){
        return $this->getById(self::TABLE, $id);
    }

    public function store($data){
        return $this->create(self::TABLE, $data);
    }

    public function updateData($id, $data){
        return $this->update(self::TABLE, $id, $data);
    }
    public function destroy($id){
        return $this->delete(self::TABLE, $id);
    }

    public function login($username, $password){
        return $this->getInfo(self::TABLE, $username, $password);
    }
}
?>