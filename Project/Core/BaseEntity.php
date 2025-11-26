<?php
namespace Project\Core;

abstract class BaseEntity implements IEntity {

    protected string $createdAt;

    public function __construct() {
        $this->createdAt = date("Y-m-d H:i:s.u");
    }

    public function getCreatedAt(): string {
        return $this->createdAt;  // dodan točka-zarez
    }
}
?>
