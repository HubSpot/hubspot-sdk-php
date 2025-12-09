<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Subscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PauseSubscriptionRequestShape = array{pauseReason?: string|null}
 */
final class PauseSubscriptionRequest implements BaseModel
{
    /** @use SdkModel<PauseSubscriptionRequestShape> */
    use SdkModel;

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
        $self = new self;

        null !== $pauseReason && $self['pauseReason'] = $pauseReason;

        return $self;
    }

    public function withPauseReason(string $pauseReason): self
    {
        $self = clone $this;
        $self['pauseReason'] = $pauseReason;

        return $self;
    }
}
