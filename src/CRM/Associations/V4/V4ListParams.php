<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new V4ListParams); // set properties as needed
 * $client->crm.associations.v4->list(...$params->toArray());
 * ```
 * List.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.associations.v4->list(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Associations\V4->list
 *
 * @phpstan-type v4_list_params = array{
 *   objectType: string, objectID: string, after?: string, limit?: int
 * }
 */
final class V4ListParams implements BaseModel
{
    /** @use SdkModel<v4_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $objectID;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?int $limit;

    /**
     * `new V4ListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4ListParams::with(objectType: ..., objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4ListParams)->withObjectType(...)->withObjectID(...)
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
        string $objectType,
        string $objectID,
        ?string $after = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->objectID = $objectID;

        null !== $after && $obj->after = $after;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

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
