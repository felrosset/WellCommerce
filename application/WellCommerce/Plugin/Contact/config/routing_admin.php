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
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$collection = new RouteCollection();

$controller = 'WellCommerce\Plugin\Contact\Controller\Admin\ContactController';

$collection->add('admin.contact.index', new Route('/index', array(
    '_controller' => $controller,
    '_mode'       => 'admin',
    '_action'     => 'indexAction'
)));

$collection->add('admin.contact.add', new Route('/add', array(
    '_controller' => $controller,
    '_mode'       => 'admin',
    '_action'     => 'addAction'
)));

$collection->add('admin.contact.edit', new Route('/edit/{id}', array(
    '_controller' => $controller,
    '_mode'       => 'admin',
    '_action'     => 'editAction',
    'id'         => null
)));

$collection->addPrefix('/admin/contact');

return $collection;
