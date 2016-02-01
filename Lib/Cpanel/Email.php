<?php

/**
 * Created by PhpStorm.
 * User: Mario Figueroa
 * Date: 30/01/2016
 * Time: 20:36
 */
namespace Tmwk\CpanelUapiBundle\Lib\Cpanel;

use Tmwk\CpanelUapiBundle\Lib\Component\Parse;

class Email extends Parse
{

    /**
     * This function returns an email account's username or address.
     * @return bool|mixed
     */
    public function accountName()
    {
        $url = $this->generateUrl('Email', 'account_name');

        return $this->execute($url, array(
            'account' => '',
            'display' => 'anyvalue'
        ));
    }

    /**
     * This function creates an email forwarder.
     * @param $domain
     * @param $email
     * @param $emailTo
     * @return bool|mixed
     */
    public function addForwarder($domain, $email, $emailTo)
    {
        $url = $this->generateUrl('Email', 'add_forwarder');

        return $this->execute($url, array(
            'domain'   => $domain,
            'email'    => $email,
            'fwdemail' => $emailTo,
            'fwdopt'   => 'fwd',
        ));
    }

    /**
     * This function lists a domain's forwarders.
     * @param $domain
     * @return bool|mixed
     */
    public function listForwarders($domain)
    {
        $url = $this->generateUrl('Email', 'list_forwarders');

        return $this->execute($url, array(
            'domain' => $domain,
        ));
    }

    /**
     * This function deletes an email forwarder.
     * @param $email
     * @param $emailTo
     * @return bool|mixed
     */
    public function deleteForwarder($email, $emailTo)
    {
        $url = $this->generateUrl('Email', 'delete_forwarder');

        return $this->execute($url, array(
            'address'   => $email,
            'forwarder' => $emailTo
        ));
    }

    /**
     * This function creates a Mailman mailing list.
     * @param $domain
     * @param $list
     * @param $pass
     * @return bool|mixed
     */
    public function addList($domain, $list, $pass)
    {
        $url = $this->generateUrl('Email', 'add_list');

        return $this->execute($url, array(
            'domain'   => $domain,
            'list'     => $list,
            'password' => $pass,
        ));
    }

    /**
     * This function lists the account's Mailman mailing lists.
     * @param $domain
     * @return bool|mixed
     */
    public function listLists($domain)
    {
        $url = $this->generateUrl('Email', 'list_lists');

        return $this->execute($url, array(
            'domain' => $domain,
        ));
    }

    /**
     * This function changes a mailing list's password.
     * @param $list
     * @param $password
     * @return bool|mixed
     */
    public function passwdList($list, $password)
    {
        $url = $this->generateUrl('Email', 'passwd_list');

        return $this->execute($url, array(
            'list'     => $list,
            'password' => $password,
        ));
    }

    /**
     * This function deletes a Mailman mailing list.
     * @param $list
     * @return bool|mixed
     */
    public function deleteList($list)
    {
        $url = $this->generateUrl('Email', 'delete_list');

        return $this->execute($url, array(
            'list' => $list,
        ));
    }

    /**
     * This function creates a Mail Exchanger (MX) record. For more information about MX record settings, read our Edit MX Entry documentation.
     * @param $domain
     * @param $exchanger
     * @param $preference
     * @param int $alwaysaccept
     * @return bool|mixed
     */
    public function addMx($domain, $exchanger, $preference, $alwaysaccept = 1)
    {
        $url = $this->generateUrl('Email', 'add_mx');

        return $this->execute($url, array(
            'domain'       => $domain,
            'exchanger'    => $exchanger,
            'preference'   => $preference,
            'alwaysaccept' => $alwaysaccept,
        ));
    }

    /**
     * This function modifies a Mail Exchanger (MX) record. For more information about MX record settings, read our Edit MX Entry documentation
     * @param $domain
     * @param $exchanger
     * @param $oldexchanger
     * @param $preference
     * @param $oldpreference
     * @param string $alwaysaccept
     * @return bool|mixed
     */
    public function changeMx($domain, $exchanger, $oldexchanger, $preference, $oldpreference, $alwaysaccept = 'local')
    {
        $url = $this->generateUrl('Email', 'change_mx');

        return $this->execute($url, array(
            'domain'        => $domain,
            'exchanger'     => $exchanger,
            'oldexchanger'  => $oldexchanger,
            'preference'    => $preference,
            'oldpreference' => $oldpreference,
            'alwaysaccept'  => $alwaysaccept,
        ));
    }

    /**
     * This function lists Mail Exchanger (MX) records.
     * @param $domain
     * @return bool|mixed
     */
    public function listMxs($domain)
    {
        $url = $this->generateUrl('Email', 'list_mxs');

        return $this->execute($url, array(
            'domain' => $domain,
        ));
    }

    /**
     * This function deletes a Mail Exchanger (MX) record. For more information about MX record settings, read our Edit MX Entry documentation.
     * @param $domain
     * @param $exchanger
     * @param $preference
     * @return bool|mixed
     */
    public function deleteMx($domain, $exchanger, $preference)
    {
        $url = $this->generateUrl('Email', 'delete_mx');

        return $this->execute($url, array(
            'domain'     => $domain,
            'exchanger'  => $exchanger,
            'preference' => $preference,
        ));
    }

    /**
     * This function creates an email address.
     * @param $domain
     * @param $user
     * @param $pass
     * @param $quota
     * @return bool|mixed
     */
    public function addPop($domain, $user, $pass, $quota)
    {
        $url = $this->generateUrl('Email', 'add_pop');

        return $this->execute($url, array(
            'domain'         => $domain,
            'email'          => $user,
            'password'       => $pass,
            'quota'          => $quota,
            'skip_update_db' => '1',
        ));
    }

