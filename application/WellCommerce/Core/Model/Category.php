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
 * Class Category
 *
 * @package WellCommerce\Core\Model
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Category extends Model implements TranslatableModelInterface
{
    protected $table = 'category';
    public $timestamps = true;
    protected $softDelete = false;
    protected $fillable = array('id');

    public function translation()
    {
        return $this->hasMany('WellCommerce\Core\Model\CategoryTranslation');
    }

    public function photo()
    {
        return $this->belongsToOne('WellCommerce\Core\Model\File');
    }

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChildren($query, $parent)
    {
        return $query->where('parent_id', '=', $parent);
    }

    /**
     * Mutator for enabled attribute
     *
     * @param $value
     */
    public function setEnabledAttribute($value)
    {
        $this->attributes['enabled'] = (int)$value;
    }

    /**
     * Accessor for enabled attribute
     *
     * @param $value
     *
     * @return int
     */
    public function getEnabledAttribute($value)
    {
        return (int)$value;
    }

    /**
     * Mutator for parent_id attribute
     *
     * @param $value
     */
    public function setParentIdAttribute($value)
    {
        $this->attributes['parent_id'] = ((int)$value == 0) ? null : $value;
    }

    /**
     * Mutator for hierarchy attribute
     *
     * @param $value
     */
    public function setHierarchyAttribute($value)
    {
        $this->attributes['hierarchy'] = (int)$value;
    }
}