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

namespace WellCommerce\Plugin\Availability\Repository;

use WellCommerce\Plugin\Availability\Model\AvailabilityDataInterface;

/**
 * Interface AvailabilityRepositoryInterface
 *
 * @package WellCommerce\Plugin\Availability\Repository
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface AvailabilityRepositoryInterface
{
    const POST_DELETE_EVENT = 'availability.repository.post_delete';
    const PRE_SAVE_EVENT    = 'availability.repository.pre_save';
    const POST_SAVE_EVENT   = 'availability.repository.post_save';

    /**
     * Returns all companies as a collection
     *
     * @return mixed
     */
    public function all();

    /**
     * Returns single availability model
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * Saves new or existing availability model
     *
     * @param array $data
     * @param null  $id
     *
     * @return mixed
     */
    public function save(array $data, $id = null);

    /**
     * Deletes availability model
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);
}