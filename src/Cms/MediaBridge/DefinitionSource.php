<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type DefinitionSourceShape = array{type: string, name?: string|null}
 */
final class DefinitionSource implements BaseModel
{
    /** @use SdkModel<DefinitionSourceShape> */
    use SdkModel;

    #[Required]
    public string $type;

    #[Optional]
    public ?string $name;

    /**
     * `new DefinitionSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionSource::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionSource)->withType(...)
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
    public static function with(string $type, ?string $name = null): self
    {
        $self = new self;

        $self['type'] = $type;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
