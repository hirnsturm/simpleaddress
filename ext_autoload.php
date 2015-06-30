<?php
$extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('simpleaddress');
return array(
    'Sle\TYPO3\Extbase\Controller\BaseController' => $extPath.'vendor/Sle/TYPO3/Extbase/Controller/BaseController.php',
    'Sle\TYPO3\Extbase\Backend\PluginPreview'     => $extPath.'vendor/Sle/TYPO3/Extbase/Backend/PluginPreview.php',
    'Sle\Google\Maps\MapsV3'                      => $extPath.'vendor/Sle/Google/Maps/MapsV3.php',
    'Sle\Helper\StringHelper'                     => $extPath.'vendor/Sle/Helper/StringHelper.php',
);
