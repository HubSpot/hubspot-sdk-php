<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Folders;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Creates a folder with the given information.
 *
 * @see HubspotSDK\Services\Crm\Lists\FoldersService::create()
 *
 * @phpstan-type FolderCreateParamsShape = array{
 *   name: string, parentFolderId?: string
 * }
 */
final class FolderCreateParams implements BaseModel
{
    /** @use SdkModel<FolderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the folder to be created.
     */
    #[Api]
    public string $name;

    /**
     * The folder this should be created in, if not specified will be created in the root folder 0.
     */
    #[Api(optional: true)]
    public ?string $parentFolderId;

    /**
     * `new FolderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderCreateParams)->withName(...)
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
    public static function with(
        string $name,
        ?string $parentFolderId = null
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $parentFolderId && $obj->parentFolderId = $parentFolderId;

        return $obj;
    }

    /**
     * The name of the folder to be created.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The folder this should be created in, if not specified will be created in the root folder 0.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderId = $parentFolderID;

        return $obj;
    }
}
