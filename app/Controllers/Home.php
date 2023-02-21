<?php

use App\Models\antriModel;
use codeIgniter\Controller;

namespace App\Controllers;

use App\Models\antriModel;

class Home extends BaseController
{
    protected $antriModel;
    public function __construct()
    {
        $this->antriModel = new antriModel();
    }

    public function index()
    {
        $data_antri = $this->antriModel->findAll();
        $onprocess = $this->antriModel->nowCounter();
        $proceed = $this->antriModel->lastCounter();
        $waiting = $this->antriModel->nextCounter();
        $data  = [
            'title' => 'beranda',
            'data_antri' => $data_antri,
            'onproc' => $onprocess,
            'done' => $proceed,
            'waiting' => $waiting
        ];

        // dd($data);
        return view('Home/vw_home', $data);
    }

    public function formAntrian()
    {
        return view('Home/vw_getAntrian');
    }
}
