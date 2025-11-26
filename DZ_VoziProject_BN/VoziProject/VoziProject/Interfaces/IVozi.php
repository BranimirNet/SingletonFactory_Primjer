<?php
namespace VoziProject\Interfaces;

use VoziProject\Vehicles\Vehicle;

interface IVozi
{
    public function vozi(Vehicle $v): string;
}
