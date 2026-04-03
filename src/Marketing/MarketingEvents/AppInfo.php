<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AppInfoShape = array{id: string, name: string}
 */
final class AppInfo implements BaseModel
{
    /** @use SdkModel<AppInfoShape> */
    use SdkModel;

    /**
     * The ID of the application.
     */
    #[Required]
    public string $id;

    /**
     * The name of the application.
     */
    #[Required]
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
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The ID of the application.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The name of the application.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
