<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Quotes;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\PublicAssociationsForObject;
use HubspotSDK\PublicObjectID;

/**
 * Create a quote with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard quotes is provided.
 *
 * @see HubspotSDK\Services\Crm\Objects\QuotesService::create()
 *
 * @phpstan-type QuoteCreateParamsShape = array{
 *   associations: list<PublicAssociationsForObject|array{
 *     to: PublicObjectID, types: list<AssociationSpec>
 *   }>,
 *   properties: array<string,string>,
 * }
 */
final class QuoteCreateParams implements BaseModel
{
    /** @use SdkModel<QuoteCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicAssociationsForObject> $associations */
    #[Required(list: PublicAssociationsForObject::class)]
    public array $associations;

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * `new QuoteCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QuoteCreateParams::with(associations: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QuoteCreateParams)->withAssociations(...)->withProperties(...)
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
        $self = new self;

        $self['associations'] = $associations;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<PublicAssociationsForObject|array{
     *   to: PublicObjectID, types: list<AssociationSpec>
     * }> $associations
     */
    public function withAssociations(array $associations): self
    {
        $self = clone $this;
        $self['associations'] = $associations;

        return $self;
    }

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
