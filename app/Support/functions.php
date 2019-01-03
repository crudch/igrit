<?php

/**
 * @return \App\Models\Users\AuthUser
 */
function auth()
{
    return app(\App\Component\Auth::class);
}