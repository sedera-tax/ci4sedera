<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\EmployeesModel;
use App\Entities\Employees as EmployeesEntity;

class Employees extends ResourceController
{
    use ResponseTrait;

    // all users
    public function index($id = null)
    {
        $model = new EmployeesModel();
        $data['employees'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        return $this->getEmployee($id);
    }

    // create
    public function create()
    {
        $model = new EmployeesModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Employee created successfully'
            ]
        ];
        return $this->respondCreated($response);
    }

    // single user
    public function getEmployee($id = null)
    {
        $model = new EmployeesModel();
        $data = $model->where('id', $id)->first();
        if ($data)
        {
            return $this->respond($data);
        }
        else
        {
            return $this->failNotFound('No employee found');
        }
    }

    // update
    public function update($id = null)
    {
        $model = new EmployeesModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Employee updated successfully'
            ]
        ];
        return $this->respond($response);
    }

    // delete
    public function delete($id = null)
    {
        $model = new EmployeesModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data)
        {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Employee successfully deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }
        else
        {
            return $this->failNotFound('No employee found');
        }
    }
}