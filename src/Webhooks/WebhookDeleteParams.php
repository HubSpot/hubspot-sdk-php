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
 * $params = (new WebhookDeleteParams); // set properties as needed
 * $client->webhooks->delete(...$params->toArray());
 * ```
 * Delete an existing event subscription by ID.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->webhooks->delete(...$params->toArray());`
 *
 * @see HubspotSDK\Webhooks->delete
 *
 * @phpstan-type webhook_delete_params = array{appID: int}
 */
final class WebhookDeleteParams implements BaseModel
{
    /** @use SdkModel<webhook_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    /**
     * `new WebhookDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookDeleteParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookDeleteParams)->withAppID(...)
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
    public static function with(int $appID): self
    {
        $obj = new self;

        $obj->appID = $appID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }
}
