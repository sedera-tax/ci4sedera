<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class NewsModel extends Model
{
    protected $db;

    protected $table = 'news';
    protected $allowedFields = ['title', 'slug', 'body'];
    protected $returnType = 'App\Entities\News';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * @param false $slug
     * @return array|object|null
     */
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

    /**
     * @param $id
     * @return array|object|null
     */
    public function getNewsById($id)
    {
        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    /**
     * @param int $limit
     * @return array
     */
    public function getLastNews($limit = 5)
    {
        return $this->orderBy('created_at', 'DESC')
            ->get($limit)
            ->getResult();
    }

    /**
     * @param int $limit
     * @return array
     */
    public function getRandomNews($limit = 5)
    {
        return $this->orderBy('created_at', 'RANDOM')
            ->get($limit)
            ->getResult();
    }
}