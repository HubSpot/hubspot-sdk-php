<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Subscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Pause an active subscription using the subscription ID.
 *
 * @see HubspotSDK\Services\Crm\SubscriptionsService::pause()
 *
 * @phpstan-type SubscriptionPauseParamsShape = array{pauseReason?: string}
 */
final class SubscriptionPauseParams implements BaseModel
{
    /** @use SdkModel<SubscriptionPauseParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $pauseReason;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $pauseReason = null): self
    {
        $obj = new self;

        null !== $pauseReason && $obj['pauseReason'] = $pauseReason;

        return $obj;
    }

    public function withPauseReason(string $pauseReason): self
    {
        $obj = clone $this;
        $obj['pauseReason'] = $pauseReason;

        return $obj;
    }
}
