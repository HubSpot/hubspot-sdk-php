<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Owners;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicTeamShape = array{id: string, name: string, primary: bool}
 */
final class PublicTeam implements BaseModel
{
    /** @use SdkModel<PublicTeamShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $name;

    #[Required]
    public bool $primary;

    /**
     * `new PublicTeam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicTeam::with(id: ..., name: ..., primary: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicTeam)->withID(...)->withName(...)->withPrimary(...)
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
    public static function with(string $id, string $name, bool $primary): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['primary'] = $primary;

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

    public function withPrimary(bool $primary): self
    {
        $self = clone $this;
        $self['primary'] = $primary;

        return $self;
    }
}
