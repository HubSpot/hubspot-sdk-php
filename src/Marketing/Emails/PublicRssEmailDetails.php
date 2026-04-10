<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Marketing\Emails\PublicRssEmailDetails\BlogLayout;

/**
 * @phpstan-type PublicRssEmailDetailsShape = array{
 *   blogEmailType?: string|null,
 *   blogImageMaxWidth?: int|null,
 *   blogLayout?: null|BlogLayout|value-of<BlogLayout>,
 *   hubSpotBlogID?: string|null,
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

    #[Optional]
    public ?string $blogEmailType;

    #[Optional]
    public ?int $blogImageMaxWidth;

    /** @var value-of<BlogLayout>|null $blogLayout */
    #[Optional(enum: BlogLayout::class)]
    public ?string $blogLayout;

    #[Optional('hubspotBlogId')]
    public ?string $hubSpotBlogID;

    #[Optional]
    public ?int $maxEntries;

    #[Optional]
    public ?string $rssEntryTemplate;

    /** @var array<string,mixed>|null $timing */
    #[Optional(map: 'mixed')]
    public ?array $timing;

    #[Optional]
    public ?string $url;

    #[Optional]
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
     * @param BlogLayout|value-of<BlogLayout>|null $blogLayout
     * @param array<string,mixed>|null $timing
     */
    public static function with(
        ?string $blogEmailType = null,
        ?int $blogImageMaxWidth = null,
        BlogLayout|string|null $blogLayout = null,
        ?string $hubSpotBlogID = null,
        ?int $maxEntries = null,
        ?string $rssEntryTemplate = null,
        ?array $timing = null,
        ?string $url = null,
        ?bool $useHeadlineAsSubject = null,
    ): self {
        $self = new self;

        null !== $blogEmailType && $self['blogEmailType'] = $blogEmailType;
        null !== $blogImageMaxWidth && $self['blogImageMaxWidth'] = $blogImageMaxWidth;
        null !== $blogLayout && $self['blogLayout'] = $blogLayout;
        null !== $hubSpotBlogID && $self['hubSpotBlogID'] = $hubSpotBlogID;
        null !== $maxEntries && $self['maxEntries'] = $maxEntries;
        null !== $rssEntryTemplate && $self['rssEntryTemplate'] = $rssEntryTemplate;
        null !== $timing && $self['timing'] = $timing;
        null !== $url && $self['url'] = $url;
        null !== $useHeadlineAsSubject && $self['useHeadlineAsSubject'] = $useHeadlineAsSubject;

        return $self;
    }

    public function withBlogEmailType(string $blogEmailType): self
    {
        $self = clone $this;
        $self['blogEmailType'] = $blogEmailType;

        return $self;
    }

    public function withBlogImageMaxWidth(int $blogImageMaxWidth): self
    {
        $self = clone $this;
        $self['blogImageMaxWidth'] = $blogImageMaxWidth;

        return $self;
    }

    /**
     * @param BlogLayout|value-of<BlogLayout> $blogLayout
     */
    public function withBlogLayout(BlogLayout|string $blogLayout): self
    {
        $self = clone $this;
        $self['blogLayout'] = $blogLayout;

        return $self;
    }

    public function withHubSpotBlogID(string $hubSpotBlogID): self
    {
        $self = clone $this;
        $self['hubSpotBlogID'] = $hubSpotBlogID;

        return $self;
    }

    public function withMaxEntries(int $maxEntries): self
    {
        $self = clone $this;
        $self['maxEntries'] = $maxEntries;

        return $self;
    }

    public function withRssEntryTemplate(string $rssEntryTemplate): self
    {
        $self = clone $this;
        $self['rssEntryTemplate'] = $rssEntryTemplate;

        return $self;
    }

    /**
     * @param array<string,mixed> $timing
     */
    public function withTiming(array $timing): self
    {
        $self = clone $this;
        $self['timing'] = $timing;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    public function withUseHeadlineAsSubject(bool $useHeadlineAsSubject): self
    {
        $self = clone $this;
        $self['useHeadlineAsSubject'] = $useHeadlineAsSubject;

        return $self;
    }
}
