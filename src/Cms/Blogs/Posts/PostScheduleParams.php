<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Schedule a blog post to be published at a specified time.
 *
 * @see HubspotSDK\Cms\Blogs\Posts->schedule
 *
 * @phpstan-type post_schedule_params = array{
 *   id: string, publishDate: \DateTimeInterface
 * }
 */
final class PostScheduleParams implements BaseModel
{
    /** @use SdkModel<post_schedule_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the object to be scheduled.
     */
    #[Api]
    public string $id;

    /**
     * The date the object should transition from scheduled to published.
     */
    #[Api]
    public \DateTimeInterface $publishDate;

    /**
     * `new PostScheduleParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostScheduleParams::with(id: ..., publishDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostScheduleParams)->withID(...)->withPublishDate(...)
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

    /**
     * The ID of the object to be scheduled.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The date the object should transition from scheduled to published.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }
}
