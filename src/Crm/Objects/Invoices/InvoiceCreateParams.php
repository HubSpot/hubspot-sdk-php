<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\Invoices;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Objects\PublicAssociationsForObject;

/**
 * Create a invoice with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard invoices is provided.
 *
 * @see HubSpotSDK\Services\Crm\Objects\InvoicesService::create()
 *
 * @phpstan-import-type PublicAssociationsForObjectShape from \HubSpotSDK\Crm\Objects\PublicAssociationsForObject
 *
 * @phpstan-type InvoiceCreateParamsShape = array{
 *   associations: list<PublicAssociationsForObject|PublicAssociationsForObjectShape>,
 *   properties: array<string,string>,
 * }
 */
final class InvoiceCreateParams implements BaseModel
{
    /** @use SdkModel<InvoiceCreateParamsShape> */
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
     * `new InvoiceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InvoiceCreateParams::with(associations: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InvoiceCreateParams)->withAssociations(...)->withProperties(...)
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
     * @param list<PublicAssociationsForObject|PublicAssociationsForObjectShape> $associations
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
     * @param list<PublicAssociationsForObject|PublicAssociationsForObjectShape> $associations
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
