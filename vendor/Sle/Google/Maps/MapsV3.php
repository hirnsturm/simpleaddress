<?php

namespace Sle\Google\Maps;

/**
 * Google Maps API V3
 * 
 * https://developers.google.com/maps/documentation/javascript/tutorial
 * 
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2013, Steve Lenz
 * @version 1.0.0
 */
class MapsV3
{

    /**
     * Base URL for Google Maps API
     * 
     * @var string 
     */
    private static $baseUrl = 'https://maps.googleapis.com/maps/api/geocode/json?sensor=';

    /**
     * Geokodierung mit Google GeoCoding API V3
     * https://developers.google.com/maps/documentation/geocoding/?hl=de
     * 
     * @param string $city
     * @param string/int $postcode
     * @param string $street
     * @param string/int $nr
     * @param string $sensor ('true'|'false')
     * @return array
     */
    public static function getGeoCoding($city, $postcode, $street, $nr, $sensor = 'false')
    {
        $requestUrl = self::$baseUrl . $sensor;
        $urlData = '&address=' . urlencode($city) . ',' . urlencode($postcode) . ',' . urlencode($street) . urlencode(' ' . $nr);

        $jsonGoogle = file_get_contents($requestUrl . $urlData);

        return json_decode($jsonGoogle, true);
    }

    /**
     * Die Adresse zu Geokoordinaten mittels Google GeoCoding API V3 ermitteln
     * https://developers.google.com/maps/documentation/geocoding/?hl=de#ReverseGeocoding
     * 
     * @param float $lat
     * @param float $lng
     * @return array
     */
    public static function reverseGeoCoding($lat, $lng, $sensor = 'false')
    {
        $requestUrl = self::$baseUrl . $sensor . '&latlng=' . $lat . ',' . $lng;

        $jsonGoogle = file_get_contents($requestUrl);

        return json_decode($jsonGoogle, true);
    }

}