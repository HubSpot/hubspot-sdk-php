<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicListFolderShape from \HubSpotSDK\Crm\Lists\PublicListFolder
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
     * @param PublicListFolder|PublicListFolderShape $folder
     */
    public static function with(PublicListFolder|array $folder): self
    {
        $self = new self;

        $self['folder'] = $folder;

        return $self;
    }

    /**
     * @param PublicListFolder|PublicListFolderShape $folder
     */
    public function withFolder(PublicListFolder|array $folder): self
    {
        $self = clone $this;
        $self['folder'] = $folder;

        return $self;
    }
}
