<?php
namespace App\Libraries;

use App\Models\ProductModel;

class Products
{
    public function getRecentProducts(array $options = [])
    {
        $limit = isset($options['limit']) ? $options['limit'] : 5;
        $model = new ProductModel();
        $data['products'] = $model->orderBy('created_at', 'DESC')
                ->findAll($limit);

        return view('partials/recentProducts', $data);
    }
}