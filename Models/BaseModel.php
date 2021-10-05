<?php
class BaseModel extends Database{

    protected $connect;

    public function __construct(){
        $this->connect= $this->connect();// call Database.connect function.
    }

    public function all($table, $select= ['*'], $orderBys= [], $limit=15){

        $columns= implode(',', $select);            //concatenate chosen columns with ',' in between, ex: id,name,level 

        $orderByString = implode(' ', $orderBys);   //concatenate chosen columns with order with ' ' in between, ex: id asc.
        
        if ($orderByString){
            $sql= "SELECT ${columns} FROM ${table} ORDER BY ${orderByString} LIMIT ${limit}";   //
        }else{
            $sql= "SELECT ${columns} FROM ${table} LIMIT ${limit}";
        }

        $query= $this->_query($sql);

        $data=[];
        while ($row = mysqli_fetch_assoc($query)){
            array_push($data, $row);
        }
        return $data;
    }

    public function getById($table, $select= ['*'], $id){

        $columns= implode(',', $select);
        $sql= "SELECT ${columns} FROM ${table} WHERE id= ${id} LIMIT 1";
        $query= $this->_query($sql);
        return mysqli_fetch_assoc($query);

    }

    public function store(){

    }

    public function update(){

    }

    public function destroy(){

    }

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
}
?>