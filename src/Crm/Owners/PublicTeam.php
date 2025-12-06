<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Owners;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicTeamShape = array{id: string, name: string, primary: bool}
 */
final class PublicTeam implements BaseModel
{
    /** @use SdkModel<PublicTeamShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $name;

    #[Api]
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['name'] = $name;
        $obj['primary'] = $primary;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withPrimary(bool $primary): self
    {
        $obj = clone $this;
        $obj['primary'] = $primary;

        return $obj;
    }
}
