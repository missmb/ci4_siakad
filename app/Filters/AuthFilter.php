<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('log') != true) {
            session()->setFlashdata('wrong', 'Before you explore, please login first!');
            return redirect()->to(base_url('auth'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('log') == true) {
            return redirect()->to(base_url('home'));
        }
    }
}
