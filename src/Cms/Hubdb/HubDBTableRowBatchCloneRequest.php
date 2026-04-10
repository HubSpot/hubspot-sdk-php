<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableRowBatchCloneRequestShape = array{
 *   id: string, name?: string|null
 * }
 */
final class HubDBTableRowBatchCloneRequest implements BaseModel
{
    /** @use SdkModel<HubDBTableRowBatchCloneRequestShape> */
    use SdkModel;

    /**
     * The ID of the row to be cloned.
     */
    #[Required]
    public string $id;

    /**
     * The name for the cloned row.
     */
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

    /**
     * The ID of the row to be cloned.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The name for the cloned row.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
