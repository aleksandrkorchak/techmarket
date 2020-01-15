<?php
/**
 * Created by PhpStorm.
 * User: Alexandr
 * Date: 27.03.2019
 * Time: 17:15
 */

namespace App\Library;

use App\Captcha as Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Support\Facades\Request;

class Captcha
{
    private $expression;
    private $result;

    /**
     * The encrypter implementation.
     *
     * @var \Illuminate\Contracts\Encryption\Encrypter
     */
    private static $encrypter;

    public static function check($answer)
    {
        $token_from_request = self::getTokenFromRequest();

        $captcha = Model::where('token', $token_from_request);
        $result = $captcha->first(['result'])->result;

        $captcha->delete();

        if ($answer === $result) {
            return true;
        }

        return false;
    }


    public static function getSimpleCaptcha()
    {
        $val_1 = mt_rand(0, 9);
        $val_2 = mt_rand(0, 9);
        $sign_array = ['+', '-'];
        $sign = $sign_array[rand(0, 1)];

        switch ($sign) {
            case '+':
                $result = $val_1 + $val_2;
                break;
            case '-':
                $result = $val_1 - $val_2;
                break;
            default:
                $result = 0;
        }

        self::saveData($result);

        return $val_1 . ' ' . $sign . ' ' . $val_2;
    }


    private static function saveData($result)
    {

        Model::updateOrInsert(
            ['token' => session('_token')],
            ['result' => $result]
        );

    }



    /**
     * Get the CSRF token from the request.
     *
     * @return string
     */
    private static function getTokenFromRequest()
    {
        $token = Request::input('_token') ?: Request::header('X-CSRF-TOKEN');

        if (!$token && $header = Request::header('X-XSRF-TOKEN')) {
            $token = self::$encrypter->decrypt($header, static::serialized());
        }

        return $token;
    }

    /**
     * Determine if the cookie contents should be serialized.
     *
     * @return bool
     */
    public static function serialized()
    {
        return EncryptCookies::serialized('XSRF-TOKEN');
    }
}