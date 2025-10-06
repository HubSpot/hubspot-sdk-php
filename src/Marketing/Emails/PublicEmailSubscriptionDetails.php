<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_email_subscription_details = array{
 *   officeLocationID?: string,
 *   preferencesGroupID?: string,
 *   subscriptionID?: string,
 * }
 */
final class PublicEmailSubscriptionDetails implements BaseModel
{
    /** @use SdkModel<public_email_subscription_details> */
    use SdkModel;

    #[Api('officeLocationId', optional: true)]
    public ?string $officeLocationID;

    #[Api('preferencesGroupId', optional: true)]
    public ?string $preferencesGroupID;

    #[Api('subscriptionId', optional: true)]
    public ?string $subscriptionID;

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
    ): self {
        $obj = new self;

        null !== $officeLocationID && $obj->officeLocationID = $officeLocationID;
        null !== $preferencesGroupID && $obj->preferencesGroupID = $preferencesGroupID;
        null !== $subscriptionID && $obj->subscriptionID = $subscriptionID;

        return $obj;
    }

    public function withOfficeLocationID(string $officeLocationID): self
    {
        $obj = clone $this;
        $obj->officeLocationID = $officeLocationID;

        return $obj;
    }

    public function withPreferencesGroupID(string $preferencesGroupID): self
    {
        $obj = clone $this;
        $obj->preferencesGroupID = $preferencesGroupID;

        return $obj;
    }

    public function withSubscriptionID(string $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionID = $subscriptionID;

        return $obj;
    }
}
