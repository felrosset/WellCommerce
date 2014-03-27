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

use WellCommerce\Core\Helper;
use WellCommerce\Core\Model;

/**
 * Class ClientGroup
 *
 * @package WellCommerce\Core\Model
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ClientGroup extends Model implements TranslatableModelInterface
{

    protected $table = 'client_group';

    public $timestamps = true;

    protected $softDelete = false;

    protected $fillable = ['id'];

    /**
     * {@inheritdoc}
     */
    public function translation()
    {
        return $this->hasMany('WellCommerce\Core\Model\ClientGroupTranslation');
    }

    /**
     * Mutator for discount attribute
     *
     * @param $value
     */
    public function setDiscountAttribute($value)
    {
        $this->attributes['discount'] = Helper::changeCommaToDot($value);
    }
}