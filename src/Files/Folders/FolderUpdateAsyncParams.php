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
 * $params = (new FolderUpdateAsyncParams); // set properties as needed
 * $client->files.folders->updateAsync(...$params->toArray());
 * ```
 * Update properties of folder by given ID. This action happens asynchronously and will update all of the folder's children as well.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.folders->updateAsync(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Folders->updateAsync
 *
 * @phpstan-type folder_update_async_params = array{
 *   id: string, name?: string, parentFolderID?: int
 * }
 */
final class FolderUpdateAsyncParams implements BaseModel
{
    /** @use SdkModel<folder_update_async_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the folder to be updated.
     */
    #[Api]
    public string $id;

    /**
     * The new name for the folder, which will also update the fullPath and all children of the folder.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The ID of the new parent folder, which will move the folder and its children into the specified folder.
     */
    #[Api('parentFolderId', optional: true)]
    public ?int $parentFolderID;

    /**
     * `new FolderUpdateAsyncParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderUpdateAsyncParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderUpdateAsyncParams)->withID(...)
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
        string $id,
        ?string $name = null,
        ?int $parentFolderID = null
    ): self {
        $obj = new self;

        $obj->id = $id;

        null !== $name && $obj->name = $name;
        null !== $parentFolderID && $obj->parentFolderID = $parentFolderID;

        return $obj;
    }

    /**
     * The unique identifier of the folder to be updated.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The new name for the folder, which will also update the fullPath and all children of the folder.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The ID of the new parent folder, which will move the folder and its children into the specified folder.
     */
    public function withParentFolderID(int $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderID = $parentFolderID;

        return $obj;
    }
}
