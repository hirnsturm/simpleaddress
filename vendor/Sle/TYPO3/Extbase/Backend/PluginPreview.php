<?php

namespace Sle\TYPO3\Extbase\Backend;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * TYPO3 Backend PluginPreview
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2015, Steve Lenz
 * @version 1.0.0
 * @package TYPO3 6.x
 */
class PluginPreview
{

    /**
     * Returns the value of a specific FlexForm-Field
     *
     * @param array $params
     * @param string $path Path separeted by ":", e.g. data:[pluginName]:lDEF:[Key]:vDEF
     * @param string $transLabel Translation key for PlugIn label
     * @return string
     */
    public function getByFlexformField(array $params, $path, $transLabel)
    {
        list($extName, $pluginName) = explode('_', $params['row']['list_type']);
        
        $infoText = '<strong>'.LocalizationUtility::translate('LLL:EXT:'.$extName.'/Resources/Private/Language/locallang.xlf:'.$transLabel).'</strong><br />';

        $array = GeneralUtility::xml2array($params['row']['pi_flexform']);
        $paths = explode(':', $path);

        foreach ($paths as $index) {
            if (isset($array[$index])) {
                $array = $array[$index];
            } else {
                return false;
            }
        }

        return $infoText.(string) $array;
    }
}