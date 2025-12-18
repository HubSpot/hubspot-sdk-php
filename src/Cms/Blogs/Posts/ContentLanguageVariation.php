<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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

    #[Required]
    public int $id;

    #[Required]
    public bool $archivedInDashboard;

    #[Required]
    public string $authorName;

    #[Required]
    public string $campaign;

    #[Required]
    public string $campaignName;

    #[Required]
    public \DateTimeInterface $created;

    #[Required]
    public string $name;

    #[Required]
    public string $password;

    /** @var list<mixed> $publicAccessRules */
    #[Required(list: 'mixed')]
    public array $publicAccessRules;

    #[Required]
    public bool $publicAccessRulesEnabled;

    #[Required]
    public \DateTimeInterface $publishDate;

    #[Required]
    public string $slug;

    #[Required]
    public string $state;

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

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withArchivedInDashboard(bool $archivedInDashboard): self
    {
        $self = clone $this;
        $self['archivedInDashboard'] = $archivedInDashboard;

        return $self;
    }

    public function withAuthorName(string $authorName): self
    {
        $self = clone $this;
        $self['authorName'] = $authorName;

        return $self;
    }

    public function withCampaign(string $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    public function withCampaignName(string $campaignName): self
    {
        $self = clone $this;
        $self['campaignName'] = $campaignName;

        return $self;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

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

    public function withPublicAccessRulesEnabled(
        bool $publicAccessRulesEnabled
    ): self {
        $self = clone $this;
        $self['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;

        return $self;
    }

    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $self = clone $this;
        $self['publishDate'] = $publishDate;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

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
