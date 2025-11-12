<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Information on the task that has been started, and where to check it's status.
 *
 * @phpstan-type FolderUpdateTaskLocatorShape = array{
 *   id: string, links: array<string,string>
 * }
 */
final class FolderUpdateTaskLocator implements BaseModel
{
    /** @use SdkModel<FolderUpdateTaskLocatorShape> */
    use SdkModel;

    /**
     * ID of the task.
     */
    #[Api]
    public string $id;

    /**
     * Links for where to check information related to the task. The `status` link gives the URL for where to check the status of the task.
     *
     * @var array<string,string> $links
     */
    #[Api(map: 'string')]
    public array $links;

    /**
     * `new FolderUpdateTaskLocator()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderUpdateTaskLocator::with(id: ..., links: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderUpdateTaskLocator)->withID(...)->withLinks(...)
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
     * @param array<string,string> $links
     */
    public static function with(string $id, array $links): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->links = $links;

        return $obj;
    }

    /**
     * ID of the task.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Links for where to check information related to the task. The `status` link gives the URL for where to check the status of the task.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }
}
