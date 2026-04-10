<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListFolderCreateRequestShape = array{
 *   name: string, parentFolderID?: string|null
 * }
 */
final class ListFolderCreateRequest implements BaseModel
{
    /** @use SdkModel<ListFolderCreateRequestShape> */
    use SdkModel;

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
     * `new ListFolderCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListFolderCreateRequest::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListFolderCreateRequest)->withName(...)
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
