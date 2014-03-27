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
namespace WellCommerce\Plugin\Currency\Event;

use WellCommerce\Core\Event\FormEvent;

/**
 * Class CurrencyFormEvent
 *
 * @package WellCommerce\Plugin\Currency\Event
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
final class CurrencyFormEvent extends FormEvent
{

    const FORM_INIT_EVENT = 'currency.form.init';
}