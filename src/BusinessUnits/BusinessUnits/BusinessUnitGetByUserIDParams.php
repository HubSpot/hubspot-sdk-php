<?php

declare(strict_types=1);

namespace HubspotSDK\BusinessUnits\BusinessUnits;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\BusinessUnits\BusinessUnitsService::getByUserID()
 *
 * @phpstan-type BusinessUnitGetByUserIDParamsShape = array{
 *   name?: list<string>|null, properties?: list<string>|null
 * }
 */
final class BusinessUnitGetByUserIDParams implements BaseModel
{
    /** @use SdkModel<BusinessUnitGetByUserIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $name */
    #[Optional(list: 'string')]
    public ?array $name;

    /** @var list<string>|null $properties */
    #[Optional(list: 'string')]
    public ?array $properties;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $name
     * @param list<string>|null $properties
     */
    public static function with(
        ?array $name = null,
        ?array $properties = null
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $properties && $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<string> $name
     */
    public function withName(array $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
