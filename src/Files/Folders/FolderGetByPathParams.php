<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Folders;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a folder, identified by its path.
 *
 * @see HubspotSDK\Services\Files\FoldersService::getByPath()
 *
 * @phpstan-type FolderGetByPathParamsShape = array{properties?: list<string>}
 */
final class FolderGetByPathParams implements BaseModel
{
    /** @use SdkModel<FolderGetByPathParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Properties to set on returned folder.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $properties
     */
    public static function with(?array $properties = null): self
    {
        $self = new self;

        null !== $properties && $self['properties'] = $properties;

        return $self;
    }

    /**
     * Properties to set on returned folder.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
