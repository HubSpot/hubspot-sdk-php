<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type app_info = array{id: string, name: string}
 */
final class AppInfo implements BaseModel
{
    /** @use SdkModel<app_info> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $name;

    /**
     * `new AppInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppInfo::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppInfo)->withID(...)->withName(...)
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
    public static function with(string $id, string $name): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->name = $name;

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
}
