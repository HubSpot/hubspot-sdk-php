<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ForeignIDShape = array{id: string, name: string, type: string}
 */
final class ForeignID implements BaseModel
{
    /** @use SdkModel<ForeignIDShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $name;

    #[Api]
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
        $obj = new self;

        $obj->id = $id;
        $obj->name = $name;
        $obj->type = $type;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
