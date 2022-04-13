<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\SyliusMultiCartPlugin\Factory;

use BitBag\SyliusMultiCartPlugin\DTO\AjaxPartialCart;
use BitBag\SyliusMultiCartPlugin\Entity\OrderInterface;
use BitBag\SyliusMultiCartPlugin\Entity\OrderItem;
use BitBag\SyliusMultiCartPlugin\MoneyFormatter\MoneyFormatterInterface;
use Sylius\Component\Core\Model\OrderItemInterface;

class AjaxPartialCartFactory implements AjaxPartialCartFactoryInterface
{
    private MoneyFormatterInterface $convertAndFormatMoneyHelper;

    private OrderItemFactoryInterface $ajaxPartialCartItemFactory;

    public function __construct(
        MoneyFormatterInterface             $convertAndFormatMoneyHelper,
        OrderItemFactoryInterface $ajaxPartialCartItemFactory
    ) {
        $this->convertAndFormatMoneyHelper = $convertAndFormatMoneyHelper;
        $this->ajaxPartialCartItemFactory = $ajaxPartialCartItemFactory;
    }

    public function fromOrder(OrderInterface $order): AjaxPartialCart
    {
        /** @var OrderItemInterface[] $orderItems */
        $orderItems = $order->getItems()->toArray();

        return new AjaxPartialCart(
            $order->getCartNumber(),
            $this->convertAndFormatMoneyHelper->formatMoney($order->getItemsTotal()),
            $order->getCurrencyCode(),
            $this->createCartItems($orderItems),
            count($orderItems)
        );
    }

    /**
     * @param OrderItemInterface[] $orderItems
     *
     * @return OrderItem[]
     */
    private function createCartItems(array $orderItems): array
    {
        $cartItems = [];
        foreach ($orderItems as $orderItem) {
            $cartItems[] = $this->ajaxPartialCartItemFactory->fromOrderItem($orderItem);
        }

        return $cartItems;
    }
}
