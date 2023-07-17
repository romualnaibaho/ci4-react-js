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
        $baseURL = env('app.baseURL');
        $employees = $this->model->findAll();
        $arrayResult = [];

        foreach ($employees as $employee) {
            $position = $this->mjp->find($employee['iud_position']);
            $employmentType = $this->mut->find($employee['iud_employment_type']);
    
            $temp = [];
            $temp['id'] = $employee['iud_id'];
            $temp['fullname'] = $employee['iud_fullname'];
            $temp['email'] = $employee['iud_email'];
            $temp['position'] = $position['mjp_name'];
            $temp['jobLevel'] = $employee['iud_job_level'];
            $temp['employmentType'] = $employmentType['mut_name'];
            $temp['profile'] = $baseURL . '/uploads/' . $employee['iud_profile_pic'];
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
        $employee = $this->model->find($id);

        $temp = [];
        $temp['id'] = $employee['iud_id'];
        $temp['salutation'] = $employee['iud_salutation'];
        $temp['fullname'] = $employee['iud_fullname'];
        $temp['gender'] = $employee['iud_gender'];
        $temp['email'] = $employee['iud_email'];
        $temp['position'] = $employee['iud_position'];
        $temp['jobLevel'] = $employee['iud_job_level'];
        $temp['employmentType'] = $employee['iud_employment_type'];
        $temp['status'] = $employee['iud_is_active'];

        $data = [
            'message' => 'success',
            'data' => $temp
        ];

        return $this->respond($data, 200);
    }
}
