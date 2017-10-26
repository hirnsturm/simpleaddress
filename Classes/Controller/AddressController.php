<?php

namespace Sle\Simpleaddress\Controller;

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use \Sle\Simpleaddress\Controller\BaseController;
use \Sle\Simpleaddress\Helper\StringHelper;
use \Sle\Simpleaddress\Google\Maps\MapsV3;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Steve Lenz <kontakt@steve-lenz.de>, Steve Lenz Web-Solutions
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * AddressController
 */
class AddressController extends BaseController
{

    /**
     * action index
     *
     * @return void
     */
    public function indexAction()
    {
        $this->view
            ->assign('uid', $this->uid)
            ->assign('settings', $this->settings)
            ->assign('mapData',
                (1 == $this->settings['flexform']['googleMaps']['switch']) ? $this->loadMapDataAsJson()
                        : null);
    }

    /**
     *
     * @return JSON-String
     */
    private function loadMapDataAsJson()
    {
        $mapData               = array();
        $mapData['mapOptions'] = array();

        // mapOptions from flexform
        foreach ($this->settings['flexform']['googleMaps']['mapOptions'] as $key => $val) {
            $mapData['mapOptions'][$key] = $val;
        }

        unset($mapData['mapOptions']['mapTypeId']);

        // load point
        $mapData['points'] = $this->getPoints();

        return json_encode($mapData,
            JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
    }

    /**
     *
     * @return array
     */
    private function getPoints()
    {
        $points = array();

        if ('' !== $this->settings['flexform']['googleMaps']['latitude'] &&
            '' !== $this->settings['flexform']['googleMaps']['longitude']) {
            $points[] = array(
                'windowContent' => $this->getWindowContent(),
                'icon'          => '',
                'lat'           => floatval($this->settings['flexform']['googleMaps']['latitude']),
                'lng'           => floatval($this->settings['flexform']['googleMaps']['longitude'])
            );
        } else {
            $coords = MapsV3::getGeoCoding($this->settings['flexform']['address']['location'],
                    $this->settings['flexform']['address']['postal-code'],
                    $this->settings['flexform']['address']['street-address-name'],
                    $this->settings['flexform']['address']['street-address-number']);

            if (isset($coords['results'][0]['geometry']['location'])) {
                $points[] = array(
                    'windowContent' => $this->getWindowContent(),
                    'icon'          => '',
                    'lat'           => $coords['results'][0]['geometry']['location']['lat'],
                    'lng'           => $coords['results'][0]['geometry']['location']['lng']
                );
            }
        }

        return $points;
    }

    /**
     *
     * @return string
     */
    private function getWindowContent()
    {
        $absPath          = ExtensionManagementUtility::extPath($this->extensionKey);
        $infoWindowLayout = file_get_contents($absPath.'Resources/Private/Partials/Address/infoWindowLayout.html');

        return StringHelper::replacePlaceholder($this->settings['flexform']['address'],
                $infoWindowLayout);
    }

}
