<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Domains;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type DomainShape = array{
 *   id: string,
 *   correctCname: string,
 *   created: \DateTimeInterface,
 *   domain: string,
 *   isResolving: bool,
 *   isSslEnabled: bool,
 *   isSslOnly: bool,
 *   isUsedForBlogPost: bool,
 *   isUsedForEmail: bool,
 *   isUsedForKnowledge: bool,
 *   isUsedForLandingPage: bool,
 *   isUsedForSitePage: bool,
 *   manuallyMarkedAsResolving: bool,
 *   primaryBlogPost: bool,
 *   primaryEmail: bool,
 *   primaryKnowledge: bool,
 *   primaryLandingPage: bool,
 *   primarySitePage: bool,
 *   secondaryToDomain: string,
 *   updated: \DateTimeInterface,
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
     * The expected CNAME record for the domain.
     */
    #[Required]
    public string $correctCname;

    /**
     * The date and time when the domain was created.
     */
    #[Required]
    public \DateTimeInterface $created;

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
     * Indicates whether SSL is enabled for the domain.
     */
    #[Required]
    public bool $isSslEnabled;

    /**
     * Indicates whether the domain is accessible only via SSL.
     */
    #[Required]
    public bool $isSslOnly;

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

    /**
     * Indicates whether the domain has been manually marked as resolving.
     */
    #[Required]
    public bool $manuallyMarkedAsResolving;

    /**
     * Indicates whether the domain is the primary domain for blog posts.
     */
    #[Required]
    public bool $primaryBlogPost;

    /**
     * Indicates whether the domain is the primary domain for email pages.
     */
    #[Required]
    public bool $primaryEmail;

    /**
     * Indicates whether the domain is the primary domain for knowledge pages.
     */
    #[Required]
    public bool $primaryKnowledge;

    /**
     * Indicates whether the domain is the primary domain for landing pages.
     */
    #[Required]
    public bool $primaryLandingPage;

    /**
     * Indicates whether the domain is the primary domain for site pages.
     */
    #[Required]
    public bool $primarySitePage;

    /**
     * Specifies the domain to which this domain is secondary.
     */
    #[Required]
    public string $secondaryToDomain;

    /**
     * The date and time when the domain was last updated.
     */
    #[Required]
    public \DateTimeInterface $updated;

    /**
     * `new Domain()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Domain::with(
     *   id: ...,
     *   correctCname: ...,
     *   created: ...,
     *   domain: ...,
     *   isResolving: ...,
     *   isSslEnabled: ...,
     *   isSslOnly: ...,
     *   isUsedForBlogPost: ...,
     *   isUsedForEmail: ...,
     *   isUsedForKnowledge: ...,
     *   isUsedForLandingPage: ...,
     *   isUsedForSitePage: ...,
     *   manuallyMarkedAsResolving: ...,
     *   primaryBlogPost: ...,
     *   primaryEmail: ...,
     *   primaryKnowledge: ...,
     *   primaryLandingPage: ...,
     *   primarySitePage: ...,
     *   secondaryToDomain: ...,
     *   updated: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Domain)
     *   ->withID(...)
     *   ->withCorrectCname(...)
     *   ->withCreated(...)
     *   ->withDomain(...)
     *   ->withIsResolving(...)
     *   ->withIsSslEnabled(...)
     *   ->withIsSslOnly(...)
     *   ->withIsUsedForBlogPost(...)
     *   ->withIsUsedForEmail(...)
     *   ->withIsUsedForKnowledge(...)
     *   ->withIsUsedForLandingPage(...)
     *   ->withIsUsedForSitePage(...)
     *   ->withManuallyMarkedAsResolving(...)
     *   ->withPrimaryBlogPost(...)
     *   ->withPrimaryEmail(...)
     *   ->withPrimaryKnowledge(...)
     *   ->withPrimaryLandingPage(...)
     *   ->withPrimarySitePage(...)
     *   ->withSecondaryToDomain(...)
     *   ->withUpdated(...)
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
        string $correctCname,
        \DateTimeInterface $created,
        string $domain,
        bool $isResolving,
        bool $isSslEnabled,
        bool $isSslOnly,
        bool $isUsedForBlogPost,
        bool $isUsedForEmail,
        bool $isUsedForKnowledge,
        bool $isUsedForLandingPage,
        bool $isUsedForSitePage,
        bool $manuallyMarkedAsResolving,
        bool $primaryBlogPost,
        bool $primaryEmail,
        bool $primaryKnowledge,
        bool $primaryLandingPage,
        bool $primarySitePage,
        string $secondaryToDomain,
        \DateTimeInterface $updated,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['correctCname'] = $correctCname;
        $self['created'] = $created;
        $self['domain'] = $domain;
        $self['isResolving'] = $isResolving;
        $self['isSslEnabled'] = $isSslEnabled;
        $self['isSslOnly'] = $isSslOnly;
        $self['isUsedForBlogPost'] = $isUsedForBlogPost;
        $self['isUsedForEmail'] = $isUsedForEmail;
        $self['isUsedForKnowledge'] = $isUsedForKnowledge;
        $self['isUsedForLandingPage'] = $isUsedForLandingPage;
        $self['isUsedForSitePage'] = $isUsedForSitePage;
        $self['manuallyMarkedAsResolving'] = $manuallyMarkedAsResolving;
        $self['primaryBlogPost'] = $primaryBlogPost;
        $self['primaryEmail'] = $primaryEmail;
        $self['primaryKnowledge'] = $primaryKnowledge;
        $self['primaryLandingPage'] = $primaryLandingPage;
        $self['primarySitePage'] = $primarySitePage;
        $self['secondaryToDomain'] = $secondaryToDomain;
        $self['updated'] = $updated;

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
     * The expected CNAME record for the domain.
     */
    public function withCorrectCname(string $correctCname): self
    {
        $self = clone $this;
        $self['correctCname'] = $correctCname;

        return $self;
    }

    /**
     * The date and time when the domain was created.
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

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
     * Indicates whether SSL is enabled for the domain.
     */
    public function withIsSslEnabled(bool $isSslEnabled): self
    {
        $self = clone $this;
        $self['isSslEnabled'] = $isSslEnabled;

        return $self;
    }

    /**
     * Indicates whether the domain is accessible only via SSL.
     */
    public function withIsSslOnly(bool $isSslOnly): self
    {
        $self = clone $this;
        $self['isSslOnly'] = $isSslOnly;

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

    /**
     * Indicates whether the domain has been manually marked as resolving.
     */
    public function withManuallyMarkedAsResolving(
        bool $manuallyMarkedAsResolving
    ): self {
        $self = clone $this;
        $self['manuallyMarkedAsResolving'] = $manuallyMarkedAsResolving;

        return $self;
    }

    /**
     * Indicates whether the domain is the primary domain for blog posts.
     */
    public function withPrimaryBlogPost(bool $primaryBlogPost): self
    {
        $self = clone $this;
        $self['primaryBlogPost'] = $primaryBlogPost;

        return $self;
    }

    /**
     * Indicates whether the domain is the primary domain for email pages.
     */
    public function withPrimaryEmail(bool $primaryEmail): self
    {
        $self = clone $this;
        $self['primaryEmail'] = $primaryEmail;

        return $self;
    }

    /**
     * Indicates whether the domain is the primary domain for knowledge pages.
     */
    public function withPrimaryKnowledge(bool $primaryKnowledge): self
    {
        $self = clone $this;
        $self['primaryKnowledge'] = $primaryKnowledge;

        return $self;
    }

    /**
     * Indicates whether the domain is the primary domain for landing pages.
     */
    public function withPrimaryLandingPage(bool $primaryLandingPage): self
    {
        $self = clone $this;
        $self['primaryLandingPage'] = $primaryLandingPage;

        return $self;
    }

    /**
     * Indicates whether the domain is the primary domain for site pages.
     */
    public function withPrimarySitePage(bool $primarySitePage): self
    {
        $self = clone $this;
        $self['primarySitePage'] = $primarySitePage;

        return $self;
    }

    /**
     * Specifies the domain to which this domain is secondary.
     */
    public function withSecondaryToDomain(string $secondaryToDomain): self
    {
        $self = clone $this;
        $self['secondaryToDomain'] = $secondaryToDomain;

        return $self;
    }

    /**
     * The date and time when the domain was last updated.
     */
    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }
}
