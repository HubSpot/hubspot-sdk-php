<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type SimplePublicObjectBatchInputForCreateShape = array{
 *   associations: list<PublicAssociationsForObject>,
 *   properties: array<string,string>,
 *   objectWriteTraceID?: string|null,
 * }
 */
final class SimplePublicObjectBatchInputForCreate implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectBatchInputForCreateShape> */
    use SdkModel;

    /** @var list<PublicAssociationsForObject> $associations */
    #[Required(list: PublicAssociationsForObject::class)]
    public array $associations;

    /**
     * Key-value pairs representing the properties of the object.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * A unique identifier for tracing the creation request.
     */
    #[Optional('objectWriteTraceId')]
    public ?string $objectWriteTraceID;

    /**
     * `new SimplePublicObjectBatchInputForCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplePublicObjectBatchInputForCreate::with(associations: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplePublicObjectBatchInputForCreate)
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
     * @param list<PublicAssociationsForObject|array{
     *   to: PublicObjectID, types: list<AssociationSpec>
     * }> $associations
     * @param array<string,string> $properties
     */
    public static function with(
        array $associations,
        array $properties,
        ?string $objectWriteTraceID = null
    ): self {
        $obj = new self;

        $obj['associations'] = $associations;
        $obj['properties'] = $properties;

        null !== $objectWriteTraceID && $obj['objectWriteTraceID'] = $objectWriteTraceID;

        return $obj;
    }

    /**
     * @param list<PublicAssociationsForObject|array{
     *   to: PublicObjectID, types: list<AssociationSpec>
     * }> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj['associations'] = $associations;

        return $obj;
    }

    /**
     * Key-value pairs representing the properties of the object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * A unique identifier for tracing the creation request.
     */
    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj['objectWriteTraceID'] = $objectWriteTraceID;

        return $obj;
    }
}
