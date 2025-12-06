<?php

declare(strict_types=1);

namespace HubspotSDK\BusinessUnits;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(list: 'string', optional: true)]
    public ?array $name;

    /**
     * The names of properties to optionally include in the response body. The only valid value is `logoMetadata`.
     *
     * @var list<string>|null $properties
     */
    #[Api(list: 'string', optional: true)]
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
        $obj = new self;

        null !== $name && $obj['name'] = $name;
        null !== $properties && $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * The names of Business Units to retrieve. If empty or not provided, then all associated Business Units will be returned.
     *
     * @param list<string> $name
     */
    public function withName(array $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The names of properties to optionally include in the response body. The only valid value is `logoMetadata`.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
