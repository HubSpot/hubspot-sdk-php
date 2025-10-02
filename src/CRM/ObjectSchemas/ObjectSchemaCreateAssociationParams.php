<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\ObjectSchemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ObjectSchemaCreateAssociationParams); // set properties as needed
 * $client->crm.objectSchemas->createAssociation(...$params->toArray());
 * ```
 * Create an association.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objectSchemas->createAssociation(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\ObjectSchemas->createAssociation
 *
 * @phpstan-type object_schema_create_association_params = array{
 *   fromObjectTypeID: string, toObjectTypeID: string, name?: string
 * }
 */
final class ObjectSchemaCreateAssociationParams implements BaseModel
{
    /** @use SdkModel<object_schema_create_association_params> */
    use SdkModel;
    use SdkParams;

    #[Api('fromObjectTypeId')]
    public string $fromObjectTypeID;

    #[Api('toObjectTypeId')]
    public string $toObjectTypeID;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new ObjectSchemaCreateAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSchemaCreateAssociationParams::with(
     *   fromObjectTypeID: ..., toObjectTypeID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectSchemaCreateAssociationParams)
     *   ->withFromObjectTypeID(...)
     *   ->withToObjectTypeID(...)
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
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?string $name = null
    ): self {
        $obj = new self;

        $obj->fromObjectTypeID = $fromObjectTypeID;
        $obj->toObjectTypeID = $toObjectTypeID;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
