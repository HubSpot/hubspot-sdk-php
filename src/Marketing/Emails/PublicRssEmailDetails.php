<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_rss_email_details = array{
 *   blogEmailType?: string,
 *   blogImageMaxWidth?: int,
 *   blogLayout?: string,
 *   hubspotBlogID?: string,
 *   maxEntries?: int,
 *   rssEntryTemplate?: string,
 *   timing?: array<string, mixed>,
 *   url?: string,
 *   useHeadlineAsSubject?: bool,
 * }
 */
final class PublicRssEmailDetails implements BaseModel
{
    /** @use SdkModel<public_rss_email_details> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $blogEmailType;

    #[Api(optional: true)]
    public ?int $blogImageMaxWidth;

    #[Api(optional: true)]
    public ?string $blogLayout;

    #[Api('hubspotBlogId', optional: true)]
    public ?string $hubspotBlogID;

    #[Api(optional: true)]
    public ?int $maxEntries;

    #[Api(optional: true)]
    public ?string $rssEntryTemplate;

    /** @var array<string, mixed>|null $timing */
    #[Api(map: 'mixed', optional: true)]
    public ?array $timing;

    #[Api(optional: true)]
    public ?string $url;

    #[Api(optional: true)]
    public ?bool $useHeadlineAsSubject;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string, mixed> $timing
     */
    public static function with(
        ?string $blogEmailType = null,
        ?int $blogImageMaxWidth = null,
        ?string $blogLayout = null,
        ?string $hubspotBlogID = null,
        ?int $maxEntries = null,
        ?string $rssEntryTemplate = null,
        ?array $timing = null,
        ?string $url = null,
        ?bool $useHeadlineAsSubject = null,
    ): self {
        $obj = new self;

        null !== $blogEmailType && $obj->blogEmailType = $blogEmailType;
        null !== $blogImageMaxWidth && $obj->blogImageMaxWidth = $blogImageMaxWidth;
        null !== $blogLayout && $obj->blogLayout = $blogLayout;
        null !== $hubspotBlogID && $obj->hubspotBlogID = $hubspotBlogID;
        null !== $maxEntries && $obj->maxEntries = $maxEntries;
        null !== $rssEntryTemplate && $obj->rssEntryTemplate = $rssEntryTemplate;
        null !== $timing && $obj->timing = $timing;
        null !== $url && $obj->url = $url;
        null !== $useHeadlineAsSubject && $obj->useHeadlineAsSubject = $useHeadlineAsSubject;

        return $obj;
    }

    public function withBlogEmailType(string $blogEmailType): self
    {
        $obj = clone $this;
        $obj->blogEmailType = $blogEmailType;

        return $obj;
    }

    public function withBlogImageMaxWidth(int $blogImageMaxWidth): self
    {
        $obj = clone $this;
        $obj->blogImageMaxWidth = $blogImageMaxWidth;

        return $obj;
    }

    public function withBlogLayout(string $blogLayout): self
    {
        $obj = clone $this;
        $obj->blogLayout = $blogLayout;

        return $obj;
    }

    public function withHubspotBlogID(string $hubspotBlogID): self
    {
        $obj = clone $this;
        $obj->hubspotBlogID = $hubspotBlogID;

        return $obj;
    }

    public function withMaxEntries(int $maxEntries): self
    {
        $obj = clone $this;
        $obj->maxEntries = $maxEntries;

        return $obj;
    }

    public function withRssEntryTemplate(string $rssEntryTemplate): self
    {
        $obj = clone $this;
        $obj->rssEntryTemplate = $rssEntryTemplate;

        return $obj;
    }

    /**
     * @param array<string, mixed> $timing
     */
    public function withTiming(array $timing): self
    {
        $obj = clone $this;
        $obj->timing = $timing;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    public function withUseHeadlineAsSubject(bool $useHeadlineAsSubject): self
    {
        $obj = clone $this;
        $obj->useHeadlineAsSubject = $useHeadlineAsSubject;

        return $obj;
    }
}
