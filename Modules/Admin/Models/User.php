<?php

namespace Modules\Admin\Models;

use Illuminate\Support\Facades\Storage;

class User extends \App\Models\User
{

    const USERS_FOLDER = 'users/';
    const AVATAR_FOLDER = '/avatar/';


    public function getAvatarLink()
    {
        return Storage::url($this->getAvatarPath());
    }

    public function getAvatarPath()
    {
        return self::USERS_FOLDER . $this->id . self::AVATAR_FOLDER . $this->avatar;
    }
}
