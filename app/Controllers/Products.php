<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;

class Products extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $model = new ProductModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    // get single product
    public function show($id = null)
    {
        $model = new ProductModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if ($data)
        {
            return $this->respond($data);
        }
        else
        {
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    // create a product
    public function create()
    {
        if ($this->request->getMethod() === 'post'
            && $this->validate([
                'product_name' => 'required|min_length[3]|max_length[200]',
                'product_price'  => 'required|numeric',
            ]))
        {
            $model = new ProductModel();
            $data = [
                'name' => $this->request->getVar('product_name'),
                'price' => $this->request->getVar('product_price')
            ];
            $model->insert($data);
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Saved'
                ]
            ];
            return $this->respondCreated($response);
        }
        else
        {
            return $this->failValidationError("Invalid Product");
        }
    }

    // update product
    public function update($id = null)
    {
        if ($this->request->getMethod() === 'put'
            && $this->validate([
                'product_name' => 'required|min_length[3]|max_length[200]',
                'product_price'  => 'required|numeric',
            ]))
        {
            $model = new ProductModel();
            $data = $model->find($id);
            if ($data)
            {
                $input = $this->request->getRawInput();
                $data = [
                    'name' => $input['product_name'],
                    'price' => $input['product_price']
                ];
                $model->update($id, $data);
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'Data Updated'
                    ]
                ];
                return $this->respond($response);
            }
            else
            {
                return $this->failNotFound('No Data Found with id '.$id);
            }
        }
        else
        {
            return $this->failValidationError("Invalid Product");
        }
    }

    // delete product
    public function delete($id = null)
    {
        $model = new ProductModel();
        $data = $model->find($id);
        if ($data)
        {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }
        else
        {
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
}