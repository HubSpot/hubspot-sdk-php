<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaTypeShape = array{
 *   parameters: array<string,string>,
 *   subtype: string,
 *   type: string,
 *   wildcardSubtype: bool,
 *   wildcardType: bool,
 * }
 */
final class MediaType implements BaseModel
{
    /** @use SdkModel<MediaTypeShape> */
    use SdkModel;

    /**
     * An object containing additional parameters for the media type, where each key-value pair is a string.
     *
     * @var array<string,string> $parameters
     */
    #[Required(map: 'string')]
    public array $parameters;

    /**
     * The specific subtype of the media, represented as a string.
     */
    #[Required]
    public string $subtype;

    /**
     * The primary type of the media, represented as a string.
     */
    #[Required]
    public string $type;

    /**
     * A boolean indicating whether the media subtype is a wildcard.
     */
    #[Required]
    public bool $wildcardSubtype;

    /**
     * A boolean indicating whether the media type is a wildcard.
     */
    #[Required]
    public bool $wildcardType;

    /**
     * `new MediaType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaType::with(
     *   parameters: ...,
     *   subtype: ...,
     *   type: ...,
     *   wildcardSubtype: ...,
     *   wildcardType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaType)
     *   ->withParameters(...)
     *   ->withSubtype(...)
     *   ->withType(...)
     *   ->withWildcardSubtype(...)
     *   ->withWildcardType(...)
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
    public static function with(
        array $parameters,
        string $subtype,
        string $type,
        bool $wildcardSubtype,
        bool $wildcardType,
    ): self {
        $self = new self;

        $self['parameters'] = $parameters;
        $self['subtype'] = $subtype;
        $self['type'] = $type;
        $self['wildcardSubtype'] = $wildcardSubtype;
        $self['wildcardType'] = $wildcardType;

        return $self;
    }

    /**
     * An object containing additional parameters for the media type, where each key-value pair is a string.
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
     * The specific subtype of the media, represented as a string.
     */
    public function withSubtype(string $subtype): self
    {
        $self = clone $this;
        $self['subtype'] = $subtype;

        return $self;
    }

    /**
     * The primary type of the media, represented as a string.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * A boolean indicating whether the media subtype is a wildcard.
     */
    public function withWildcardSubtype(bool $wildcardSubtype): self
    {
        $self = clone $this;
        $self['wildcardSubtype'] = $wildcardSubtype;

        return $self;
    }

    /**
     * A boolean indicating whether the media type is a wildcard.
     */
    public function withWildcardType(bool $wildcardType): self
    {
        $self = clone $this;
        $self['wildcardType'] = $wildcardType;

        return $self;
    }
}
