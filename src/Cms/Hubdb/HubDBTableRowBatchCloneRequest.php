<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableRowBatchCloneRequestShape = array{
 *   id: string, name?: string|null
 * }
 */
final class HubDBTableRowBatchCloneRequest implements BaseModel
{
    /** @use SdkModel<HubDBTableRowBatchCloneRequestShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Optional]
    public ?string $name;

    /**
     * `new HubDBTableRowBatchCloneRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableRowBatchCloneRequest::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableRowBatchCloneRequest)->withID(...)
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
    public static function with(string $id, ?string $name = null): self
    {
        $self = new self;

        $self['id'] = $id;

        null !== $name && $self['name'] = $name;

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
}
