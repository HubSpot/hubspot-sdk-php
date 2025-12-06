<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * Is the input object used to create a new CRM object, containing the properties to be set and optional associations to link the new record with other CRM objects.
 *
 * @phpstan-type SimplePublicObjectInputForCreateShape = array{
 *   associations: list<PublicAssociationsForObject>,
 *   properties: array<string,string>,
 * }
 */
final class SimplePublicObjectInputForCreate implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectInputForCreateShape> */
    use SdkModel;

    /** @var list<PublicAssociationsForObject> $associations */
    #[Api(list: PublicAssociationsForObject::class)]
    public array $associations;

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @var array<string,string> $properties
     */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * `new SimplePublicObjectInputForCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplePublicObjectInputForCreate::with(associations: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplePublicObjectInputForCreate)
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
    public static function with(array $associations, array $properties): self
    {
        $obj = new self;

        $obj['associations'] = $associations;
        $obj['properties'] = $properties;

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
     * Key-value pairs for setting properties for the new object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
