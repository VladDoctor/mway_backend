<?php

namespace application\lib;

abstract class HeaderAbstr
{
    public static function deleteHeader()
    {
        //TODO: deleter headers-information for redirection url.
    }

    abstract public static function information();
    abstract public static function ok();
    abstract public static function redirect($redirectUrl);
    abstract public static function guestException();
    abstract public static function serverException();
}

final class Header extends HeaderAbstr
{
    public static function information()
    {
        //code-checker if-elseif-else.
        http_response_code(100);
    }

    public static function ok()
    {
        http_response_code(200);
    }

    public static function redirect($redirectUrl)
    {
        // Checklist for sending headers
        header("Location: $redirectUrl");
    }

    public static function guestException()
    {
        http_response_code(400);
    }

    public static function serverException()
    {
        http_response_code(500);
    }
}

?>