<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_simple_public_object_batch_input_for_create = array{
 *   properties: array<string, string>,
 *   associations?: list<CRMObjectsPublicAssociationsForObject>,
 *   objectWriteTraceID?: string,
 * }
 */
final class CRMObjectsSimplePublicObjectBatchInputForCreate implements BaseModel
{
    /** @use SdkModel<crm_objects_simple_public_object_batch_input_for_create> */
    use SdkModel;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    /** @var list<CRMObjectsPublicAssociationsForObject>|null $associations */
    #[Api(list: CRMObjectsPublicAssociationsForObject::class, optional: true)]
    public ?array $associations;

    #[Api('objectWriteTraceId', optional: true)]
    public ?string $objectWriteTraceID;

    /**
     * `new CRMObjectsSimplePublicObjectBatchInputForCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsSimplePublicObjectBatchInputForCreate::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsSimplePublicObjectBatchInputForCreate)->withProperties(...)
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
     * @param array<string, string> $properties
     * @param list<CRMObjectsPublicAssociationsForObject> $associations
     */
    public static function with(
        array $properties,
        ?array $associations = null,
        ?string $objectWriteTraceID = null,
    ): self {
        $obj = new self;

        $obj->properties = $properties;

        null !== $associations && $obj->associations = $associations;
        null !== $objectWriteTraceID && $obj->objectWriteTraceID = $objectWriteTraceID;

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

    /**
     * @param list<CRMObjectsPublicAssociationsForObject> $associations
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
        $obj->objectWriteTraceID = $objectWriteTraceID;

        return $obj;
    }
}
