<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type definition_source = array{type: string, name?: string}
 */
final class DefinitionSource implements BaseModel
{
    /** @use SdkModel<definition_source> */
    use SdkModel;

    #[Api]
    public string $type;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->type = $type;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
