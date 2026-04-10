<?php

declare(strict_types=1);

namespace HubSpotSDK\BusinessUnits\BusinessUnitEntries;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the brands that a specific user can access.
 *
 * @see HubSpotSDK\Services\BusinessUnits\BusinessUnitEntriesService::getByUserID()
 *
 * @phpstan-type BusinessUnitEntryGetByUserIDParamsShape = array{
 *   name?: list<string>|null, properties?: list<string>|null
 * }
 */
final class BusinessUnitEntryGetByUserIDParams implements BaseModel
{
    /** @use SdkModel<BusinessUnitEntryGetByUserIDParamsShape> */
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
