<?php
$EM_CONF[$_EXTKEY] = [
   'title' => 'CollapseOS Sitepackage',
   'description' => 'CollapseOS Sitepackage',
   'category' => 'templates',
   'author' => '...',
   'author_email' => '...',
   'author_company' => '...',
   'version' => '1.0.0',
   'state' => 'stable',
   'constraints' => [
      'depends' => [
         'typo3' => '10.4.0-10.4.99',
         'fluid_styled_content' => '10.4.0-10.4.99'
      ],
      'conflicts' => [
      ],
   ],
   'uploadfolder' => 0,
   'createDirs' => '',
   'clearCacheOnLoad' => 1
];
