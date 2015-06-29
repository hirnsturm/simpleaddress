<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sle.'.$_EXTKEY, 'Address',
    array(
    'Address' => 'index',
    ),
    // non-cacheable actions
    array(
    'Address' => '',
    )
);

/**
 * Backend Preview
 */
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info']['simpleaddress_address'][]
    = 'EXT:simpleaddress/Classes/Utils/AddressBackendPreview.php:Sle\Simpleaddress\Utils\AddressBackendPreview->render';
