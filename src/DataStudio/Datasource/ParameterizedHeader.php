<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ParameterizedHeaderShape = array{
 *   parameters: array<string,string>, value: string
 * }
 */
final class ParameterizedHeader implements BaseModel
{
    /** @use SdkModel<ParameterizedHeaderShape> */
    use SdkModel;

    /**
     * An object containing additional parameters for the header, where each key is a parameter name and each value is a string representing the parameter's value.
     *
     * @var array<string,string> $parameters
     */
    #[Required(map: 'string')]
    public array $parameters;

    /**
     * A string representing the main value of the header.
     */
    #[Required]
    public string $value;

    /**
     * `new ParameterizedHeader()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParameterizedHeader::with(parameters: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParameterizedHeader)->withParameters(...)->withValue(...)
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
     * @param array<string,string> $parameters
     */
    public static function with(array $parameters, string $value): self
    {
        $self = new self;

        $self['parameters'] = $parameters;
        $self['value'] = $value;

        return $self;
    }

    /**
     * An object containing additional parameters for the header, where each key is a parameter name and each value is a string representing the parameter's value.
     *
     * @param array<string,string> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * A string representing the main value of the header.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
