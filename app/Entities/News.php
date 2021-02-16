<?php
namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class News extends Entity
{
    protected $attributes = [
        'id' => null,
        'title' => null,
        'slug' => null,
        'body' => null,
        'created_at' => null,
        'updated_at' => null,
    ];
    protected $dates = ['created_at', 'updated_at'];
}