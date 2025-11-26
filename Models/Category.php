<?php

namespace Project\Models;
use Project\Core\BaseEntity;

class Category extends BaseEntity{
    public string $name;
    public string $description;

    public function __construct(string $name){
        parent::__construct();
        $this->name = $name;
    }

    public function getName(): string{
        return $this->name;
    }
    public function toArray(): array{
        return [
            'type'=>'category',
            'name' => $this->name,
            'description' => $this->description,
            'createdAt' => $this->createdAt
        ];
    }
}