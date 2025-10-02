<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Properties\PropertyReadParams\DataSensitivity;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PropertyReadParams); // set properties as needed
 * $client->crm.properties->read(...$params->toArray());
 * ```
 * Read a batch of properties.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.properties->read(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Properties->read
 *
 * @phpstan-type property_read_params = array{
 *   archived: bool,
 *   inputs: list<CRMPropertiesPropertyName>,
 *   dataSensitivity?: DataSensitivity|value-of<DataSensitivity>,
 * }
 */
final class PropertyReadParams implements BaseModel
{
    /** @use SdkModel<property_read_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public bool $archived;

    /** @var list<CRMPropertiesPropertyName> $inputs */
    #[Api(list: CRMPropertiesPropertyName::class)]
    public array $inputs;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Api(enum: DataSensitivity::class, optional: true)]
    public ?string $dataSensitivity;

    /**
     * `new PropertyReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyReadParams::with(archived: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyReadParams)->withArchived(...)->withInputs(...)
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
     * @param list<CRMPropertiesPropertyName> $inputs
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public static function with(
        bool $archived,
        array $inputs,
        DataSensitivity|string|null $dataSensitivity = null,
    ): self {
        $obj = new self;

        $obj->archived = $archived;
        $obj->inputs = $inputs;

        null !== $dataSensitivity && $obj->dataSensitivity = $dataSensitivity instanceof DataSensitivity ? $dataSensitivity->value : $dataSensitivity;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * @param list<CRMPropertiesPropertyName> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $obj = clone $this;
        $obj->dataSensitivity = $dataSensitivity instanceof DataSensitivity ? $dataSensitivity->value : $dataSensitivity;

        return $obj;
    }
}
