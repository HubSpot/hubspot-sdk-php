<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicListFolderShape from \HubspotSDK\Crm\Lists\PublicListFolder
 *
 * @phpstan-type ListFolderCreateResponseShape = array{
 *   folder: PublicListFolder|PublicListFolderShape
 * }
 */
final class ListFolderCreateResponse implements BaseModel
{
    /** @use SdkModel<ListFolderCreateResponseShape> */
    use SdkModel;

    #[Required]
    public PublicListFolder $folder;

    /**
     * `new ListFolderCreateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListFolderCreateResponse::with(folder: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListFolderCreateResponse)->withFolder(...)
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
     * @param PublicListFolderShape $folder
     */
    public static function with(PublicListFolder|array $folder): self
    {
        $self = new self;

        $self['folder'] = $folder;

        return $self;
    }

    /**
     * @param PublicListFolderShape $folder
     */
    public function withFolder(PublicListFolder|array $folder): self
    {
        $self = clone $this;
        $self['folder'] = $folder;

        return $self;
    }
}
