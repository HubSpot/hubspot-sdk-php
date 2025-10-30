<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListFolderFetchResponseShape = array{folder: PublicListFolder}
 */
final class ListFolderFetchResponse implements BaseModel
{
    /** @use SdkModel<ListFolderFetchResponseShape> */
    use SdkModel;

    #[Api]
    public PublicListFolder $folder;

    /**
     * `new ListFolderFetchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListFolderFetchResponse::with(folder: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListFolderFetchResponse)->withFolder(...)
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
