<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        // Verifica si el usuario está logeado y si el tipo es 0
        if (!$session->has('logged_in') || $session->get('tipo') !== 0) {
            // Redirige al usuario a la página de error o acceso denegado si no tiene permiso
            return redirect()->to(base_url('/acceso-denegado'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita acción en 'after'
    }
}
