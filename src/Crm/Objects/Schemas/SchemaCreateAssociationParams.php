<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\SchemasService::createAssociation()
 *
 * @phpstan-type SchemaCreateAssociationParamsShape = array{
 *   fromObjectTypeId: string, toObjectTypeId: string, name?: string
 * }
 */
final class SchemaCreateAssociationParams implements BaseModel
{
    /** @use SdkModel<SchemaCreateAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectTypeId;

    #[Api]
    public string $toObjectTypeId;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new SchemaCreateAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaCreateAssociationParams::with(fromObjectTypeId: ..., toObjectTypeId: ...)
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
        string $fromObjectTypeId,
        string $toObjectTypeId,
        ?string $name = null
    ): self {
        $obj = new self;

        $obj['fromObjectTypeId'] = $fromObjectTypeId;
        $obj['toObjectTypeId'] = $toObjectTypeId;

        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj['fromObjectTypeId'] = $fromObjectTypeID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj['toObjectTypeId'] = $toObjectTypeID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
