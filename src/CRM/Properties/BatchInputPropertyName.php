<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_property_name = array{inputs: list<PropertyName>}
 */
final class BatchInputPropertyName implements BaseModel
{
    /** @use SdkModel<batch_input_property_name> */
    use SdkModel;

    /** @var list<PropertyName> $inputs */
    #[Api(list: PropertyName::class)]
    public array $inputs;

    /**
     * `new BatchInputPropertyName()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPropertyName::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPropertyName)->withInputs(...)
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
     * @param list<PropertyName> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PropertyName> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
