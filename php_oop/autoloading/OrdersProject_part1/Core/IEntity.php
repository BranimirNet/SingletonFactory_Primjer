<?php
namespace OrdersProject\Core;

interface IEntity{
    public function add(array $data);
    public function getAll(): array;
}

?>
