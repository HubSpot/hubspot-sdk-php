<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\BlogPost\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\Language;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\VersionUser;

/**
 * Model definition of a version of a blog post.
 *
 * @phpstan-type VersionBlogPostShape = array{
 *   id: string, object: BlogPost, updatedAt: \DateTimeInterface, user: VersionUser
 * }
 */
final class VersionBlogPost implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VersionBlogPostShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The id of the version.
     */
    #[Api]
    public string $id;

    /**
     * Model definition for a Blog Post.
     */
    #[Api]
    public BlogPost $object;

    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    #[Api]
    public VersionUser $user;

    /**
     * `new VersionBlogPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionBlogPost::with(id: ..., object: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionBlogPost)
     *   ->withID(...)
     *   ->withObject(...)
     *   ->withUpdatedAt(...)
     *   ->withUser(...)
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
     *
     * @param BlogPost|array{
     *   id: string,
     *   abStatus: value-of<AbStatus>,
     *   abTestId: string,
     *   archivedAt: int,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   blogAuthorId: string,
     *   campaign: string,
     *   categoryId: int,
     *   contentGroupId: string,
     *   contentTypeCategory: value-of<ContentTypeCategory>,
     *   created: \DateTimeInterface,
     *   createdById: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceId: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDbTableId: string,
     *   enableDomainStylesheets: bool,
     *   enableGoogleAmpOutputOverride: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderId: string,
     *   footerHtml: string,
     *   headHtml: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<Language>,
     *   layoutSections: array<string,mixed>,
     *   linkRelCanonicalUrl: string,
     *   mabExperimentId: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectId: int,
     *   pageExpiryRedirectUrl: string,
     *   password: string,
     *   postBody: string,
     *   postSummary: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: \DateTimeInterface,
     *   publishImmediately: bool,
     *   rssBody: string,
     *   rssSummary: string,
     *   slug: string,
     *   state: string,
     *   tagIds: list<int>,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromId: string,
     *   translations: array<string,PagesContentLanguageVariation>,
     *   updated: \DateTimeInterface,
     *   updatedById: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * } $object
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
     */
    public static function with(
        string $id,
        BlogPost|array $object,
        \DateTimeInterface $updatedAt,
        VersionUser|array $user,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['object'] = $object;
        $obj['updatedAt'] = $updatedAt;
        $obj['user'] = $user;

        return $obj;
    }

    /**
     * The id of the version.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Model definition for a Blog Post.
     *
     * @param BlogPost|array{
     *   id: string,
     *   abStatus: value-of<AbStatus>,
     *   abTestId: string,
     *   archivedAt: int,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   blogAuthorId: string,
     *   campaign: string,
     *   categoryId: int,
     *   contentGroupId: string,
     *   contentTypeCategory: value-of<ContentTypeCategory>,
     *   created: \DateTimeInterface,
     *   createdById: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceId: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDbTableId: string,
     *   enableDomainStylesheets: bool,
     *   enableGoogleAmpOutputOverride: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderId: string,
     *   footerHtml: string,
     *   headHtml: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<Language>,
     *   layoutSections: array<string,mixed>,
     *   linkRelCanonicalUrl: string,
     *   mabExperimentId: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectId: int,
     *   pageExpiryRedirectUrl: string,
     *   password: string,
     *   postBody: string,
     *   postSummary: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: \DateTimeInterface,
     *   publishImmediately: bool,
     *   rssBody: string,
     *   rssSummary: string,
     *   slug: string,
     *   state: string,
     *   tagIds: list<int>,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromId: string,
     *   translations: array<string,PagesContentLanguageVariation>,
     *   updated: \DateTimeInterface,
     *   updatedById: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * } $object
     */
    public function withObject(BlogPost|array $object): self
    {
        $obj = clone $this;
        $obj['object'] = $object;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     *
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $obj = clone $this;
        $obj['user'] = $user;

        return $obj;
    }
}
