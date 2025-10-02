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
 * $params = (new V4CreateDefaultParams); // set properties as needed
 * $client->crm.associations.v4->createDefault(...$params->toArray());
 * ```
 * Create Default.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.associations.v4->createDefault(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Associations\V4->createDefault
 *
 * @phpstan-type v4_create_default_params = array{
 *   fromObjectType: string, fromObjectID: string, toObjectType: string
 * }
 */
final class V4CreateDefaultParams implements BaseModel
{
    /** @use SdkModel<v4_create_default_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    #[Api]
    public string $fromObjectID;

    #[Api]
    public string $toObjectType;

    /**
     * `new V4CreateDefaultParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4CreateDefaultParams::with(
     *   fromObjectType: ..., fromObjectID: ..., toObjectType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4CreateDefaultParams)
     *   ->withFromObjectType(...)
     *   ->withFromObjectID(...)
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
        string $fromObjectType,
        string $fromObjectID,
        string $toObjectType
    ): self {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->fromObjectID = $fromObjectID;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    public function withFromObjectID(string $fromObjectID): self
    {
        $obj = clone $this;
        $obj->fromObjectID = $fromObjectID;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }
}
