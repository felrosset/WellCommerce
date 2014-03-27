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

namespace WellCommerce\Core\Form\Rules;

use WellCommerce\Core\Form\Rule;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Unique extends Rule implements RuleInterface
{
    protected $errorMsg;
    protected $container;
    protected $options;
    protected $jsFunction;
    protected static $_nextId = 0;

    /**
     * Constructor
     *
     * @param                    $errorMsg
     * @param array              $options
     * @param ContainerInterface $container
     */
    public function __construct($errorMsg, array $options, ContainerInterface $container)
    {
        parent::__construct($errorMsg);

        $this->errorMsg   = $errorMsg;
        $this->container  = $container;
        $this->options    = $options;
        $this->id         = self::$_nextId++;
        $this->jsFunction = 'CheckUniqueness_' . $this->id;
        $this->pdo        = $this->container->get('database_manager')->getConnection()->getPdo();

        $this->container->get('xajax_manager')->registerFunction([
            $this->jsFunction,
            $this,
            'doAjaxCheck'
        ]);
    }

    /**
     * Checks value for uniqueness
     *
     * @param $request
     *
     * @return array
     */
    public function doAjaxCheck($request)
    {
        return Array(
            'unique' => $this->checkValue($request['value'])
        );
    }

    public function checkValue($value)
    {
        $sql = "SELECT
                  COUNT(*) AS items_count
			    FROM {$this->options['table']}
			    WHERE {$this->options['column']} = :value";

        if (isset($this->options['exclude']) && is_array($this->options['exclude'])) {
            if (!is_array($this->options['exclude']['values'])) {
                $this->options['exclude']['values'] = [$this->options['exclude']['values']];
            }

            $values = array_filter($this->options['exclude']['values']);

            if (count($values)) {
                $excludedValues = implode(', ', $this->options['exclude']['values']);
                $sql .= " AND NOT {$this->options['exclude']['column']} IN ({$excludedValues})";
            }
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('value', $value);
        $stmt->execute();
        $rs = $stmt->fetch();

        return ($rs['items_count'] == 0);
    }

    public function render()
    {
        $errorMsg = addslashes($this->_errorMsg);

        return "{sType: '{$this->getType()}', sErrorMessage: '{$errorMsg}', fCheckFunction: xajax_{$this->jsFunction}}";
    }
}
