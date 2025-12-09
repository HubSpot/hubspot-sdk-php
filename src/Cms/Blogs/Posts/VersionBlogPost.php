<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\BlogPost\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\Language;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\VersionUser;

/**
 * Model definition of a version of a blog post.
 *
 * @phpstan-type VersionBlogPostShape = array{
 *   id: string, object: BlogPost, updatedAt: \DateTimeInterface, user: VersionUser
 * }
 */
final class VersionBlogPost implements BaseModel
{
    /** @use SdkModel<VersionBlogPostShape> */
    use SdkModel;

    /**
     * The id of the version.
     */
    #[Required]
    public string $id;

    /**
     * Model definition for a Blog Post.
     */
    #[Required]
    public BlogPost $object;

    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    #[Required]
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
     *   abTestID: string,
     *   archivedAt: int,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   blogAuthorID: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: value-of<ContentTypeCategory>,
     *   created: \DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceID: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDBTableID: string,
     *   enableDomainStylesheets: bool,
     *   enableGoogleAmpOutputOverride: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderID: string,
     *   footerHTML: string,
     *   headHTML: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<Language>,
     *   layoutSections: array<string,mixed>,
     *   linkRelCanonicalURL: string,
     *   mabExperimentID: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectID: int,
     *   pageExpiryRedirectURL: string,
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
     *   tagIDs: list<int>,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromID: string,
     *   translations: array<string,PagesContentLanguageVariation>,
     *   updated: \DateTimeInterface,
     *   updatedByID: string,
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
        $self = new self;

        $self['id'] = $id;
        $self['object'] = $object;
        $self['updatedAt'] = $updatedAt;
        $self['user'] = $user;

        return $self;
    }

    /**
     * The id of the version.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Model definition for a Blog Post.
     *
     * @param BlogPost|array{
     *   id: string,
     *   abStatus: value-of<AbStatus>,
     *   abTestID: string,
     *   archivedAt: int,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   blogAuthorID: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: value-of<ContentTypeCategory>,
     *   created: \DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceID: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDBTableID: string,
     *   enableDomainStylesheets: bool,
     *   enableGoogleAmpOutputOverride: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderID: string,
     *   footerHTML: string,
     *   headHTML: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<Language>,
     *   layoutSections: array<string,mixed>,
     *   linkRelCanonicalURL: string,
     *   mabExperimentID: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectID: int,
     *   pageExpiryRedirectURL: string,
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
     *   tagIDs: list<int>,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromID: string,
     *   translations: array<string,PagesContentLanguageVariation>,
     *   updated: \DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * } $object
     */
    public function withObject(BlogPost|array $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     *
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
