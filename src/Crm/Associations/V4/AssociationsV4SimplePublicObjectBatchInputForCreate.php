<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\PublicAssociationsForObject;

/**
 * @phpstan-type AssociationsV4SimplePublicObjectBatchInputForCreateShape = array{
 *   associations: list<PublicAssociationsForObject>,
 *   properties: array<string,string>,
 *   objectWriteTraceId?: string|null,
 * }
 */
final class AssociationsV4SimplePublicObjectBatchInputForCreate implements BaseModel
{
    /** @use SdkModel<AssociationsV4SimplePublicObjectBatchInputForCreateShape> */
    use SdkModel;

    /** @var list<PublicAssociationsForObject> $associations */
    #[Api(list: PublicAssociationsForObject::class)]
    public array $associations;

    /** @var array<string,string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    #[Api(optional: true)]
    public ?string $objectWriteTraceId;

    /**
     * `new AssociationsV4SimplePublicObjectBatchInputForCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4SimplePublicObjectBatchInputForCreate::with(
     *   associations: ..., properties: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4SimplePublicObjectBatchInputForCreate)
     *   ->withAssociations(...)
     *   ->withProperties(...)
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
     *
     * @param list<PublicAssociationsForObject> $associations
     * @param array<string,string> $properties
     */
    public static function with(
        array $associations,
        array $properties,
        ?string $objectWriteTraceId = null
    ): self {
        $obj = new self;

        $obj->associations = $associations;
        $obj->properties = $properties;

        null !== $objectWriteTraceId && $obj->objectWriteTraceId = $objectWriteTraceId;

        return $obj;
    }

    /**
     * @param list<PublicAssociationsForObject> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }

    /**
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj->objectWriteTraceId = $objectWriteTraceID;

        return $obj;
    }
}
