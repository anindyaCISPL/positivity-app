<?php

namespace App\Models;

use App\Core\App;

class User
{
    public $name, $email;
    private $password;
    public static function create($data)
    {
        return App::get('database')->insert('users', $data);
    }

    public static function all()
    {
        //dd('model');
        return App::get('database')->select('users', 'role', 1);
    }
    public static function check($credential)
    {
        return App::get('database')->query("select * from users where email='" . $credential['email'] . "' and password='" . base64_encode($credential['password']) . "'");
    }
    public static function resetAttempt($email)
    {
        //dd($email);
        $existence = App::get('database')->select('users', 'email', $email['email']);
        if (empty($existence))
            $_SESSION['error']['message'] = 'Your email not found';
        else {
            $mailResponse = mail($email['email'], 'Reset Your Password', 'Hello There');
            dd($mailResponse);
            $_SESSION['success']['message'] = 'Password reset link sent to your email address';
        }
    }
    public static function addUser($data)
    {
        return App::get('database')->insert('users', $data);
    }
    public static function fetch(array $col)
    {
        $column = array_key_first($col);
        [$column => $val] = $col;
        return App::get('database')->select('users', $column, $val);
    }
    // user have many stories
    // one to many relation
    public static function stories(int $id)
    {
        // dd($id);
        return Story::fetch([
            'user_id' => $id
        ]);
    }
    public static function delete($id)
    {
        return App::get('database')->delete('users', $id);
    }
}
