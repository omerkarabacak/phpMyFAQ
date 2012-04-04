<?php
/**
 * Manages user authentication with Apache's SSO authentication, e.g. mod_sspi
 *
 * PHP Version 5.3
 *
 * This Source Code Form is subject to the terms of the Mozilla Public License,
 * v. 2.0. If a copy of the MPL was not distributed with this file, You can
 * obtain one at http://mozilla.org/MPL/2.0/.
 *
 * @category  phpMyFAQ 
 * @package   Auth
 * @author    Thorsten Rinne <thorsten@phpmyfaq.de>
 * @copyright 2011-2012 phpMyFAQ Team
 * @license   http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link      http://www.phpmyfaq.de
 * @since     2011-06-22
 */

if (!defined('IS_VALID_PHPMYFAQ')) {
    exit();
}

/**
 * PMF_Auth_Sso
 *
 * @category  phpMyFAQ 
 * @package   Auth
 * @author    Thorsten Rinne <thorsten@phpmyfaq.de>
 * @copyright 2011-2012 phpMyFAQ Team
 * @license   http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link      http://www.phpmyfaq.de
 * @since     2011-06-22
 */
class PMF_Auth_Sso extends PMF_Auth implements PMF_Auth_Driver
{
    /**
     * Adds a new user account to the authentication table.
     *
     * Returns true on success, otherwise false.
     *
     * @param  string $login Loginname
     * @param  string $pass  Password
     * @return boolean
     */
    public function add($login, $pass)
    {
        return true;
    }

    /**
     * Changes the password for the account specified by login.
     *
     * Returns true on success, otherwise false.
     *
     * Error messages are added to the array errors.
     *
     * @param  string $login Loginname
     * @param  string $pass  Password
     * @return boolean
    */
    public function changePassword($login, $pass)
    {
        return true;
    }
    
    /**
     * Deletes the user account specified by login.
     *
     * Returns true on success, otherwise false.
     *
     * Error messages are added to the array errors.
     *
     * @param  string $login Loginname
     * @return bool
     */
    public function delete($login)
    {
        return true;
    }
    
    /**
     * Checks the password for the given user account.
     *
     * Returns true if the given password for the user account specified by
     * is correct, otherwise false.
     * Error messages are added to the array errors.
     *
     * This function is only called when local authentication has failed, so
     * we are about to create user account.
     *
     * @param  string $login        Loginname
     * @param  string $pass         Password
     * @param  array  $optionslData Optional data
     * @return boolean
     */
    public function checkPassword($login, $pass, Array $optionalData = null)
    {
        if (!isset($_SERVER['REMOTE_USER'])) {
            return false;
        } else {
            if ($_SERVER['REMOTE_USER'] == $login) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Does nothing. A function required to be a valid auth.
     *
     * @param  string $login        Loginname
     * @param  array  $optionalData Optional data
     * @return integer
     */
    public function checkLogin($login, Array $optionalData = null)
    {
        return isset($_SERVER['REMOTE_USER']) ? true : false;
    }
}