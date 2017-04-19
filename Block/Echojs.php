<?php

namespace Borisperevyazko\Lazyload\Block;

use Magento\Framework\View\Element\Template;

class Echojs extends Template
{
    public function __construct(Template\Context $context, array $data)
    {
        parent::__construct($context, $data);
    }
}