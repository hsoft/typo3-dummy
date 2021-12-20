<?php
namespace CollapseOS\Service;

class MyLoginService extends \TYPO3\CMS\Core\Authentication\AbstractAuthenticationService {
    public function processLoginData($loginData) {
        // Only accept logins from user "foobaz"
        if ($loginData['uname'] == 'foobaz') {
            return true;
        } else {
            return 200;
        }
    }
}
