<?php

namespace Framework;

class Authorization
{
    /**
     *
     */
    public static function isOnwer($resourceId)
    {
        $sessionUser = Session::getSession('user');

        if ($sessionUser !== null && isset($sessionUser['id'])) {
            $sessionUserId = $sessionUser['id'];
            return $sessionUserId === $resourceId;
        }
        return false;
    }

}

