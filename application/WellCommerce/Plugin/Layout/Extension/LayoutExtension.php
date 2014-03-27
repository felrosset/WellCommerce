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

namespace WellCommerce\Plugin\Layout\Extension;

use Symfony\Component\HttpKernel\DependencyInjection\Extension,
    Symfony\Component\DependencyInjection\Loader\XmlFileLoader,
    Symfony\Component\Config\FileLocator,
    Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class LayoutThemeExtension
 *
 * @package WellCommerce\Plugin\LayoutTheme\Extension
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LayoutExtension extends Extension
{

    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../config'));
        $loader->load('services.xml');
    }

    public function getNamespace()
    {
        return 'http://symfony.com/schema/dic/services';
    }

    public function getAlias()
    {
        return 'gekosale.plugin.layout_theme';
    }
}