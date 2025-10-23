<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete the Folder object identified by the id in the path.
 *
 * @see HubspotSDK\Cms\Pages\LandingPages->deleteFolder
 *
 * @phpstan-type landing_page_delete_folder_params = array{archived?: bool}
 */
final class LandingPageDeleteFolderParams implements BaseModel
{
    /** @use SdkModel<landing_page_delete_folder_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $archived = null): self
    {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
