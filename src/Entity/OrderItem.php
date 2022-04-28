<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiCartPlugin\Entity;

use Sylius\Component\Order\Model\OrderItem as BaseOrderItem;

class OrderItem extends BaseOrderItem
{
    private string $name;

    private string $formattedUnitPrice;

    public function __construct(
        string $name,
        string $formattedUnitPrice
    ) {
        parent::__construct();
        $this->name = $name;
        $this->formattedUnitPrice = $formattedUnitPrice;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function getFormattedUnitPrice(): string
    {
        return $this->formattedUnitPrice;
    }
}
