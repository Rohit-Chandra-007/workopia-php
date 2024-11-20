<?php

namespace Framework\middleware;

use Framework\Session;

class Authorize
{
    /**
     * check user if is Authenticated
     * @return bool
     */

    public function isAuthenticated(): bool
    {
        return Session::hasSession('user');
    }

    /**
     * handle the user's request
     * @param string $role
     * @return void
     */
    public function handle(string $role): void
    {
        if ($role === 'guest' && $this->isAuthenticated()) {
            redirect('/');
        } elseif ($role === 'auth' && !$this->isAuthenticated()) {
            redirect('/auth/login');
        }

    }
}