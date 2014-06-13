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

namespace WellCommerce\Core\Component\Form\Elements;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class Textarea
 *
 * @package WellCommerce\Core\Component\Form\Elements
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Textarea extends TextField implements ElementInterface
{

    /**
     * {@inheritdoc}
     */
    public function configureAttributes(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'name',
            'label'
        ]);

        $resolver->setOptional([
            'rows',
            'comment',
            'suffix',
            'prefix',
            'selector',
            'wrap',
            'class',
            'css_attribute',
            'max_length',
            'error',
            'rules',
            'filters',
            'dependencies',
            'default',
        ]);

        $resolver->setAllowedTypes([
            'name'          => 'string',
            'rows'          => 'int',
            'label'         => 'string',
            'comment'       => 'string',
            'suffix'        => 'string',
            'prefix'        => 'string',
            'selector'      => 'string',
            'wrap'          => 'string',
            'class'         => 'string',
            'css_attribute' => 'string',
            'max_length'    => 'integer',
            'error'         => 'string',
            'filters'       => 'array',
            'rules'         => 'array',
            'dependencies'  => 'array',
            'default'       => ['string', 'integer']
        ]);
    }

    public function prepareAttributesJs()
    {
        $attributes = Array(
            $this->formatAttributeJs('name', 'sName'),
            $this->formatAttributeJs('label', 'sLabel'),
            $this->formatAttributeJs('rows', 'iRows', ElementInterface::TYPE_NUMBER),
            $this->formatAttributeJs('cols', 'iCols', ElementInterface::TYPE_NUMBER),
            $this->formatAttributeJs('comment', 'sComment'),
            $this->formatAttributeJs('error', 'sError'),
            $this->formatRepeatableJs(),
            $this->formatRulesJs(),
            $this->formatDependencyJs(),
            $this->formatDefaultsJs()
        );

        return $attributes;
    }

}
