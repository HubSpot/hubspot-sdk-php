<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type folder_update_input = array{name?: string, parentFolderID?: int}
 */
final class FolderUpdateInput implements BaseModel
{
    /** @use SdkModel<folder_update_input> */
    use SdkModel;

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
