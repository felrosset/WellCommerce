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
namespace WellCommerce\Core\Model;

use WellCommerce\Core\Model;

/**
 * Class ProducerShop
 *
 * @package WellCommerce\Core\Model
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProducerShop extends Model
{

    protected $table = 'producer_shop';

    public $timestamps = true;

    protected $softDelete = false;

    protected $fillable = ['producer_id', 'shop_id'];

    /**
     * Relation with producer table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producer()
    {
        return $this->belongsTo('WellCommerce\Core\Model\Producer');
    }

    /**
     * Relation with shop table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo('WellCommerce\Core\Model\Shop');
    }
}