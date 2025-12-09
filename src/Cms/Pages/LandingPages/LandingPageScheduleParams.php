<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Schedule a Landing Page to be Published.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::schedule()
 *
 * @phpstan-type LandingPageScheduleParamsShape = array{
 *   id: string, publishDate: \DateTimeInterface
 * }
 */
final class LandingPageScheduleParams implements BaseModel
{
    /** @use SdkModel<LandingPageScheduleParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * `new LandingPageScheduleParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageScheduleParams::with(id: ..., publishDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageScheduleParams)->withID(...)->withPublishDate(...)
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
