<?php
namespace App\Models;

use CodeIgniter\Model;

class EmployeesModel extends Model
{
    protected $table = 'employees';
    protected $allowedFields = ['name', 'email'];
    protected $returnType = 'App\Entities\Employees';
    protected $useTimestamps = true;

    public function getEmployees($id = false)
    {
        if ($id === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }
}