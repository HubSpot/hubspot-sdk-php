<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Folders;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieves a folder and recursively includes all folders via the childNodes attribute.  The child lists field will be empty in all child nodes. Only the folder retrieved will include the child lists in that folder.
 *
 * @see HubspotSDK\Crm\Lists\Folders->get
 *
 * @phpstan-type FolderGetParamsShape = array{folderID?: string}
 */
final class FolderGetParams implements BaseModel
{
    /** @use SdkModel<FolderGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The Id of the folder to retrieve.
     */
    #[Api(optional: true)]
    public ?string $folderID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $folderID = null): self
    {
        $obj = new self;

        null !== $folderID && $obj->folderID = $folderID;

        return $obj;
    }

    /**
     * The Id of the folder to retrieve.
     */
    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj->folderID = $folderID;

        return $obj;
    }
}
