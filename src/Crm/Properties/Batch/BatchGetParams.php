<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties\Batch;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Properties\Batch\BatchGetParams\DataSensitivity;
use HubSpotSDK\PropertyName;

/**
 * Read a provided list of properties.
 *
 * @see HubSpotSDK\Services\Crm\Properties\BatchService::get()
 *
 * @phpstan-import-type PropertyNameShape from \HubSpotSDK\PropertyName
 *
 * @phpstan-type BatchGetParamsShape = array{
 *   archived: bool,
 *   dataSensitivity: DataSensitivity|value-of<DataSensitivity>,
 *   inputs: list<PropertyName|PropertyNameShape>,
 *   locale?: string|null,
 * }
 */
final class BatchGetParams implements BaseModel
{
    /** @use SdkModel<BatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public bool $archived;

    /** @var value-of<DataSensitivity> $dataSensitivity */
    #[Required(enum: DataSensitivity::class)]
    public string $dataSensitivity;

    /** @var list<PropertyName> $inputs */
    #[Required(list: PropertyName::class)]
    public array $inputs;

    #[Optional]
    public ?string $locale;

    /**
     * `new BatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetParams::with(archived: ..., dataSensitivity: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetParams)
     *   ->withArchived(...)
     *   ->withDataSensitivity(...)
     *   ->withInputs(...)
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
     * @param list<PropertyName|PropertyNameShape> $inputs
     */
    public static function with(
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs,
        ?string $locale = null,
    ): self {
        $self = new self;

        $self['archived'] = $archived;
        $self['dataSensitivity'] = $dataSensitivity;
        $self['inputs'] = $inputs;

        null !== $locale && $self['locale'] = $locale;

        return $self;
    }

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

    /**
     * @param list<PropertyName|PropertyNameShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }
}
