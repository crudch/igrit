<?php

namespace App\Controllers;

use App\Models\Users\User;
use App\Requests\ProfileRequest;
use claviska\SimpleImage;
use Crudch\Foundation\Controller;
use Crudch\Http\Exceptions\MultiException;
use Crudch\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findById(auth()->id);

        return json($user);
    }

    public function save(ProfileRequest $request)
    {
        $user = User::findById(auth()->id);

        $status = $user->fill($request)
            ->save();

        return json(['status' => $status]);
    }

    /**
     * @param Request $request
     *
     * @return \Crudch\Http\Response
     * @throws MultiException
     */
    public function upload(Request $request)
    {
        try {
            $image = new SimpleImage($request->file('file')['tmp_name']);
            $image->thumbnail(100, 100, 'top');
            $file_name = '/img/' . randomString() . '.jpg';
            $image->toFile(public_path() . $file_name, 'image/jpeg');

            $user = User::findById(auth()->id);

            !empty($user->avatar) && @unlink(public_path() . $user->avatar);

            $status = $user->fill(['avatar' => $file_name])
                ->save();

            return json(['status' => $status, 'avatar' => $file_name]);
        } catch (\Exception $e) {
            $m = new MultiException();
            $m->add('file', $e);
            throw $m;
        }
    }
}
