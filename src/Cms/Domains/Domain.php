<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Domains;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type domain_alias = array{
 *   id: string,
 *   domain: string,
 *   isResolving: bool,
 *   isUsedForBlogPost: bool,
 *   isUsedForEmail: bool,
 *   isUsedForKnowledge: bool,
 *   isUsedForLandingPage: bool,
 *   isUsedForSitePage: bool,
 *   correctCname?: string,
 *   created?: \DateTimeInterface,
 *   isSslEnabled?: bool,
 *   isSslOnly?: bool,
 *   manuallyMarkedAsResolving?: bool,
 *   primaryBlogPost?: bool,
 *   primaryEmail?: bool,
 *   primaryKnowledge?: bool,
 *   primaryLandingPage?: bool,
 *   primarySitePage?: bool,
 *   secondaryToDomain?: string,
 *   updated?: \DateTimeInterface,
 * }
 */
final class Domain implements BaseModel, ResponseConverter
{
    /** @use SdkModel<domain_alias> */
    use SdkModel;

    use SdkResponse;

    /**
     * The unique ID of this domain.
     */
    #[Api]
    public string $id;

    /**
     * The actual domain or sub-domain. e.g. www.hubspot.com.
     */
    #[Api]
    public string $domain;

    /**
     * Whether the DNS for this domain is optimally configured for use with HubSpot.
     */
    #[Api]
    public bool $isResolving;

    /**
     * Whether the domain is used for CMS blog posts.
     */
    #[Api]
    public bool $isUsedForBlogPost;

    /**
     * Whether the domain is used for CMS email web pages.
     */
    #[Api]
    public bool $isUsedForEmail;

    /**
     * Whether the domain is used for CMS knowledge pages.
     */
    #[Api]
    public bool $isUsedForKnowledge;

    /**
     * Whether the domain is used for CMS landing pages.
     */
    #[Api]
    public bool $isUsedForLandingPage;

    /**
     * Whether the domain is used for CMS site pages.
     */
    #[Api]
    public bool $isUsedForSitePage;

    #[Api(optional: true)]
    public ?string $correctCname;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?bool $isSslEnabled;

    #[Api(optional: true)]
    public ?bool $isSslOnly;

    #[Api(optional: true)]
    public ?bool $manuallyMarkedAsResolving;

    #[Api(optional: true)]
    public ?bool $primaryBlogPost;

    #[Api(optional: true)]
    public ?bool $primaryEmail;

    #[Api(optional: true)]
    public ?bool $primaryKnowledge;

    #[Api(optional: true)]
    public ?bool $primaryLandingPage;

    #[Api(optional: true)]
    public ?bool $primarySitePage;

    #[Api(optional: true)]
    public ?string $secondaryToDomain;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->domain = $domain;
        $obj->isResolving = $isResolving;
        $obj->isUsedForBlogPost = $isUsedForBlogPost;
        $obj->isUsedForEmail = $isUsedForEmail;
        $obj->isUsedForKnowledge = $isUsedForKnowledge;
        $obj->isUsedForLandingPage = $isUsedForLandingPage;
        $obj->isUsedForSitePage = $isUsedForSitePage;

        null !== $correctCname && $obj->correctCname = $correctCname;
        null !== $created && $obj->created = $created;
        null !== $isSslEnabled && $obj->isSslEnabled = $isSslEnabled;
        null !== $isSslOnly && $obj->isSslOnly = $isSslOnly;
        null !== $manuallyMarkedAsResolving && $obj->manuallyMarkedAsResolving = $manuallyMarkedAsResolving;
        null !== $primaryBlogPost && $obj->primaryBlogPost = $primaryBlogPost;
        null !== $primaryEmail && $obj->primaryEmail = $primaryEmail;
        null !== $primaryKnowledge && $obj->primaryKnowledge = $primaryKnowledge;
        null !== $primaryLandingPage && $obj->primaryLandingPage = $primaryLandingPage;
        null !== $primarySitePage && $obj->primarySitePage = $primarySitePage;
        null !== $secondaryToDomain && $obj->secondaryToDomain = $secondaryToDomain;
        null !== $updated && $obj->updated = $updated;

