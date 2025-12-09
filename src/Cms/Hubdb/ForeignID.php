<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ForeignIDShape = array{id: string, name: string, type: string}
 */
final class ForeignID implements BaseModel
{
    /** @use SdkModel<ForeignIDShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $name;

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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
