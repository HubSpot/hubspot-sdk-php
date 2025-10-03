<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SchemaCreateAssociationParams); // set properties as needed
 * $client->crm.objects.schemas->createAssociation(...$params->toArray());
 * ```
 * Create an association.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.schemas->createAssociation(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Schemas->createAssociation
 *
 * @phpstan-type schema_create_association_params = array{
 *   fromObjectTypeID: string, toObjectTypeID: string, name?: string
 * }
 */
final class SchemaCreateAssociationParams implements BaseModel
{
    /** @use SdkModel<schema_create_association_params> */
    use SdkModel;
    use SdkParams;

    #[Api('fromObjectTypeId')]
    public string $fromObjectTypeID;

    #[Api('toObjectTypeId')]
    public string $toObjectTypeID;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new SchemaCreateAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaCreateAssociationParams::with(fromObjectTypeID: ..., toObjectTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaCreateAssociationParams)
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
