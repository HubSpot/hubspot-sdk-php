<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\CommerceSubscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\PublicAssociationsForObject;

/**
 * @phpstan-type simple_public_object_batch_input_for_create = array{
 *   associations: list<PublicAssociationsForObject>,
 *   properties: array<string, string>,
 *   objectWriteTraceID?: string,
 * }
 */
final class SimplePublicObjectBatchInputForCreate implements BaseModel
{
    /** @use SdkModel<simple_public_object_batch_input_for_create> */
    use SdkModel;

    /** @var list<PublicAssociationsForObject> $associations */
    #[Api(list: PublicAssociationsForObject::class)]
    public array $associations;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    #[Api('objectWriteTraceId', optional: true)]
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
     * @param list<PublicAssociationsForObject> $associations
     * @param array<string, string> $properties
     */
    public static function with(
        array $associations,
        array $properties,
        ?string $objectWriteTraceID = null
    ): self {
        $obj = new self;

        $obj->associations = $associations;
        $obj->properties = $properties;

        null !== $objectWriteTraceID && $obj->objectWriteTraceID = $objectWriteTraceID;

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
     * @param array<string, string> $properties
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
        $obj->objectWriteTraceID = $objectWriteTraceID;

        return $obj;
    }
}
