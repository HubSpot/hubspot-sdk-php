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
 * $params = (new FolderUpdateByIDParams); // set properties as needed
 * $client->files.folders->updateByID(...$params->toArray());
 * ```
 * Update folder properties by folder ID.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.folders->updateByID(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Folders->updateByID
 *
 * @phpstan-type folder_update_by_id_params = array{
 *   name?: string, parentFolderID?: int
 * }
 */
final class FolderUpdateByIDParams implements BaseModel
{
    /** @use SdkModel<folder_update_by_id_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $name;

    #[Api('parentFolderId', optional: true)]
    public ?int $parentFolderID;

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
        ?string $name = null,
        ?int $parentFolderID = null
    ): self {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $parentFolderID && $obj->parentFolderID = $parentFolderID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withParentFolderID(int $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderID = $parentFolderID;

        return $obj;
    }
}
