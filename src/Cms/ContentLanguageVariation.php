<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContentLanguageVariationShape = array{
 *   id: int,
 *   archivedInDashboard: bool,
 *   authorName: string,
 *   campaign: string,
 *   campaignName: string,
 *   created: \DateTimeInterface,
 *   name: string,
 *   password: string,
 *   publicAccessRules: list<mixed>,
 *   publicAccessRulesEnabled: bool,
 *   publishDate: \DateTimeInterface,
 *   slug: string,
 *   state: string,
 *   updated: \DateTimeInterface,
 *   tagIDs?: list<int>|null,
 * }
 */
final class ContentLanguageVariation implements BaseModel
{
    /** @use SdkModel<ContentLanguageVariationShape> */
    use SdkModel;

    /**
     * ID of object to set as primary in multi-language group.
     */
    #[Required]
    public int $id;

    /**
     * If True, the variant will not show up in your dashboard, although the post could still be live.
     */
    #[Required]
    public bool $archivedInDashboard;

    /**
     * The name of the user who last published the blog post. For posts that haven't been published yet, this property will reflect the user who initially created the draft.
     */
    #[Required]
    public string $authorName;

    /**
     * The GUID of the marketing campaign this page is a part of.
     */
    #[Required]
    public string $campaign;

    /**
     * Name of the associated marketing campaign.
     */
    #[Required]
    public string $campaignName;

    /**
     * The timestamp (ISO8601 format) when this Blog Post was created.
     */
    #[Required]
    public \DateTimeInterface $created;

    /**
     * The internal name of the content language variation.
     */
    #[Required]
    public string $name;

    /**
     * Set this to create a password protected page. Entering the password will be required to view the page.
     */
    #[Required]
    public string $password;

    /** @var list<mixed> $publicAccessRules */
    #[Required(list: 'mixed')]
    public array $publicAccessRules;

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    #[Required]
    public bool $publicAccessRulesEnabled;

    /**
     * The date (ISO8601 format) the page is to be published at.
     */
    #[Required]
    public \DateTimeInterface $publishDate;

    /**
     * The path of the this page. This field is appended to the domain to construct the url of this page.
     */
    #[Required]
    public string $slug;

    /**
     * An ENUM describing the current state of this page.
     *
     * Maximum string length: 25
     */
    #[Required]
    public string $state;

    /**
     * The timestamp (ISO8601 format) when this Blog Post was updated.
     */
    #[Required]
    public \DateTimeInterface $updated;

    /** @var list<int>|null $tagIDs */
    #[Optional('tagIds', list: 'int')]
    public ?array $tagIDs;

    /**
     * `new ContentLanguageVariation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentLanguageVariation::with(
     *   id: ...,
     *   archivedInDashboard: ...,
     *   authorName: ...,
     *   campaign: ...,
     *   campaignName: ...,
     *   created: ...,
     *   name: ...,
     *   password: ...,
     *   publicAccessRules: ...,
     *   publicAccessRulesEnabled: ...,
     *   publishDate: ...,
     *   slug: ...,
     *   state: ...,
     *   updated: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentLanguageVariation)
     *   ->withID(...)
     *   ->withArchivedInDashboard(...)
     *   ->withAuthorName(...)
     *   ->withCampaign(...)
     *   ->withCampaignName(...)
     *   ->withCreated(...)
     *   ->withName(...)
     *   ->withPassword(...)
     *   ->withPublicAccessRules(...)
     *   ->withPublicAccessRulesEnabled(...)
     *   ->withPublishDate(...)
     *   ->withSlug(...)
     *   ->withState(...)
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
     *
     * @param list<mixed> $publicAccessRules
     * @param list<int>|null $tagIDs
     */
    public static function with(
        int $id,
        bool $archivedInDashboard,
        string $authorName,
        string $campaign,
        string $campaignName,
        \DateTimeInterface $created,
        string $name,
        string $password,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        \DateTimeInterface $publishDate,
        string $slug,
        string $state,
        \DateTimeInterface $updated,
        ?array $tagIDs = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archivedInDashboard'] = $archivedInDashboard;
        $self['authorName'] = $authorName;
        $self['campaign'] = $campaign;
        $self['campaignName'] = $campaignName;
        $self['created'] = $created;
        $self['name'] = $name;
        $self['password'] = $password;
        $self['publicAccessRules'] = $publicAccessRules;
        $self['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;
        $self['publishDate'] = $publishDate;
        $self['slug'] = $slug;
        $self['state'] = $state;
        $self['updated'] = $updated;

        null !== $tagIDs && $self['tagIDs'] = $tagIDs;

        return $self;
    }

    /**
     * ID of object to set as primary in multi-language group.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * If True, the variant will not show up in your dashboard, although the post could still be live.
     */
    public function withArchivedInDashboard(bool $archivedInDashboard): self
    {
        $self = clone $this;
        $self['archivedInDashboard'] = $archivedInDashboard;

        return $self;
    }

    /**
     * The name of the user who last published the blog post. For posts that haven't been published yet, this property will reflect the user who initially created the draft.
     */
    public function withAuthorName(string $authorName): self
    {
        $self = clone $this;
        $self['authorName'] = $authorName;

        return $self;
    }

    /**
     * The GUID of the marketing campaign this page is a part of.
     */
    public function withCampaign(string $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * Name of the associated marketing campaign.
     */
    public function withCampaignName(string $campaignName): self
    {
        $self = clone $this;
        $self['campaignName'] = $campaignName;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Post was created.
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * The internal name of the content language variation.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Set this to create a password protected page. Entering the password will be required to view the page.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * @param list<mixed> $publicAccessRules
     */
    public function withPublicAccessRules(array $publicAccessRules): self
    {
        $self = clone $this;
        $self['publicAccessRules'] = $publicAccessRules;

        return $self;
    }

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    public function withPublicAccessRulesEnabled(
        bool $publicAccessRulesEnabled
    ): self {
        $self = clone $this;
        $self['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;

        return $self;
    }

    /**
     * The date (ISO8601 format) the page is to be published at.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $self = clone $this;
        $self['publishDate'] = $publishDate;

        return $self;
    }

    /**
     * The path of the this page. This field is appended to the domain to construct the url of this page.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * An ENUM describing the current state of this page.
     *
     * Maximum string length: 25
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Post was updated.
     */
    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }

    /**
     * @param list<int> $tagIDs
     */
    public function withTagIDs(array $tagIDs): self
    {
        $self = clone $this;
        $self['tagIDs'] = $tagIDs;

        return $self;
    }
}
