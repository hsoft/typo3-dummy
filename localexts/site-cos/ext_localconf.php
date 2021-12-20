<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService(
        'cos_mylogin',
        'auth',
        \CollapseOS\Service\MyLoginService::class,
        [
            'title' => 'MyLoginService',
            'description' => 'hello',
            'subtype' => 'processLoginDataFE',
            'available' => true,
            'priority' => 70,
            'quality' => 70,
            'os' => '',
            'exec' => '',
            'className' => \CollapseOS\Service\MyLoginService::class,
        ]
    );
});
