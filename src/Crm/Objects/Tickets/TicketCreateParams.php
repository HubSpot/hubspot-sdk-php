<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Tickets;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\PublicAssociationsForObject;

/**
 * Create a ticket with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard tickets is provided.
 *
 * @see HubspotSDK\Services\Crm\Objects\TicketsService::create()
 *
 * @phpstan-import-type PublicAssociationsForObjectShape from \HubspotSDK\Crm\PublicAssociationsForObject
 *
 * @phpstan-type TicketCreateParamsShape = array{
 *   associations: list<PublicAssociationsForObjectShape>,
 *   properties: array<string,string>,
 * }
 */
final class TicketCreateParams implements BaseModel
{
    /** @use SdkModel<TicketCreateParamsShape> */
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
     * `new TicketCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TicketCreateParams::with(associations: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TicketCreateParams)->withAssociations(...)->withProperties(...)
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
     * @param list<PublicAssociationsForObjectShape> $associations
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
     * @param list<PublicAssociationsForObjectShape> $associations
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
