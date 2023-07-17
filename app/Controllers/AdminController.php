<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class AdminController extends ResourceController
{

    protected $modelName = 'App\Models\Admin';
    protected $format = 'json';
    private $employee;
    private $registrationData;

    public function __construct()
    {
        $this->registrationData = model('RegistrationData');
        $this->employee = model('Employee');
    }

    public function index()
    {
        $data = [
            'message' => 'success',
            'data' => $this->model->findAll()
        ];

        return $this->respond($data, 200);
    }

    public function createEmployee()
    {
        $rules = $this->validate([
            'fullName'      => 'required',
            'salutation'    => 'required',
            'gender'        => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'jobLevel'      => 'required',
            'position'      => 'required',
            'employmentType'=> 'required',
            'isActive'      => 'required'
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->registrationData->insert([
            'rd_fullname'   => esc($this->request->getVar('fullName')),
            'rd_email'      => esc($this->request->getVar('email')),
            'rd_registered_date' => date('Y-m-d H:i:s')
        ]);

        $registrationData = $this->registrationData->where('rd_email', esc($this->request->getVar('email')))->first();

        if(count($registrationData) > 0) {
            $this->employee->insert([
                'iud_rd_id'         => $registrationData['rd_id'],
                'iud_fullname'      => $registrationData['rd_fullname'],
                'iud_salutation'    => esc($this->request->getVar('salutation')),
                'iud_gender'        => esc($this->request->getVar('gender')),
                'iud_email'         => $registrationData['rd_email'],
                'iud_password'      => password_hash(esc($this->request->getVar('password')), PASSWORD_DEFAULT),
                'iud_job_level'      => esc($this->request->getVar('jobLevel')),
                'iud_position'      => esc($this->request->getVar('position')),
                'iud_employment_type'=> esc($this->request->getVar('employmentType')),
                'iud_is_active'      => esc($this->request->getVar('isActive')),
                'iud_active_date'      => esc($this->request->getVar('isActive')) ? date('Y-m-d H:i:s') : null
            ]);
        } else {
            $errors = [
                'message' => 'Data gagal ditambahkan'
            ];
    
            return $this->fail($errors, 400);
        }

        $response = [
            'message' => 'Data berhasil ditambahkan'
        ];

        return $this->respondCreated($response);
    }

    public function editEmployee($id)
    {
        $rules = $this->validate([
            'fullName'      => 'required',
            'salutation'    => 'required',
            'gender'        => 'required',
            'jobLevel'      => 'required',
            'position'      => 'required',
            'employmentType'=> 'required',
            'isActive'      => 'required'
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $employee = $this->employee->find($id);

        $this->registrationData->update($employee['iud_rd_id'], [
            'rd_fullname'   => esc($this->request->getVar('fullName'))
        ]);

        $this->employee->update($id, [
            'iud_fullname'      => esc($this->request->getVar('fullName')),
            'iud_salutation'    => esc($this->request->getVar('salutation')),
            'iud_gender'        => esc($this->request->getVar('gender')),
            'iud_job_level'      => esc($this->request->getVar('jobLevel')),
            'iud_position'      => esc($this->request->getVar('position')),
            'iud_employment_type'=> esc($this->request->getVar('employmentType')),
            'iud_is_active'      => esc($this->request->getVar('isActive')),
            'iud_active_date'      => esc($this->request->getVar('isActive')) ? date('Y-m-d H:i:s') : null
        ]);

        $response = [
            'message' => 'Data berhasil diubah'
        ];

        return $this->respondCreated($response);
    }

    public function changeEmployeeStatus($id)
    {
        $oldEmployee = $this->employee->find($id);

        $this->employee->update($id, [
            'iud_is_active'      => $oldEmployee['iud_is_active'] == 'Y' ? 'N' : 'Y'
        ]);

        if ($oldEmployee['iud_is_active'] == 'N') {
            $this->employee->update($id, [
                'iud_active_date'      => date('Y-m-d H:i:s')
            ]);
        }

        $data = [
            'message' => 'success'
        ];

        return $this->respond($data, 200);
    }

    public function deleteEmployee($id)
    {
        $this->employee->delete($id);

        $response = [
            'message' => 'Data berhasil dihapus'
        ];

        return $this->respondDeleted($response);
    }

    public function uploadImage($id)
    {
        $rules = $this->validate([
            'image'      => 'uploaded[image]|is_image[image]|max_size[image, 300]',
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $employee = $this->employee->find($id);
        $employeePict = $employee['iud_profile_pic'];

        if(!is_null($employeePict)) {
            unlink('uploads/'.$employeePict);
        }

        $image = $this->request->getFile('image');
        $imageName = pathinfo($image->getName(), PATHINFO_FILENAME) . "_" . date('Y-m-d H:i:s') . "." . pathinfo($image->getName(), PATHINFO_EXTENSION);;
        $image->move('uploads', $imageName);

        $this->employee->update($id, [
            'iud_profile_pic'      => $imageName
        ]);

        $data = [
            'message' => 'success'
        ];

        return $this->respond($data, 200);
    }
}
