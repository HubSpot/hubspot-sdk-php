<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new association definition for the specified object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\SchemasService::createAssociation()
 *
 * @phpstan-type SchemaCreateAssociationParamsShape = array{
 *   appId: int, fromObjectTypeId: string, toObjectTypeId: string, name?: string
 * }
 */
final class SchemaCreateAssociationParams implements BaseModel
{
    /** @use SdkModel<SchemaCreateAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

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
     * SchemaCreateAssociationParams::with(
     *   appId: ..., fromObjectTypeId: ..., toObjectTypeId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaCreateAssociationParams)
     *   ->withAppID(...)
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
        int $appId,
        string $fromObjectTypeId,
        string $toObjectTypeId,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['fromObjectTypeId'] = $fromObjectTypeId;
        $obj['toObjectTypeId'] = $toObjectTypeId;

        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

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
