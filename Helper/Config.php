<?php

namespace Borisperevyazko\Lazyload\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Config
 *
 * @author Boris Pereviazko <borisperevyazko@gmail.com>
 */
class Config extends AbstractHelper
{

    /**#@+
     * Define xml path for system.xml
     *
     * @var string
     */
    const XML_PATH_IS_ENABLED = 'borisperevyazko_lazyload/general/enable';
    const XML_PATH_DEFAULT_THUMBNAIL = 'borisperevyazko_lazyload/general/enable';
    /**#@-*/

    /**
     * Check if lazy load enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(static::XML_PATH_IS_ENABLED, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get default thumbnail
     *
     * @return string
     */
    public function getDefaultThumbnail()
    {
        return $this->scopeConfig->getValue(static::XML_PATH_DEFAULT_THUMBNAIL, ScopeInterface::SCOPE_STORE);
    }
}