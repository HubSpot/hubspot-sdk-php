<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListFolderCreateResponseShape = array{folder: PublicListFolder}
 */
final class ListFolderCreateResponse implements BaseModel
{
    /** @use SdkModel<ListFolderCreateResponseShape> */
    use SdkModel;

    #[Api]
    public PublicListFolder $folder;

    /**
     * `new ListFolderCreateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListFolderCreateResponse::with(folder: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListFolderCreateResponse)->withFolder(...)
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
    public static function with(PublicListFolder $folder): self
    {
        $obj = new self;

        $obj->folder = $folder;

        return $obj;
    }

    public function withFolder(PublicListFolder $folder): self
    {
        $obj = clone $this;
        $obj->folder = $folder;

        return $obj;
    }
}
