<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
        $obj = new self;

        $obj['name'] = $name;

        null !== $parentFolderID && $obj['parentFolderID'] = $parentFolderID;

        return $obj;
    }

    /**
     * The name of the folder to be created.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The folder this should be created in, if not specified will be created in the root folder 0.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj['parentFolderID'] = $parentFolderID;

        return $obj;
    }
}
