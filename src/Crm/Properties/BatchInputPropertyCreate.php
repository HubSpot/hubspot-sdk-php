<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PropertyCreateShape from \HubSpotSDK\Crm\Properties\PropertyCreate
 *
 * @phpstan-type BatchInputPropertyCreateShape = array{
 *   inputs: list<PropertyCreate|PropertyCreateShape>
 * }
 */
final class BatchInputPropertyCreate implements BaseModel
{
    /** @use SdkModel<BatchInputPropertyCreateShape> */
    use SdkModel;

    /** @var list<PropertyCreate> $inputs */
    #[Required(list: PropertyCreate::class)]
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
     * @param list<PropertyCreate|PropertyCreateShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PropertyCreate|PropertyCreateShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
