<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\SchemasService::createAssociation()
 *
 * @phpstan-type SchemaCreateAssociationParamsShape = array{
 *   fromObjectTypeID: string, toObjectTypeID: string, name?: string|null
 * }
 */
final class SchemaCreateAssociationParams implements BaseModel
{
    /** @use SdkModel<SchemaCreateAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('fromObjectTypeId')]
    public string $fromObjectTypeID;

    #[Required('toObjectTypeId')]
    public string $toObjectTypeID;

    #[Optional]
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
        $self = new self;

        $self['fromObjectTypeID'] = $fromObjectTypeID;
        $self['toObjectTypeID'] = $toObjectTypeID;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
