<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new WebhookUpdateParams); // set properties as needed
 * $client->webhooks->update(...$params->toArray());
 * ```
 * Update an event subscription.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->webhooks->update(...$params->toArray());`
 *
 * @see HubspotSDK\Webhooks->update
 *
 * @phpstan-type webhook_update_params = array{appID: int, active?: bool}
 */
final class WebhookUpdateParams implements BaseModel
{
    /** @use SdkModel<webhook_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api(optional: true)]
    public ?bool $active;

    /**
     * `new WebhookUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookUpdateParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookUpdateParams)->withAppID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(int $appID, ?bool $active = null): self
    {
        $obj = new self;

        $obj->appID = $appID;

        null !== $active && $obj->active = $active;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }
}
