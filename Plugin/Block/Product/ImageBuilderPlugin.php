<?php

namespace Borisperevyazko\Lazyload\Plugin\Block\Product;

use Magento\Catalog\Block\Product\ImageBuilder;
use Magento\Framework\View\Asset\Repository as AssetRepo;

use Borisperevyazko\Lazyload\Helper\Config;

/**
 * Class ImageBuilderPlugin
 *
 * @author Boris Pereviazko <borisperevyazko@gmail.com>
 */
class ImageBuilderPlugin
{
    /**
     * Define attribute name
     *
     * @var string
     */
    const DEFINE_ATTRIBUTE_NAME = 'data-echo';

    /**
     * Define small image
     *
     * @var string
     */
    const DEFINE_SMALL_IMAGE = "Magento_Catalog::images/product/placeholder/small_image.jpg";

    /**
     * @var Config
     */
    protected $helper;

    /**
     * @var AssetRepo
     */
    protected $assetRepo;

    /**
     * ImageBuilderPlugin constructor
     *
     * @param Config $helper
     * @param AssetRepo $repo
     */
    public function __construct(
        Config $helper,
        AssetRepo $repo
    ) {
        $this->helper = $helper;
        $this->assetRepo = $repo;
    }

    /**
     * Around create image
     *
     * @param ImageBuilder $subject
     * @param \Closure $proceed
     * @return ImageBuilder
     */
    public function aroundCreate(ImageBuilder $subject, \Closure $proceed)
    {
        $image = $proceed();
        if ($this->helper->isEnabled()) {
            $image->setCustomAttributes($image->getCustomAttributes()." ".static::DEFINE_ATTRIBUTE_NAME." = \"{$image->getImageUrl()}\"");
            $image->setImageUrl($this->assetRepo->getUrl(static::DEFINE_SMALL_IMAGE));
        }

        return $image;
    }

}