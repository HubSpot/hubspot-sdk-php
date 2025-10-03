<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Folders;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FolderCreateParams); // set properties as needed
 * $client->files.folders->create(...$params->toArray());
 * ```
 * Create folder.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.folders->create(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Folders->create
 *
 * @phpstan-type folder_create_params = array{
 *   name: string, parentFolderID?: string, parentPath?: string
 * }
 */
final class FolderCreateParams implements BaseModel
{
    /** @use SdkModel<folder_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $name;

    #[Api('parentFolderId', optional: true)]
    public ?string $parentFolderID;

    #[Api(optional: true)]
    public ?string $parentPath;

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
        ?string $parentFolderID = null,
        ?string $parentPath = null
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $parentFolderID && $obj->parentFolderID = $parentFolderID;
        null !== $parentPath && $obj->parentPath = $parentPath;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderID = $parentFolderID;

        return $obj;
    }

    public function withParentPath(string $parentPath): self
    {
        $obj = clone $this;
        $obj->parentPath = $parentPath;

        return $obj;
    }
}
