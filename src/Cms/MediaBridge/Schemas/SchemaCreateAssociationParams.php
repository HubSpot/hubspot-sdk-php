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
 * @see HubspotSDK\Cms\MediaBridge\Schemas->createAssociation
 *
 * @phpstan-type SchemaCreateAssociationParamsShape = array{
 *   appID: string, fromObjectTypeID: string, toObjectTypeID: string, name?: string
 * }
 */
final class SchemaCreateAssociationParams implements BaseModel
{
    /** @use SdkModel<SchemaCreateAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

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
     * SchemaCreateAssociationParams::with(
     *   appID: ..., fromObjectTypeID: ..., toObjectTypeID: ...
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
        string $appID,
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->fromObjectTypeID = $fromObjectTypeID;
        $obj->toObjectTypeID = $toObjectTypeID;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

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
