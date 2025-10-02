<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionListParams); // set properties as needed
 * $client->automation.actions->list(...$params->toArray());
 * ```
 * Retrieve revisions for a given definition.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->automation.actions->list(...$params->toArray());`
 *
 * @see HubspotSDK\Automation\Actions->list
 *
 * @phpstan-type action_list_params = array{
 *   appID: int, after?: string, limit?: int
 * }
 */
final class ActionListParams implements BaseModel
{
    /** @use SdkModel<action_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?int $limit;

    /**
     * `new ActionListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionListParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionListParams)->withAppID(...)
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
    public static function with(
        int $appID,
        ?string $after = null,
        ?int $limit = null
    ): self {
        $obj = new self;

        $obj->appID = $appID;

        null !== $after && $obj->after = $after;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
