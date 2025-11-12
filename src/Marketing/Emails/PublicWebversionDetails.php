<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
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
 *   redirectToPageId?: string|null,
 *   redirectToUrl?: string|null,
 *   slug?: string|null,
 *   title?: string|null,
 *   url?: string|null,
 * }
 */
final class PublicWebversionDetails implements BaseModel
{
    /** @use SdkModel<PublicWebversionDetailsShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $domain;

    #[Api(optional: true)]
    public ?bool $enabled;

    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAt;

    #[Api(optional: true)]
    public ?bool $isPageRedirected;

    #[Api(optional: true)]
    public ?string $metaDescription;

    #[Api(optional: true)]
    public ?bool $pageExpiryEnabled;

    #[Api(optional: true)]
    public ?string $redirectToPageId;

    #[Api(optional: true)]
    public ?string $redirectToUrl;

    #[Api(optional: true)]
    public ?string $slug;

    #[Api(optional: true)]
    public ?string $title;

    #[Api(optional: true)]
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
        ?string $redirectToPageId = null,
        ?string $redirectToUrl = null,
        ?string $slug = null,
        ?string $title = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $domain && $obj->domain = $domain;
        null !== $enabled && $obj->enabled = $enabled;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $isPageRedirected && $obj->isPageRedirected = $isPageRedirected;
        null !== $metaDescription && $obj->metaDescription = $metaDescription;
        null !== $pageExpiryEnabled && $obj->pageExpiryEnabled = $pageExpiryEnabled;
        null !== $redirectToPageId && $obj->redirectToPageId = $redirectToPageId;
        null !== $redirectToUrl && $obj->redirectToUrl = $redirectToUrl;
        null !== $slug && $obj->slug = $slug;
        null !== $title && $obj->title = $title;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    public function withDomain(string $domain): self
    {
        $obj = clone $this;
        $obj->domain = $domain;

        return $obj;
    }

    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj->enabled = $enabled;

        return $obj;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    public function withIsPageRedirected(bool $isPageRedirected): self
    {
        $obj = clone $this;
        $obj->isPageRedirected = $isPageRedirected;

        return $obj;
    }

    public function withMetaDescription(string $metaDescription): self
    {
        $obj = clone $this;
        $obj->metaDescription = $metaDescription;

        return $obj;
    }

    public function withPageExpiryEnabled(bool $pageExpiryEnabled): self
    {
        $obj = clone $this;
        $obj->pageExpiryEnabled = $pageExpiryEnabled;

        return $obj;
    }

    public function withRedirectToPageID(string $redirectToPageID): self
    {
        $obj = clone $this;
        $obj->redirectToPageId = $redirectToPageID;

        return $obj;
    }

    public function withRedirectToURL(string $redirectToURL): self
    {
        $obj = clone $this;
        $obj->redirectToUrl = $redirectToURL;

        return $obj;
    }

    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
