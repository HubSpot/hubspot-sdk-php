<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::createFolder()
 *
 * @phpstan-type ListCreateFolderParamsShape = array{
 *   name: string, parentFolderID?: string|null
 * }
 */
final class ListCreateFolderParams implements BaseModel
{
    /** @use SdkModel<ListCreateFolderParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the folder to be created.
     */
    #[Required]
    public string $name;

    /**
     * The folder this should be created in, if not specified will be created in the root folder 0.
     */
    #[Optional('parentFolderId')]
    public ?string $parentFolderID;

    /**
     * `new ListCreateFolderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListCreateFolderParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListCreateFolderParams)->withName(...)
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
        ?string $parentFolderID = null
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $parentFolderID && $self['parentFolderID'] = $parentFolderID;

        return $self;
    }

    /**
     * The name of the folder to be created.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The folder this should be created in, if not specified will be created in the root folder 0.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $self = clone $this;
        $self['parentFolderID'] = $parentFolderID;

        return $self;
    }
}
