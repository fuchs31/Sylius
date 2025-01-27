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

namespace Sylius\Bundle\ShopBundle\EventListener;

use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Storage\CartStorageInterface;

final class ShopUserLogoutHandler
{
    public function __construct(
        private ChannelContextInterface $channelContext,
        private CartStorageInterface $cartStorage,
    ) {
    }

    public function onLogout(): void
    {
        /** @var ChannelInterface $channel */
        $channel = $this->channelContext->getChannel();
        $this->cartStorage->removeForChannel($channel);
    }
}
