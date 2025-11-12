<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimplePublicObjectBatchInputForCreateShape = array{
 *   properties: array<string,string>,
 *   associations?: list<PublicAssociationsForObject>|null,
 *   objectWriteTraceId?: string|null,
 * }
 */
final class SimplePublicObjectBatchInputForCreate implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectBatchInputForCreateShape> */
    use SdkModel;

    /** @var array<string,string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    /** @var list<PublicAssociationsForObject>|null $associations */
    #[Api(list: PublicAssociationsForObject::class, optional: true)]
    public ?array $associations;

    #[Api(optional: true)]
    public ?string $objectWriteTraceId;

    /**
     * `new SimplePublicObjectBatchInputForCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplePublicObjectBatchInputForCreate::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplePublicObjectBatchInputForCreate)->withProperties(...)
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
     * @param array<string,string> $properties
     * @param list<PublicAssociationsForObject> $associations
     */
    public static function with(
        array $properties,
        ?array $associations = null,
        ?string $objectWriteTraceId = null,
    ): self {
        $obj = new self;

        $obj->properties = $properties;

        null !== $associations && $obj->associations = $associations;
        null !== $objectWriteTraceId && $obj->objectWriteTraceId = $objectWriteTraceId;

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

    /**
     * @param list<PublicAssociationsForObject> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }

    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj->objectWriteTraceId = $objectWriteTraceID;

        return $obj;
    }
}
