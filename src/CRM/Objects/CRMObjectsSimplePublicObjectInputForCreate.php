<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_simple_public_object_input_for_create = array{
 *   properties: array<string, string>,
 *   associations?: list<CRMObjectsPublicAssociationsForObject>,
 * }
 */
final class CRMObjectsSimplePublicObjectInputForCreate implements BaseModel
{
    /** @use SdkModel<crm_objects_simple_public_object_input_for_create> */
    use SdkModel;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    /** @var list<CRMObjectsPublicAssociationsForObject>|null $associations */
    #[Api(list: CRMObjectsPublicAssociationsForObject::class, optional: true)]
    public ?array $associations;

    /**
     * `new CRMObjectsSimplePublicObjectInputForCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsSimplePublicObjectInputForCreate::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsSimplePublicObjectInputForCreate)->withProperties(...)
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
        ?array $associations = null
    ): self {
        $obj = new self;

        $obj->properties = $properties;

        null !== $associations && $obj->associations = $associations;

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
}
