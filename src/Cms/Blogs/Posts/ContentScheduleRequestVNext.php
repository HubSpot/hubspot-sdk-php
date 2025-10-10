<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type content_schedule_request_v_next = array{
 *   id: string, publishDate: \DateTimeInterface
 * }
 */
final class ContentScheduleRequestVNext implements BaseModel
{
    /** @use SdkModel<content_schedule_request_v_next> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $publishDate;

    /**
     * `new ContentScheduleRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentScheduleRequestVNext::with(id: ..., publishDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentScheduleRequestVNext)->withID(...)->withPublishDate(...)
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
        string $id,
        \DateTimeInterface $publishDate
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->publishDate = $publishDate;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }
}
