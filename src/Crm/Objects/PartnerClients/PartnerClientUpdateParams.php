<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerClients;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\PartnerClientsService::update()
 *
 * @phpstan-type PartnerClientUpdateParamsShape = array{
 *   properties: array<string,string>, idProperty?: string
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

    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}
