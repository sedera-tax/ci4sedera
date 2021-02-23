<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NewsModel;
use App\Entities\News as NewsEntity;

class News extends Controller
{
    public function index()
    {
        $model = new NewsModel();
        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = NULL)
    {
        $model = new NewsModel();
        $data['news'] = $model->getNews($slug);

        if (empty($data['news']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
        }

        $data['title'] = $data['news']['title'];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view_cell('\App\Libraries\Products::getRecentProducts', ['limit' => 5]);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $newsModel = new NewsModel();

        if ($this->request->getMethod() === 'post'
            && $this->validate([
                'title' => 'required|min_length[3]|max_length[255]',
                'body'  => 'required',
            ]))
        {
            $slug = url_title($this->request->getPost('title'), '-', TRUE);
            if ($newsModel->getNews($slug) != NULL)
            {
                $slug = url_title($this->request->getPost('title') . ' ' . uniqid(), '-', TRUE);
            }

            $news = new NewsEntity();
            $news->title = $this->request->getPost('title');
            $news->slug = $slug;
            $news->body = $this->request->getPost('body');
            $newsModel->save($news);

            return redirect()->route('news');
        }
        else
        {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('templates/footer');
        }
    }

    public function test($id = NULL)
    {
        if (empty($id))
        {
            throw new \Exception('No id found');
        }

        $model = new NewsModel();
        $data['news'] = $model->getNewsById($id);

        if (empty($data['news']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $id);
        }

        echo '<pre>';var_dump($data['news']);die();
    }
}