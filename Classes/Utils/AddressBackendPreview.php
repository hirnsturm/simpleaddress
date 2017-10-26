<?php

namespace Sle\Simpleaddress\Utils;

/**
 * AddressBackendPreview
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2015, Steve Lenz
 * @version 1.0.0
 */
class AddressBackendPreview
{

    /**
     * Function called backend view, used to generate preview of the plugin
     *
     * @param array $params flexform params
     * @param array $pObj parent object
     * @return string $conten the html output for backend view
     */
    public function render($params, &$pObj)
    {
        return PluginPreview::getByFlexformField($params,
                'data:address:lDEF:settings.flexform.address.fn:vDEF',
                'plugin.address', 'simpleaddress');
    }
}
