<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * RSS related data if it is a blog or rss email.
 *
 * @phpstan-type PublicRssEmailDetailsShape = array{
 *   blogEmailType?: string|null,
 *   blogImageMaxWidth?: int|null,
 *   blogLayout?: string|null,
 *   hubspotBlogId?: string|null,
 *   maxEntries?: int|null,
 *   rssEntryTemplate?: string|null,
 *   timing?: array<string,mixed>|null,
 *   url?: string|null,
 *   useHeadlineAsSubject?: bool|null,
 * }
 */
final class PublicRssEmailDetails implements BaseModel
{
    /** @use SdkModel<PublicRssEmailDetailsShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $blogEmailType;

    #[Api(optional: true)]
    public ?int $blogImageMaxWidth;

    #[Api(optional: true)]
    public ?string $blogLayout;

    #[Api(optional: true)]
    public ?string $hubspotBlogId;

    #[Api(optional: true)]
    public ?int $maxEntries;

    #[Api(optional: true)]
    public ?string $rssEntryTemplate;

    /** @var array<string,mixed>|null $timing */
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
     * @param array<string,mixed> $timing
     */
    public static function with(
        ?string $blogEmailType = null,
        ?int $blogImageMaxWidth = null,
        ?string $blogLayout = null,
        ?string $hubspotBlogId = null,
        ?int $maxEntries = null,
        ?string $rssEntryTemplate = null,
        ?array $timing = null,
        ?string $url = null,
        ?bool $useHeadlineAsSubject = null,
    ): self {
        $obj = new self;

        null !== $blogEmailType && $obj['blogEmailType'] = $blogEmailType;
        null !== $blogImageMaxWidth && $obj['blogImageMaxWidth'] = $blogImageMaxWidth;
        null !== $blogLayout && $obj['blogLayout'] = $blogLayout;
        null !== $hubspotBlogId && $obj['hubspotBlogId'] = $hubspotBlogId;
        null !== $maxEntries && $obj['maxEntries'] = $maxEntries;
        null !== $rssEntryTemplate && $obj['rssEntryTemplate'] = $rssEntryTemplate;
        null !== $timing && $obj['timing'] = $timing;
        null !== $url && $obj['url'] = $url;
        null !== $useHeadlineAsSubject && $obj['useHeadlineAsSubject'] = $useHeadlineAsSubject;

        return $obj;
    }

    public function withBlogEmailType(string $blogEmailType): self
    {
        $obj = clone $this;
        $obj['blogEmailType'] = $blogEmailType;

        return $obj;
    }

    public function withBlogImageMaxWidth(int $blogImageMaxWidth): self
    {
        $obj = clone $this;
        $obj['blogImageMaxWidth'] = $blogImageMaxWidth;

        return $obj;
    }

    public function withBlogLayout(string $blogLayout): self
    {
        $obj = clone $this;
        $obj['blogLayout'] = $blogLayout;

        return $obj;
    }

    public function withHubspotBlogID(string $hubspotBlogID): self
    {
        $obj = clone $this;
        $obj['hubspotBlogId'] = $hubspotBlogID;

        return $obj;
    }

    public function withMaxEntries(int $maxEntries): self
    {
        $obj = clone $this;
        $obj['maxEntries'] = $maxEntries;

        return $obj;
    }

    public function withRssEntryTemplate(string $rssEntryTemplate): self
    {
        $obj = clone $this;
        $obj['rssEntryTemplate'] = $rssEntryTemplate;

        return $obj;
    }

    /**
     * @param array<string,mixed> $timing
     */
    public function withTiming(array $timing): self
    {
        $obj = clone $this;
        $obj['timing'] = $timing;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    public function withUseHeadlineAsSubject(bool $useHeadlineAsSubject): self
    {
        $obj = clone $this;
        $obj['useHeadlineAsSubject'] = $useHeadlineAsSubject;

        return $obj;
    }
}
