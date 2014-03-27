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

namespace WellCommerce\Core\Form\Conditions;

/**
 * Interface ConditionInterface
 *
 * @package WellCommerce\Core\Form\Conditions
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ConditionInterface
{

    /**
     * evaluates condition value
     *
     * @param $value
     *
     * @return mixed
     */
    public function evaluate($value);
} 