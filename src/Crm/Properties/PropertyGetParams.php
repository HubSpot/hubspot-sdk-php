<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Properties\PropertyGetParams\DataSensitivity;

/**
 * Read a property identified by {propertyName}.
 *
 * @see HubspotSDK\Services\Crm\PropertiesService::get()
 *
 * @phpstan-type PropertyGetParamsShape = array{
 *   objectType: string,
 *   archived?: bool,
 *   dataSensitivity?: DataSensitivity|value-of<DataSensitivity>,
 *   locale?: string,
 *   properties?: string,
 * }
 */
final class PropertyGetParams implements BaseModel
{
    /** @use SdkModel<PropertyGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Api(enum: DataSensitivity::class, optional: true)]
    public ?string $dataSensitivity;

    #[Api(optional: true)]
    public ?string $locale;

    #[Api(optional: true)]
    public ?string $properties;

    /**
     * `new PropertyGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyGetParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyGetParams)->withObjectType(...)
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
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public static function with(
        string $objectType,
        ?bool $archived = null,
        DataSensitivity|string|null $dataSensitivity = null,
        ?string $locale = null,
        ?string $properties = null,
    ): self {
        $obj = new self;

        $obj['objectType'] = $objectType;

        null !== $archived && $obj['archived'] = $archived;
        null !== $dataSensitivity && $obj['dataSensitivity'] = $dataSensitivity;
        null !== $locale && $obj['locale'] = $locale;
        null !== $properties && $obj['properties'] = $properties;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $obj = clone $this;
        $obj['dataSensitivity'] = $dataSensitivity;

        return $obj;
    }

    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj['locale'] = $locale;

        return $obj;
    }

    public function withProperties(string $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
