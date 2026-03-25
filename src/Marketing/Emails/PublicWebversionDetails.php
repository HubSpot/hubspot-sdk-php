<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicWebversionDetailsShape = array{
 *   domain?: string|null,
 *   enabled?: bool|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   isPageRedirected?: bool|null,
 *   metaDescription?: string|null,
 *   pageExpiryEnabled?: bool|null,
 *   redirectToPageID?: string|null,
 *   redirectToURL?: string|null,
 *   slug?: string|null,
 *   title?: string|null,
 *   url?: string|null,
 * }
 */
final class PublicWebversionDetails implements BaseModel
{
    /** @use SdkModel<PublicWebversionDetailsShape> */
    use SdkModel;

    #[Optional]
    public ?string $domain;

    #[Optional]
    public ?bool $enabled;

    #[Optional]
    public ?\DateTimeInterface $expiresAt;

    #[Optional]
    public ?bool $isPageRedirected;

    #[Optional]
    public ?string $metaDescription;

    #[Optional]
    public ?bool $pageExpiryEnabled;

    #[Optional('redirectToPageId')]
    public ?string $redirectToPageID;

    #[Optional('redirectToUrl')]
    public ?string $redirectToURL;

    #[Optional]
    public ?string $slug;

    #[Optional]
    public ?string $title;

    #[Optional]
    public ?string $url;

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
        ?string $domain = null,
        ?bool $enabled = null,
        ?\DateTimeInterface $expiresAt = null,
        ?bool $isPageRedirected = null,
        ?string $metaDescription = null,
        ?bool $pageExpiryEnabled = null,
        ?string $redirectToPageID = null,
        ?string $redirectToURL = null,
        ?string $slug = null,
        ?string $title = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $domain && $self['domain'] = $domain;
        null !== $enabled && $self['enabled'] = $enabled;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $isPageRedirected && $self['isPageRedirected'] = $isPageRedirected;
        null !== $metaDescription && $self['metaDescription'] = $metaDescription;
        null !== $pageExpiryEnabled && $self['pageExpiryEnabled'] = $pageExpiryEnabled;
        null !== $redirectToPageID && $self['redirectToPageID'] = $redirectToPageID;
        null !== $redirectToURL && $self['redirectToURL'] = $redirectToURL;
        null !== $slug && $self['slug'] = $slug;
        null !== $title && $self['title'] = $title;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withIsPageRedirected(bool $isPageRedirected): self
    {
        $self = clone $this;
        $self['isPageRedirected'] = $isPageRedirected;

        return $self;
    }

    public function withMetaDescription(string $metaDescription): self
    {
        $self = clone $this;
        $self['metaDescription'] = $metaDescription;

        return $self;
    }

    public function withPageExpiryEnabled(bool $pageExpiryEnabled): self
    {
        $self = clone $this;
        $self['pageExpiryEnabled'] = $pageExpiryEnabled;

        return $self;
    }

    public function withRedirectToPageID(string $redirectToPageID): self
    {
        $self = clone $this;
        $self['redirectToPageID'] = $redirectToPageID;

        return $self;
    }

    public function withRedirectToURL(string $redirectToURL): self
    {
        $self = clone $this;
        $self['redirectToURL'] = $redirectToURL;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
