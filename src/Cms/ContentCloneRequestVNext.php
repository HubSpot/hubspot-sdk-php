<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for cloning content.
 *
 * @phpstan-type ContentCloneRequestVNextShape = array{
 *   id: string, cloneName?: string|null
 * }
 */
final class ContentCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<ContentCloneRequestVNextShape> */
    use SdkModel;

    /**
     * ID of the object to be cloned.
     */
    #[Required]
    public string $id;

    /**
     * Name of the cloned object.
     */
    #[Optional]
    public ?string $cloneName;

    /**
     * `new ContentCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentCloneRequestVNext::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentCloneRequestVNext)->withID(...)
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
    public static function with(string $id, ?string $cloneName = null): self
    {
        $self = new self;

        $self['id'] = $id;

        null !== $cloneName && $self['cloneName'] = $cloneName;

        return $self;
    }

    /**
     * ID of the object to be cloned.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Name of the cloned object.
     */
    public function withCloneName(string $cloneName): self
    {
        $self = clone $this;
        $self['cloneName'] = $cloneName;

        return $self;
    }
}
