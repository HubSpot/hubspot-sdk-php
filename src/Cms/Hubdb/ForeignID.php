<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ForeignIDShape = array{id: string, name: string, type: string}
 */
final class ForeignID implements BaseModel
{
    /** @use SdkModel<ForeignIDShape> */
    use SdkModel;

    /**
     * Unique identifier for the foreign ID.
     */
    #[Required]
    public string $id;

    /**
     * Name of the foreign ID.
     */
    #[Required]
    public string $name;

    /**
     * Type of the foreign ID.
     */
    #[Required]
    public string $type;

    /**
     * `new ForeignID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ForeignID::with(id: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ForeignID)->withID(...)->withName(...)->withType(...)
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
     */
    public static function with(string $id, string $name, string $type): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Unique identifier for the foreign ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Name of the foreign ID.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Type of the foreign ID.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
