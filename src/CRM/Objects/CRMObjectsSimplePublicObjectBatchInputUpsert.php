<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_simple_public_object_batch_input_upsert = array{
 *   id: string,
 *   properties: array<string, string>,
 *   idProperty?: string,
 *   objectWriteTraceID?: string,
 * }
 */
final class CRMObjectsSimplePublicObjectBatchInputUpsert implements BaseModel
{
    /** @use SdkModel<crm_objects_simple_public_object_batch_input_upsert> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    #[Api(optional: true)]
    public ?string $idProperty;

    #[Api('objectWriteTraceId', optional: true)]
    public ?string $objectWriteTraceID;

    /**
     * `new CRMObjectsSimplePublicObjectBatchInputUpsert()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsSimplePublicObjectBatchInputUpsert::with(id: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsSimplePublicObjectBatchInputUpsert)
     *   ->withID(...)
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
     * @param array<string, string> $properties
     */
    public static function with(
        string $id,
        array $properties,
        ?string $idProperty = null,
        ?string $objectWriteTraceID = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->properties = $properties;

        null !== $idProperty && $obj->idProperty = $idProperty;
        null !== $objectWriteTraceID && $obj->objectWriteTraceID = $objectWriteTraceID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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

    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }

    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj->objectWriteTraceID = $objectWriteTraceID;

        return $obj;
    }
}
