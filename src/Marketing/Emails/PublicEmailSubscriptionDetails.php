<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Data structure representing the subscription fields of the email.
 *
 * @phpstan-type PublicEmailSubscriptionDetailsShape = array{
 *   officeLocationId?: string|null,
 *   preferencesGroupId?: string|null,
 *   subscriptionId?: string|null,
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
    #[Api(optional: true)]
    public ?string $officeLocationId;

    #[Api(optional: true)]
    public ?string $preferencesGroupId;

    /**
     * ID of the subscription.
     */
    #[Api(optional: true)]
    public ?string $subscriptionId;

    #[Api(optional: true)]
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
        ?string $officeLocationId = null,
        ?string $preferencesGroupId = null,
        ?string $subscriptionId = null,
        ?string $subscriptionName = null,
    ): self {
        $obj = new self;

        null !== $officeLocationId && $obj->officeLocationId = $officeLocationId;
        null !== $preferencesGroupId && $obj->preferencesGroupId = $preferencesGroupId;
        null !== $subscriptionId && $obj->subscriptionId = $subscriptionId;
        null !== $subscriptionName && $obj->subscriptionName = $subscriptionName;

        return $obj;
    }

    /**
     * ID of the selected office location.
     */
    public function withOfficeLocationID(string $officeLocationID): self
    {
        $obj = clone $this;
        $obj->officeLocationId = $officeLocationID;

        return $obj;
    }

    public function withPreferencesGroupID(string $preferencesGroupID): self
    {
        $obj = clone $this;
        $obj->preferencesGroupId = $preferencesGroupID;

        return $obj;
    }

    /**
     * ID of the subscription.
     */
    public function withSubscriptionID(string $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionId = $subscriptionID;

        return $obj;
    }

    public function withSubscriptionName(string $subscriptionName): self
    {
        $obj = clone $this;
        $obj->subscriptionName = $subscriptionName;

        return $obj;
    }
}
