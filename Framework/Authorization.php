<?php

namespace Framework;

class Authorization
{
    /**
     * Check if the user is the owner of the resource
     * @param $resourceId
     * @return bool
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

