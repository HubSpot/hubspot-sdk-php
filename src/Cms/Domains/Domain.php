<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Domains;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type DomainShape = array{
 *   id: string,
 *   domain: string,
 *   isResolving: bool,
 *   isUsedForBlogPost: bool,
 *   isUsedForEmail: bool,
 *   isUsedForKnowledge: bool,
 *   isUsedForLandingPage: bool,
 *   isUsedForSitePage: bool,
 *   correctCname?: string|null,
 *   created?: \DateTimeInterface|null,
 *   isSslEnabled?: bool|null,
 *   isSslOnly?: bool|null,
 *   manuallyMarkedAsResolving?: bool|null,
 *   primaryBlogPost?: bool|null,
 *   primaryEmail?: bool|null,
 *   primaryKnowledge?: bool|null,
 *   primaryLandingPage?: bool|null,
 *   primarySitePage?: bool|null,
 *   secondaryToDomain?: string|null,
 *   updated?: \DateTimeInterface|null,
 * }
 */
final class Domain implements BaseModel
{
    /** @use SdkModel<DomainShape> */
    use SdkModel;

    /**
     * The unique ID of this domain.
     */
    #[Required]
    public string $id;

    /**
     * The actual domain or sub-domain. e.g. www.hubspot.com.
     */
    #[Required]
    public string $domain;

    /**
     * Whether the DNS for this domain is optimally configured for use with HubSpot.
     */
    #[Required]
    public bool $isResolving;

    /**
     * Whether the domain is used for CMS blog posts.
     */
    #[Required]
    public bool $isUsedForBlogPost;

    /**
     * Whether the domain is used for CMS email web pages.
     */
    #[Required]
    public bool $isUsedForEmail;

    /**
     * Whether the domain is used for CMS knowledge pages.
     */
    #[Required]
    public bool $isUsedForKnowledge;

    /**
     * Whether the domain is used for CMS landing pages.
     */
    #[Required]
    public bool $isUsedForLandingPage;

    /**
     * Whether the domain is used for CMS site pages.
     */
    #[Required]
    public bool $isUsedForSitePage;

    #[Optional]
    public ?string $correctCname;

    #[Optional]
    public ?\DateTimeInterface $created;

    #[Optional]
    public ?bool $isSslEnabled;

    #[Optional]
    public ?bool $isSslOnly;

    #[Optional]
    public ?bool $manuallyMarkedAsResolving;

    #[Optional]
    public ?bool $primaryBlogPost;

    #[Optional]
    public ?bool $primaryEmail;

    #[Optional]
    public ?bool $primaryKnowledge;

    #[Optional]
    public ?bool $primaryLandingPage;

    #[Optional]
    public ?bool $primarySitePage;

    #[Optional]
    public ?string $secondaryToDomain;

    #[Optional]
    public ?\DateTimeInterface $updated;

    /**
     * `new Domain()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Domain::with(
     *   id: ...,
     *   domain: ...,
     *   isResolving: ...,
     *   isUsedForBlogPost: ...,
     *   isUsedForEmail: ...,
     *   isUsedForKnowledge: ...,
     *   isUsedForLandingPage: ...,
     *   isUsedForSitePage: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Domain)
     *   ->withID(...)
     *   ->withDomain(...)
     *   ->withIsResolving(...)
     *   ->withIsUsedForBlogPost(...)
     *   ->withIsUsedForEmail(...)
     *   ->withIsUsedForKnowledge(...)
     *   ->withIsUsedForLandingPage(...)
     *   ->withIsUsedForSitePage(...)
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
        string $domain,
        bool $isResolving,
        bool $isUsedForBlogPost,
        bool $isUsedForEmail,
        bool $isUsedForKnowledge,
        bool $isUsedForLandingPage,
        bool $isUsedForSitePage,
        ?string $correctCname = null,
        ?\DateTimeInterface $created = null,
        ?bool $isSslEnabled = null,
        ?bool $isSslOnly = null,
        ?bool $manuallyMarkedAsResolving = null,
        ?bool $primaryBlogPost = null,
        ?bool $primaryEmail = null,
        ?bool $primaryKnowledge = null,
        ?bool $primaryLandingPage = null,
        ?bool $primarySitePage = null,
        ?string $secondaryToDomain = null,
        ?\DateTimeInterface $updated = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['domain'] = $domain;
        $self['isResolving'] = $isResolving;
        $self['isUsedForBlogPost'] = $isUsedForBlogPost;
        $self['isUsedForEmail'] = $isUsedForEmail;
        $self['isUsedForKnowledge'] = $isUsedForKnowledge;
        $self['isUsedForLandingPage'] = $isUsedForLandingPage;
        $self['isUsedForSitePage'] = $isUsedForSitePage;

        null !== $correctCname && $self['correctCname'] = $correctCname;
        null !== $created && $self['created'] = $created;
        null !== $isSslEnabled && $self['isSslEnabled'] = $isSslEnabled;
        null !== $isSslOnly && $self['isSslOnly'] = $isSslOnly;
        null !== $manuallyMarkedAsResolving && $self['manuallyMarkedAsResolving'] = $manuallyMarkedAsResolving;
        null !== $primaryBlogPost && $self['primaryBlogPost'] = $primaryBlogPost;
        null !== $primaryEmail && $self['primaryEmail'] = $primaryEmail;
        null !== $primaryKnowledge && $self['primaryKnowledge'] = $primaryKnowledge;
        null !== $primaryLandingPage && $self['primaryLandingPage'] = $primaryLandingPage;
        null !== $primarySitePage && $self['primarySitePage'] = $primarySitePage;
        null !== $secondaryToDomain && $self['secondaryToDomain'] = $secondaryToDomain;
        null !== $updated && $self['updated'] = $updated;

        return $self;
    }

    /**
     * The unique ID of this domain.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The actual domain or sub-domain. e.g. www.hubspot.com.
     */
    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    /**
     * Whether the DNS for this domain is optimally configured for use with HubSpot.
     */
    public function withIsResolving(bool $isResolving): self
    {
        $self = clone $this;
        $self['isResolving'] = $isResolving;

        return $self;
    }

