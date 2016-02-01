<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 30/01/2016
 * Time: 20:47
 */

namespace Tmwk\CpanelUapiBundle\Lib\Component;


use Symfony\Component\DependencyInjection\Container;

class Collector
{
    private static $cpanel_host;
    private static $cpanel_user;
    private static $cpanel_password;
    private static $cpanel_token;
    private static $whm_user;
    private static $whm_pass;
    private static $whm_token;


    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;

        self::$cpanel_host = $container->getParameter('cpanel_host');
        self::$cpanel_user = $container->getParameter('cpanel_user');
        self::$cpanel_password = $container->getParameter('cpanel_pass');
        self::$cpanel_token = $container->getParameter('cpanel_token');

        self::$whm_user = $container->getParameter('whm_user');
        self::$whm_pass = $container->getParameter('whm_pass');
        self::$whm_token = $container->getParameter('whm_token');
    }

    /**
     * @return mixed
     */
    public static function getCpanelHost()
    {
        return self::$cpanel_host;
    }

    /**
     * @param mixed $cpanel_host
     */
    public static function setCpanelHost($cpanel_host)
    {
        self::$cpanel_host = $cpanel_host;
    }

    /**
     * @return mixed
     */
    public static function getCpanelUser()
    {
        return self::$cpanel_user;
    }

    /**
     * @param mixed $cpanel_user
     */
    public static function setCpanelUser($cpanel_user)
    {
        self::$cpanel_user = $cpanel_user;
    }

    /**
     * @return mixed
     */
    public static function getCpanelPassword()
    {
        return self::$cpanel_password;
    }

    /**
     * @param mixed $cpanel_password
     */
    public static function setCpanelPassword($cpanel_password)
    {
        self::$cpanel_password = $cpanel_password;
    }

    /**
     * @return mixed
     */
    public static function getCpanelToken()
    {
        return self::$cpanel_token;
    }

    /**
     * @param mixed $cpanel_token
     */
    public static function setCpanelToken($cpanel_token)
    {
        self::$cpanel_token = $cpanel_token;
    }

    /**
     * @return mixed
     */
    public static function getWhmUser()
    {
        return self::$whm_user;
    }

    /**
     * @param mixed $whm_user
     */
    public static function setWhmUser($whm_user)
    {
        self::$whm_user = $whm_user;
    }

    /**
     * @return mixed
     */
    public static function getWhmPass()
    {
        return self::$whm_pass;
    }

    /**
     * @param mixed $whm_pass
     */
    public static function setWhmPass($whm_pass)
    {
        self::$whm_pass = $whm_pass;
    }

    /**
     * @return mixed
     */
    public static function getWhmToken()
    {
        return self::$whm_token;
    }

    /**
     * @param mixed $whm_token
     */
    public static function setWhmToken($whm_token)
    {
        self::$whm_token = $whm_token;
    }



}