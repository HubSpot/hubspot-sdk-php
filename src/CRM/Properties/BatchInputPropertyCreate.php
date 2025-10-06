<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_property_create = array{inputs: list<PropertyCreate>}
 */
final class BatchInputPropertyCreate implements BaseModel
{
    /** @use SdkModel<batch_input_property_create> */
    use SdkModel;

    /** @var list<PropertyCreate> $inputs */
    #[Api(list: PropertyCreate::class)]
    public array $inputs;

    /**
     * `new BatchInputPropertyCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPropertyCreate::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPropertyCreate)->withInputs(...)
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
     * @param list<PropertyCreate> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PropertyCreate> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
