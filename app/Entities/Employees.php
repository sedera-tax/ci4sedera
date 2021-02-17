<?php
namespace App\Entities;

use CodeIgniter\Entity;

class Employees extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'email' => null
    ];
}