        return $obj;
    }

    /**
     * The unique ID of this domain.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The actual domain or sub-domain. e.g. www.hubspot.com.
     */
    public function withDomain(string $domain): self
    {
        $obj = clone $this;
        $obj->domain = $domain;

        return $obj;
    }

    /**
     * Whether the DNS for this domain is optimally configured for use with HubSpot.
     */
    public function withIsResolving(bool $isResolving): self
    {
        $obj = clone $this;
        $obj->isResolving = $isResolving;

        return $obj;
    }

    /**
     * Whether the domain is used for CMS blog posts.
     */
    public function withIsUsedForBlogPost(bool $isUsedForBlogPost): self
    {
        $obj = clone $this;
        $obj->isUsedForBlogPost = $isUsedForBlogPost;

        return $obj;
    }

    /**
     * Whether the domain is used for CMS email web pages.
     */
    public function withIsUsedForEmail(bool $isUsedForEmail): self
    {
        $obj = clone $this;
        $obj->isUsedForEmail = $isUsedForEmail;

        return $obj;
    }

    /**
     * Whether the domain is used for CMS knowledge pages.
     */
    public function withIsUsedForKnowledge(bool $isUsedForKnowledge): self
    {
        $obj = clone $this;
        $obj->isUsedForKnowledge = $isUsedForKnowledge;

        return $obj;
    }

    /**
     * Whether the domain is used for CMS landing pages.
     */
    public function withIsUsedForLandingPage(bool $isUsedForLandingPage): self
    {
        $obj = clone $this;
        $obj->isUsedForLandingPage = $isUsedForLandingPage;

        return $obj;
    }

    /**
     * Whether the domain is used for CMS site pages.
     */
    public function withIsUsedForSitePage(bool $isUsedForSitePage): self
    {
        $obj = clone $this;
        $obj->isUsedForSitePage = $isUsedForSitePage;

        return $obj;
    }

    public function withCorrectCname(string $correctCname): self
    {
        $obj = clone $this;
        $obj->correctCname = $correctCname;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withIsSslEnabled(bool $isSslEnabled): self
    {
        $obj = clone $this;
        $obj->isSslEnabled = $isSslEnabled;

        return $obj;
    }

    public function withIsSslOnly(bool $isSslOnly): self
    {
        $obj = clone $this;
        $obj->isSslOnly = $isSslOnly;

        return $obj;
    }

    public function withManuallyMarkedAsResolving(
        bool $manuallyMarkedAsResolving
    ): self {
        $obj = clone $this;
        $obj->manuallyMarkedAsResolving = $manuallyMarkedAsResolving;

        return $obj;
    }

    public function withPrimaryBlogPost(bool $primaryBlogPost): self
    {
        $obj = clone $this;
        $obj->primaryBlogPost = $primaryBlogPost;

        return $obj;
    }

    public function withPrimaryEmail(bool $primaryEmail): self
    {
        $obj = clone $this;
        $obj->primaryEmail = $primaryEmail;

        return $obj;
    }

    public function withPrimaryKnowledge(bool $primaryKnowledge): self
    {
        $obj = clone $this;
        $obj->primaryKnowledge = $primaryKnowledge;

        return $obj;
    }

    public function withPrimaryLandingPage(bool $primaryLandingPage): self
    {
        $obj = clone $this;
        $obj->primaryLandingPage = $primaryLandingPage;

        return $obj;
    }

    public function withPrimarySitePage(bool $primarySitePage): self
    {
        $obj = clone $this;
        $obj->primarySitePage = $primarySitePage;

        return $obj;
    }

    public function withSecondaryToDomain(string $secondaryToDomain): self
    {
        $obj = clone $this;
        $obj->secondaryToDomain = $secondaryToDomain;

        return $obj;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $obj = clone $this;
        $obj->updated = $updated;

        return $obj;
    }
}