    /**
     * Whether the domain is used for CMS blog posts.
     */
    public function withIsUsedForBlogPost(bool $isUsedForBlogPost): self
    {
        $self = clone $this;
        $self['isUsedForBlogPost'] = $isUsedForBlogPost;

        return $self;
    }

    /**
     * Whether the domain is used for CMS email web pages.
     */
    public function withIsUsedForEmail(bool $isUsedForEmail): self
    {
        $self = clone $this;
        $self['isUsedForEmail'] = $isUsedForEmail;

        return $self;
    }

    /**
     * Whether the domain is used for CMS knowledge pages.
     */
    public function withIsUsedForKnowledge(bool $isUsedForKnowledge): self
    {
        $self = clone $this;
        $self['isUsedForKnowledge'] = $isUsedForKnowledge;

        return $self;
    }

    /**
     * Whether the domain is used for CMS landing pages.
     */
    public function withIsUsedForLandingPage(bool $isUsedForLandingPage): self
    {
        $self = clone $this;
        $self['isUsedForLandingPage'] = $isUsedForLandingPage;

        return $self;
    }

    /**
     * Whether the domain is used for CMS site pages.
     */
    public function withIsUsedForSitePage(bool $isUsedForSitePage): self
    {
        $self = clone $this;
        $self['isUsedForSitePage'] = $isUsedForSitePage;

        return $self;
    }

    public function withCorrectCname(string $correctCname): self
    {
        $self = clone $this;
        $self['correctCname'] = $correctCname;

        return $self;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    public function withIsSslEnabled(bool $isSslEnabled): self
    {
        $self = clone $this;
        $self['isSslEnabled'] = $isSslEnabled;

        return $self;
    }

    public function withIsSslOnly(bool $isSslOnly): self
    {
        $self = clone $this;
        $self['isSslOnly'] = $isSslOnly;

        return $self;
    }

    public function withManuallyMarkedAsResolving(
        bool $manuallyMarkedAsResolving
    ): self {
        $self = clone $this;
        $self['manuallyMarkedAsResolving'] = $manuallyMarkedAsResolving;

        return $self;
    }

    public function withPrimaryBlogPost(bool $primaryBlogPost): self
    {
        $self = clone $this;
        $self['primaryBlogPost'] = $primaryBlogPost;

        return $self;
    }

    public function withPrimaryEmail(bool $primaryEmail): self
    {
        $self = clone $this;
        $self['primaryEmail'] = $primaryEmail;

        return $self;
    }

    public function withPrimaryKnowledge(bool $primaryKnowledge): self
    {
        $self = clone $this;
        $self['primaryKnowledge'] = $primaryKnowledge;

        return $self;
    }

    public function withPrimaryLandingPage(bool $primaryLandingPage): self
    {
        $self = clone $this;
        $self['primaryLandingPage'] = $primaryLandingPage;

        return $self;
    }

    public function withPrimarySitePage(bool $primarySitePage): self
    {
        $self = clone $this;
        $self['primarySitePage'] = $primarySitePage;

        return $self;
    }

    public function withSecondaryToDomain(string $secondaryToDomain): self
    {
        $self = clone $this;
        $self['secondaryToDomain'] = $secondaryToDomain;

        return $self;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }
}