    /**
     * This function lists the cPanel account's email accounts.
     * @param null $user
     * @return bool|mixed
     */
    public function listPops($user = null)
    {
        $url = $this->generateUrl('Email', 'list_pops');

        return $this->execute($url, array(
            'regex' => $user,
        ));
    }

    /**
     * This function deletes an email address.
     * @param $user
     * @param $domain
     * @return bool|mixed
     */
    public function deletePop($domain, $user)
    {
        $url = $this->generateUrl('Email', 'delete_pop');

        return $this->execute($url, array(
            'email'  => $user,
            'domain' => $domain
        ));
    }

    /**
     * This function changes an email account's password.
     * @param $domain
     * @param $user
     * @param $password
     * @return bool|mixed
     */
    public function passwdPop($domain, $user, $password)
    {
        $url = $this->generateUrl('Email', 'passwd_pop');

        return $this->execute($url, array(
            'domain'   => $domain,
            'email'    => $user,
            'password' => $password,
        ));
    }

    /**
     * This function retrieves an email account's quota.
     * @param $domain
     * @param $user
     * @param int $as_bytes
     * @return bool|mixed
     */
    public function getPopQuota($domain, $user, $as_bytes = 0)
    {
        $url = $this->generateUrl('Email', 'get_pop_quota');

        return $this->execute($url, array(
            'domain'   => $domain,
            'email'    => $user,
            'as_bytes' => $as_bytes,
        ));
    }

    /**
     * This function changes an email address's quota.
     * @param $domain
     * @param $user
     * @param $quota
     * @return bool|mixed
     */
    public function editPopQuota($domain, $user, $quota)
    {
        $url = $this->generateUrl('Email', 'edit_pop_quota');

        return $this->execute($url, array(
            'domain' => $domain,
            'email'  => $user,
            'quota'  => $quota,
        ));
    }

    /**
     * This function retrieves the disk space that an email account uses.
     * @param $domain
     * @param $user
     * @return bool|mixed
     */
    public function getDiskUsage($domain, $user)
    {
        $url = $this->generateUrl('Email', 'get_disk_usage');

        return $this->execute($url, array(
            'domain' => $domain,
            'user'   => $user,
        ));
    }

    /**
     * This function returns the disk space that the main account uses.
     * @return bool|mixed
     */
    public function getMainAccountDiskUsage()
    {
        $url = $this->generateUrl('Email', 'get_main_account_disk_usage');

        return $this->execute($url);
    }

    /**
     * This function retrieves the system's maximum email quota.
     * @return bool|mixed
     */
    public function getMaxEmailQuota()
    {
        $url = $this->generateUrl('Email', 'get_max_email_quota');

        return $this->execute($url);
    }


    /**
     * This function retrieves an email account's Webmail settings.
     * @param $user
     * @return bool|mixed
     * @internal param $email
     */
    public function getWebmailSettings($user)
    {
        $url = $this->generateUrl('Email', 'get_webmail_settings');

        return $this->execute($url, array(
            'account' => $user,
        ));
    }

    /**
     * This function retrieves a domain's default address.
     * @param $domain
     * @return bool|mixed
     */
    public function listDefaultAddress($domain)
    {
        $url = $this->generateUrl('Email', 'list_default_address');

        return $this->execute($url, array(
            'domain' => $domain,
        ));
    }

    /**
     * This function lists the account's mail domains.
     * @param $domain
     * @return bool|mixed
     */
    public function listMailDomains($domain)
    {
        $url = $this->generateUrl('Email', 'list_mail_domains');

        return $this->execute($url, array(
            'select' => $domain,
        ));
    }

    /**
     * This function configures a default (catchall) email address.
     * @param $domain
     * @param $email
     * @param string $fwdopt
     * @return bool|mixed
     */
    public function setDefaultAddress($domain, $email, $fwdopt = 'fwd')
    {
        $url = $this->generateUrl('Email', 'set_default_address');

        return $this->execute($url, array(
            'domain'   => $domain,
            'fwdemail' => $email,
            'fwdopt'   => $fwdopt,
        ));
    }

    /**
     * This function suspends incoming email for an account. The system will reject incoming email while the account is suspended.
     * @param $email
     * @return bool|mixed
     */
    public function suspendIncoming($email)
    {
        $url = $this->generateUrl('Email', 'suspend_incoming');

        return $this->execute($url, array(
            'email_address' => $email,
        ));
    }

    /**
     * This function suspends a user's ability to log in to, send mail from, and read their mail account
     * @param $email
     * @return bool|mixed
     */
    public function suspendLogin($email)
    {
        $url = $this->generateUrl('Email', 'suspend_login');

        return $this->execute($url, array(
            'email_address' => $email,
        ));
    }

    /**
     * This function unsuspends incoming email for an email account.
     * @param $email
     * @return bool|mixed
     */
    public function unsuspendIncoming($email)
    {
        $url = $this->generateUrl('Email', 'unsuspend_incoming');

        return $this->execute($url, array(
            'email_address' => $email,
        ));
    }

    /**
     * This function unsuspends a user's ability to log in to, send mail from, and read their mail account
     * @param $email
     * @return bool|mixed
     */
    public function unsuspendLogin($email)
    {
        $url = $this->generateUrl('Email', 'unsuspend_login');

        return $this->execute($url, array(
            'email_address' => $email,
        ));
    }


}