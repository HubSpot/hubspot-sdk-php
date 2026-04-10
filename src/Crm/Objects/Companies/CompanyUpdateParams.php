<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\Companies;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update a company by ID (`companyId`) or unique property value (`idProperty`). Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
 *
 * @see HubSpotSDK\Services\Crm\Objects\CompaniesService::update()
 *
 * @phpstan-type CompanyUpdateParamsShape = array{
 *   properties: array<string,string>, idProperty?: string|null
 * }
 */
final class CompanyUpdateParams implements BaseModel
{
    /** @use SdkModel<CompanyUpdateParamsShape> */
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
     * `new CompanyUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyUpdateParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyUpdateParams)->withProperties(...)
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
