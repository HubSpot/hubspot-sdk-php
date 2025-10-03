<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type files_folder_update_task_locator = array{
 *   id: string, links: array<string, string>
 * }
 */
final class FilesFolderUpdateTaskLocator implements BaseModel
{
    /** @use SdkModel<files_folder_update_task_locator> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var array<string, string> $links */
    #[Api(map: 'string')]
    public array $links;

    /**
     * `new FilesFolderUpdateTaskLocator()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilesFolderUpdateTaskLocator::with(id: ..., links: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilesFolderUpdateTaskLocator)->withID(...)->withLinks(...)
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
     * @param array<string, string> $links
     */
    public static function with(string $id, array $links): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->links = $links;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param array<string, string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }
}
