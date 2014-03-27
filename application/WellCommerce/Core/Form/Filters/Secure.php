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

namespace WellCommerce\Core\Form\Filters;

use WellCommerce\Core\Form\Filter;

/**
 * Class Secure
 *
 * @package WellCommerce\Core\Form\Filters
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Secure extends Filter implements FilterInterface
{

    public function filterValue($value)
    {
        return $value;
    }
}
