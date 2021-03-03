<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class EmployeesModel extends Model
{
    protected $table = 'employees';
    protected $allowedFields = ['name', 'email'];
    protected $returnType = 'App\Entities\Employees';
    protected $useTimestamps = true;

    public function __construct(ConnectionInterface &$db = null, ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
    }

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