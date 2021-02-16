<?php
namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $allowedFields = ['title', 'slug', 'body'];
    protected $returnType = 'App\Entities\News';
    protected $useTimestamps = true;

    public function getNews($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    }

    public function getNewsById($id)
    {
        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }
}