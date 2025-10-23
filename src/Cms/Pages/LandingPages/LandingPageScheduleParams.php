<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Schedule a Landing Page to be Published.
 *
 * @see HubspotSDK\Cms\Pages\LandingPages->schedule
 *
 * @phpstan-type landing_page_schedule_params = array{
 *   id: string, publishDate: \DateTimeInterface
 * }
 */
final class LandingPageScheduleParams implements BaseModel
{
    /** @use SdkModel<landing_page_schedule_params> */
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
