<?php
/**
 * Created by PhpStorm.
 * User: Mario Figueroa
 * Date: 30/01/2016
 * Time: 3:11
 */

namespace Tmwk\CpanelUapiBundle;

use Symfony\Component\DependencyInjection\Container;
use Tmwk\CpanelUapiBundle\Lib\Component\Collector;
use Tmwk\CpanelUapiBundle\Lib\Cpanel\DomainInfo;
use Tmwk\CpanelUapiBundle\Lib\Cpanel\Email;

class Cpanel
{
    private $container;
    private $collector;

    public function __construct(Container $container)
    {
        $this->collector = new Collector($container);
        $this->container = $container;
    }

    public function email()
    {
        $email = new Email($this->container);
        return $email;
    }

    public function domainInfo()
    {
        $domaininfo = new DomainInfo($this->container);
        return $domaininfo;
    }

    public function collector()
    {
        return $this->collector;
    }

}