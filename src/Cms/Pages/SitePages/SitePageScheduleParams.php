<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Schedule a Site Page to be Published.
 *
 * @see HubspotSDK\Services\Cms\Pages\SitePagesService::schedule()
 *
 * @phpstan-type SitePageScheduleParamsShape = array{
 *   id: string, publishDate: \DateTimeInterface
 * }
 */
final class SitePageScheduleParams implements BaseModel
{
    /** @use SdkModel<SitePageScheduleParamsShape> */
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
     * `new SitePageScheduleParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageScheduleParams::with(id: ..., publishDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageScheduleParams)->withID(...)->withPublishDate(...)
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

        $obj['id'] = $id;
        $obj['publishDate'] = $publishDate;

        return $obj;
    }

    /**
     * The ID of the object to be scheduled.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The date the object should transition from scheduled to published.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj['publishDate'] = $publishDate;

        return $obj;
    }
}
