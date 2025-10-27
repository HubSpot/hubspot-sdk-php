<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\CommerceSubscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type pause_subscription_request = array{pauseReason?: string}
 */
final class PauseSubscriptionRequest implements BaseModel
{
    /** @use SdkModel<pause_subscription_request> */
    use SdkModel;

    #[Api(optional: true)]
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

        null !== $pauseReason && $obj->pauseReason = $pauseReason;

        return $obj;
    }

    public function withPauseReason(string $pauseReason): self
    {
        $obj = clone $this;
        $obj->pauseReason = $pauseReason;

        return $obj;
    }
}
