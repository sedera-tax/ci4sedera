<?php
namespace App\Libraries;

use App\Models\ProductModel;

class Products
{
    public function getRecentProducts($options)
    {
        $html = '';
        $limit = isset($options['limit']) ? $options['limit'] : 5;
        $model = new ProductModel();
        $data = $model->orderBy('created_at', 'DESC')->findAll($limit);

        if (!empty($data))
        {
            $html = '<ul>';
            foreach ($data as $el)
            {
                $html .= '<li>' . $el['name'] . ' ( ' . $el['price'] . ' )</li>';
            }
            $html .= '</ul>';
        }
        return $html;
    }
}