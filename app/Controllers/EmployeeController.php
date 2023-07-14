<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class EmployeeController extends ResourceController
{

    protected $modelName = 'App\Models\Employee';
    protected $format = 'json';
    private $mjp;
    private $mut;

    public function __construct()
    {
        $this->mjp = model('JobPosition');
        $this->mut = model('UserType');
    }

    public function employeeList()
    {
        $employees = $this->model->findAll();
        $arrayResult = [];

        foreach ($employees as $employee) {
            $position = $this->mjp->find($employee['iud_position']);
            $jobLevel = $this->mut->find($employee['iud_job_level']);
    
            $temp = [];
            $temp['id'] = $employee['iud_id'];
            $temp['fullname'] = $employee['iud_fullname'];
            $temp['email'] = $employee['iud_email'];
            $temp['position'] = $position['mjp_name'];
            $temp['jobLevel'] = $jobLevel['mut_name'];
            $temp['employmentType'] = $employee['iud_employment_type'];
            $temp['status'] = $employee['iud_is_active'];
            array_push($arrayResult, $temp);
        }
        $data = [
            'message' => 'success',
            'data' => $arrayResult
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
