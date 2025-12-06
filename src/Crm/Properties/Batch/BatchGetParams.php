<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Properties\Batch\BatchGetParams\DataSensitivity;
use HubspotSDK\PropertyName;

/**
 * Read a provided list of properties.
 *
 * @see HubspotSDK\Services\Crm\Properties\BatchService::get()
 *
 * @phpstan-type BatchGetParamsShape = array{
 *   archived: bool,
 *   dataSensitivity: DataSensitivity|value-of<DataSensitivity>,
 *   inputs: list<PropertyName|array{name: string}>,
 *   locale?: string,
 * }
 */
final class BatchGetParams implements BaseModel
{
    /** @use SdkModel<BatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public bool $archived;

    /** @var value-of<DataSensitivity> $dataSensitivity */
    #[Api(enum: DataSensitivity::class)]
    public string $dataSensitivity;

    /** @var list<PropertyName> $inputs */
    #[Api(list: PropertyName::class)]
    public array $inputs;

    #[Api(optional: true)]
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
     * @param list<PropertyName|array{name: string}> $inputs
     */
    public static function with(
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs,
        ?string $locale = null,
    ): self {
        $obj = new self;

        $obj['archived'] = $archived;
        $obj['dataSensitivity'] = $dataSensitivity;
        $obj['inputs'] = $inputs;

        null !== $locale && $obj['locale'] = $locale;

        return $obj;
    }

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

    /**
     * @param list<PropertyName|array{name: string}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }

    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj['locale'] = $locale;

        return $obj;
    }
}
