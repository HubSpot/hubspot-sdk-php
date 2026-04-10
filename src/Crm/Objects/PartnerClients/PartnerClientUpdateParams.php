<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\PartnerClients;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update the specified properties of an existing partner client.
 *
 * @see HubSpotSDK\Services\Crm\Objects\PartnerClientsService::update()
 *
 * @phpstan-type PartnerClientUpdateParamsShape = array{
 *   properties: array<string,string>, idProperty?: string|null
 * }
 */
final class PartnerClientUpdateParams implements BaseModel
{
    /** @use SdkModel<PartnerClientUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * The name of a property whose values are unique for this object type.
     */
    #[Optional]
    public ?string $idProperty;

    /**
     * `new PartnerClientUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PartnerClientUpdateParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PartnerClientUpdateParams)->withProperties(...)
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
     */
    public static function with(
        array $properties,
        ?string $idProperty = null
    ): self {
        $self = new self;

        $self['properties'] = $properties;

        null !== $idProperty && $self['idProperty'] = $idProperty;

        return $self;
    }

    /**
     * Key value pairs representing the properties of the object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The name of a property whose values are unique for this object type.
     */
    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}
