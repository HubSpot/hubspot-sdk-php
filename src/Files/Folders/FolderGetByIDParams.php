<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Folders;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a folder by its ID.
 *
 * @see HubspotSDK\Services\Files\FoldersService::getByID()
 *
 * @phpstan-type FolderGetByIDParamsShape = array{properties?: list<string>}
 */
final class FolderGetByIDParams implements BaseModel
{
    /** @use SdkModel<FolderGetByIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Properties to set on returned folder.
     *
     * @var list<string>|null $properties
     */
    #[Api(list: 'string', optional: true)]
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
        $obj = new self;

        null !== $properties && $obj->properties = $properties;

        return $obj;
    }

    /**
     * Properties to set on returned folder.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
