<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Properties\PropertyListParams\DataSensitivity;

/**
 * Read all existing properties for the specified object type and HubSpot account.
 *
 * @see HubspotSDK\Services\Crm\PropertiesService::list()
 *
 * @phpstan-type PropertyListParamsShape = array{
 *   archived?: bool|null,
 *   dataSensitivity?: null|DataSensitivity|value-of<DataSensitivity>,
 *   locale?: string|null,
 *   properties?: string|null,
 * }
 */
final class PropertyListParams implements BaseModel
{
    /** @use SdkModel<PropertyListParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?bool $archived = null,
        DataSensitivity|string|null $dataSensitivity = null,
        ?string $locale = null,
        ?string $properties = null,
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $dataSensitivity && $self['dataSensitivity'] = $dataSensitivity;
        null !== $locale && $self['locale'] = $locale;
        null !== $properties && $self['properties'] = $properties;

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
