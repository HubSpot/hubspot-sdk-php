<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListFolderFetchResponseShape = array{folder: PublicListFolder}
 */
final class ListFolderFetchResponse implements BaseModel
{
    /** @use SdkModel<ListFolderFetchResponseShape> */
    use SdkModel;

    #[Required]
    public PublicListFolder $folder;

    /**
     * `new ListFolderFetchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListFolderFetchResponse::with(folder: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListFolderFetchResponse)->withFolder(...)
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
     *
     * @param PublicListFolder|array{
     *   id: string,
     *   childLists: list<int>,
     *   childNodes: list<mixed>,
     *   parentFolderID: string,
     *   createdAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedContentsAt?: \DateTimeInterface|null,
     *   userID?: int|null,
     * } $folder
     */
    public static function with(PublicListFolder|array $folder): self
    {
        $obj = new self;

        $obj['folder'] = $folder;

        return $obj;
    }

    /**
     * @param PublicListFolder|array{
     *   id: string,
     *   childLists: list<int>,
     *   childNodes: list<mixed>,
     *   parentFolderID: string,
     *   createdAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedContentsAt?: \DateTimeInterface|null,
     *   userID?: int|null,
     * } $folder
     */
    public function withFolder(PublicListFolder|array $folder): self
    {
        $obj = clone $this;
        $obj['folder'] = $folder;

        return $obj;
    }
}
