<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Data structure representing the subscription fields of the email.
 *
 * @phpstan-type PublicEmailSubscriptionDetailsShape = array{
 *   officeLocationID?: string|null,
 *   preferencesGroupID?: string|null,
 *   subscriptionID?: string|null,
 *   subscriptionName?: string|null,
 * }
 */
final class PublicEmailSubscriptionDetails implements BaseModel
{
    /** @use SdkModel<PublicEmailSubscriptionDetailsShape> */
    use SdkModel;

    /**
     * ID of the selected office location.
     */
    #[Optional('officeLocationId')]
    public ?string $officeLocationID;

    #[Optional('preferencesGroupId')]
    public ?string $preferencesGroupID;

    /**
     * ID of the subscription.
     */
    #[Optional('subscriptionId')]
    public ?string $subscriptionID;

    #[Optional]
    public ?string $subscriptionName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $officeLocationID = null,
        ?string $preferencesGroupID = null,
        ?string $subscriptionID = null,
        ?string $subscriptionName = null,
    ): self {
        $self = new self;

        null !== $officeLocationID && $self['officeLocationID'] = $officeLocationID;
        null !== $preferencesGroupID && $self['preferencesGroupID'] = $preferencesGroupID;
        null !== $subscriptionID && $self['subscriptionID'] = $subscriptionID;
        null !== $subscriptionName && $self['subscriptionName'] = $subscriptionName;

        return $self;
    }

    /**
     * ID of the selected office location.
     */
    public function withOfficeLocationID(string $officeLocationID): self
    {
        $self = clone $this;
        $self['officeLocationID'] = $officeLocationID;

        return $self;
    }

    public function withPreferencesGroupID(string $preferencesGroupID): self
    {
        $self = clone $this;
        $self['preferencesGroupID'] = $preferencesGroupID;

        return $self;
    }

    /**
     * ID of the subscription.
     */
    public function withSubscriptionID(string $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }

    public function withSubscriptionName(string $subscriptionName): self
    {
        $self = clone $this;
        $self['subscriptionName'] = $subscriptionName;

        return $self;
    }
}
