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
 * $params = (new V4DeleteParams); // set properties as needed
 * $client->crm.associations.v4->delete(...$params->toArray());
 * ```
 * deletes all associations between two records.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.associations.v4->delete(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Associations\V4->delete
 *
 * @phpstan-type v4_delete_params = array{
 *   objectType: string, objectID: string, toObjectType: string
 * }
 */
final class V4DeleteParams implements BaseModel
{
    /** @use SdkModel<v4_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $objectID;

    #[Api]
    public string $toObjectType;

    /**
     * `new V4DeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4DeleteParams::with(objectType: ..., objectID: ..., toObjectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4DeleteParams)
     *   ->withObjectType(...)
     *   ->withObjectID(...)
     *   ->withToObjectType(...)
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
        string $toObjectType
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->objectID = $objectID;
        $obj->toObjectType = $toObjectType;

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

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }
}
