<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Core\Form\Elements;

/**
 * Interface ElementInterface
 *
 * @package WellCommerce\Core\Form\Elements
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ElementInterface
{

    const INFINITE      = 'inf';
    const TYPE_NUMBER   = 'number';
    const TYPE_STRING   = 'string';
    const TYPE_FUNCTION = 'function';
    const TYPE_ARRAY    = 'array';
    const TYPE_OBJECT   = 'object';
    const TYPE_BOOLEAN  = 'boolean';

    /**
     * Prepares form element attributes for Javascript rendering
     *
     * @return mixed
     */
    public function prepareAttributesJs();
} 