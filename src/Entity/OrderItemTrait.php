<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\SyliusMultiCartPlugin\Entity;

trait OrderItemTrait
{
    private string $name;

    private string $formattedUnitPrice;

    public function getName(): string
    {
        return $this->name;
    }

    public function getFormattedUnitPrice(): string
    {
        return $this->formattedUnitPrice;
    }
}
