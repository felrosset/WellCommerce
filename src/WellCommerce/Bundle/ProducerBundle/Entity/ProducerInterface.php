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

namespace WellCommerce\Bundle\ProducerBundle\Entity;

use WellCommerce\Bundle\CoreBundle\Entity\BlameableInterface;
use WellCommerce\Bundle\CoreBundle\Entity\TimestampableInterface;
use WellCommerce\Bundle\CoreBundle\Entity\TranslatableInterface;
use WellCommerce\Bundle\MultiStoreBundle\Entity\ShopCollectionAwareInterface;

/**
 * Interface ProducerInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ProducerInterface extends TranslatableInterface, TimestampableInterface, BlameableInterface, ShopCollectionAwareInterface
{
    
}
