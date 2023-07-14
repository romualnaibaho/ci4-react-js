<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{

    protected $modelName = 'App\Models\User';
    protected $format = 'json';

    public function userList()
    {
        $users = $this->model->findAll();
        $arrayResult = [];

        foreach ($users as $user) {
            $temp = [];
            $temp['fullname'] = $user['eud_fullname'];
            $temp['email'] = $user['eud_email'];
            $temp['gender'] = $user['eud_gender'];
            $temp['status'] = $user['eud_is_active'];
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
