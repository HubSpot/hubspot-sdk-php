<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContentScheduleRequestVNextShape = array{
 *   id: string, publishDate: \DateTimeInterface
 * }
 */
final class ContentScheduleRequestVNext implements BaseModel
{
    /** @use SdkModel<ContentScheduleRequestVNextShape> */
    use SdkModel;

    /**
     * The ID of the object to be scheduled.
     */
    #[Required]
    public string $id;

    /**
     * The date the object should transition from scheduled to published.
     */
    #[Required]
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
        $self = new self;

        $self['id'] = $id;
        $self['publishDate'] = $publishDate;

        return $self;
    }

    /**
     * The ID of the object to be scheduled.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The date the object should transition from scheduled to published.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $self = clone $this;
        $self['publishDate'] = $publishDate;

        return $self;
    }
}
