<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_batch_read_input_simple_public_object_id = array{
 *   inputs: list<CRMObjectsSimplePublicObjectID>,
 *   properties: list<string>,
 *   propertiesWithHistory: list<string>,
 *   idProperty?: string,
 * }
 */
final class CRMObjectsBatchReadInputSimplePublicObjectID implements BaseModel
{
    /** @use SdkModel<crm_objects_batch_read_input_simple_public_object_id> */
    use SdkModel;

    /** @var list<CRMObjectsSimplePublicObjectID> $inputs */
    #[Api(list: CRMObjectsSimplePublicObjectID::class)]
    public array $inputs;

    /** @var list<string> $properties */
    #[Api(list: 'string')]
    public array $properties;

    /** @var list<string> $propertiesWithHistory */
    #[Api(list: 'string')]
    public array $propertiesWithHistory;

    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * `new CRMObjectsBatchReadInputSimplePublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsBatchReadInputSimplePublicObjectID::with(
     *   inputs: ..., properties: ..., propertiesWithHistory: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsBatchReadInputSimplePublicObjectID)
     *   ->withInputs(...)
     *   ->withProperties(...)
     *   ->withPropertiesWithHistory(...)
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
     * @param list<CRMObjectsSimplePublicObjectID> $inputs
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     */
    public static function with(
        array $inputs,
        array $properties,
        array $propertiesWithHistory,
        ?string $idProperty = null,
    ): self {
        $obj = new self;

        $obj->inputs = $inputs;
        $obj->properties = $properties;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        null !== $idProperty && $obj->idProperty = $idProperty;

        return $obj;
    }

    /**
     * @param list<CRMObjectsSimplePublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }

    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }
}
