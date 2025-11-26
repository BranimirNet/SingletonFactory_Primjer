<?php
namespace OrdersProject\Core;

abstract class BaseEntity implements IEntity{

    protected string $file;

    protected function SaveToJson(array $record){
        $data = [];
        if(file_exists($this->file)){
            $data = json_decode(file_get_contents($this->file),true);
        }

        $data[]=$record;

        file_put_contents($this->file,json_encode($data,JSON_PRETTY_PRINT),LOCK_EX);
    }

    public function getAll(): array{
        if(!file_exists($this->file)){
            return [];
        }
        return json_decode(file_get_contents($this->file),true);
    }

    abstract public function add(array $data);
}
?>