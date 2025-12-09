<?php

declare(strict_types=1);

namespace HubspotSDK\BusinessUnits;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get Business Units identified by `userId`. The `userId` refers to the user’s ID.
 *
 * @see HubspotSDK\Services\BusinessUnitsService::getByUserID()
 *
 * @phpstan-type BusinessUnitGetByUserIDParamsShape = array{
 *   name?: list<string>, properties?: list<string>
 * }
 */
final class BusinessUnitGetByUserIDParams implements BaseModel
{
    /** @use SdkModel<BusinessUnitGetByUserIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The names of Business Units to retrieve. If empty or not provided, then all associated Business Units will be returned.
     *
     * @var list<string>|null $name
     */
    #[Optional(list: 'string')]
    public ?array $name;

    /**
     * The names of properties to optionally include in the response body. The only valid value is `logoMetadata`.
     *
     * @var list<string>|null $properties
     */
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
     * @param list<string> $name
     * @param list<string> $properties
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
     * The names of Business Units to retrieve. If empty or not provided, then all associated Business Units will be returned.
     *
     * @param list<string> $name
     */
    public function withName(array $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The names of properties to optionally include in the response body. The only valid value is `logoMetadata`.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
