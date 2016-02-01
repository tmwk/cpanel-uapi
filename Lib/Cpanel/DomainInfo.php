<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 01/02/2016
 * Time: 9:51
 */

namespace Tmwk\CpanelUapiBundle\Lib\Cpanel;


use Tmwk\CpanelUapiBundle\Lib\Component\Parse;

class DomainInfo extends Parse
{
    /**
     * This function lists user data for the cPanel account's domains.
     * @return bool|mixed
     */
    public function domainsData()
    {
        $url = $this->generateUrl('DomainInfo', 'domains_data');

        return $this->execute($url, array(
            'format' => 'hash',
        ));
    }

    /**
     * This function lists the cPanel account's domains.
     * @return bool|mixed
     */
    public function listDomains()
    {
        $url = $this->generateUrl('DomainInfo', 'list_domains');

        return $this->execute($url);
    }

    /**
     * This function lists user data for a domain.
     * @param $domain
     * @return bool|mixed
     */
    public function singleDomainData($domain)
    {
        $url = $this->generateUrl('DomainInfo', 'single_domain_data');

        return $this->execute($url, array(
            'domain' => $domain
        ));
    }
}