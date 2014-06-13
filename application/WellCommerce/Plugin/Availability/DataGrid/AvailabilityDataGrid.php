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
namespace WellCommerce\Plugin\Availability\DataGrid;

use Illuminate\Database\Capsule\Manager;
use WellCommerce\Core\Component\DataGrid\AbstractDataGrid;
use WellCommerce\Core\Component\DataGrid\Column\ColumnCollection;
use WellCommerce\Core\Component\DataGrid\Column\ColumnInterface;
use WellCommerce\Core\Component\DataGrid\Column\DataGridColumn;
use WellCommerce\Core\Component\DataGrid\DataGridInterface;

/**
 * Class AvailabilityDataGrid
 *
 * @package WellCommerce\Plugin\Availability\DataGrid
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AvailabilityDataGrid extends AbstractDataGrid implements DataGridInterface
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return 'availability';
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutes()
    {
        return [
            'edit' => $this->generateUrl('admin.availability.edit')
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function initColumns(ColumnCollection $columns)
    {
        $columns->add(new DataGridColumn([
            'id'         => 'id',
            'source'     => 'availability.id',
            'caption'    => $this->trans('Id'),
            'sorting'    => [
                'default_order' => ColumnInterface::SORT_DIR_DESC
            ],
            'appearance' => [
                'width'   => 90,
                'visible' => false
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_BETWEEN
            ]
        ]));

        $columns->add(new DataGridColumn([
            'id'         => 'name',
            'source'     => 'availability_translation.name',
            'caption'    => $this->trans('Name'),
            'appearance' => [
                'width' => 70,
                'align' => ColumnInterface::ALIGN_LEFT
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_INPUT
            ]
        ]));

    }

    /**
     * {@inheritdoc}
     */
    public function setQuery(Manager $manager)
    {
        $this->query = $manager->table('availability');
        $this->query->join('availability_translation', 'availability_translation.availability_id', '=', 'availability.id');
        $this->query->groupBy('availability.id');
    }
}
