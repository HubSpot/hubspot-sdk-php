<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public string $objectType;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Optional(enum: DataSensitivity::class)]
    public ?string $dataSensitivity;

    #[Optional]
    public ?string $locale;

    #[Optional]
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
        $self = new self;

        $self['objectType'] = $objectType;

        null !== $archived && $self['archived'] = $archived;
        null !== $dataSensitivity && $self['dataSensitivity'] = $dataSensitivity;
        null !== $locale && $self['locale'] = $locale;
        null !== $properties && $self['properties'] = $properties;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $self = clone $this;
        $self['dataSensitivity'] = $dataSensitivity;

        return $self;
    }

    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }

    public function withProperties(string $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
