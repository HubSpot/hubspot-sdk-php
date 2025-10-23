<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type task_locator = array{id: string, links?: array<string, string>}
 */
final class TaskLocator implements BaseModel
{
    /** @use SdkModel<task_locator> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var array<string, string>|null $links */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * `new TaskLocator()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TaskLocator::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TaskLocator)->withID(...)
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
    public static function with(string $id, ?array $links = null): self
    {
        $obj = new self;

        $obj->id = $id;

        null !== $links && $obj->links = $links;

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
