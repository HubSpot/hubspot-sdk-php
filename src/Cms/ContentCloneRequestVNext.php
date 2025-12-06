<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api]
    public string $id;

    /**
     * Name of the cloned object.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj['id'] = $id;

        null !== $cloneName && $obj['cloneName'] = $cloneName;

        return $obj;
    }

    /**
     * ID of the object to be cloned.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Name of the cloned object.
     */
    public function withCloneName(string $cloneName): self
    {
        $obj = clone $this;
        $obj['cloneName'] = $cloneName;

        return $obj;
    }
}
