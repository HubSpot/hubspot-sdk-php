<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContentLanguageVariationShape = array{
 *   id: int,
 *   archivedInDashboard: bool,
 *   authorName: string,
 *   campaign: string,
 *   created: \DateTimeInterface,
 *   name: string,
 *   password: string,
 *   publicAccessRules: list<mixed>,
 *   publicAccessRulesEnabled: bool,
 *   publishDate: \DateTimeInterface,
 *   slug: string,
 *   state: string,
 *   updated: \DateTimeInterface,
 *   tagIDs?: list<int>,
 * }
 */
final class ContentLanguageVariation implements BaseModel
{
    /** @use SdkModel<ContentLanguageVariationShape> */
    use SdkModel;

    #[Api]
    public int $id;

    #[Api]
    public bool $archivedInDashboard;

    #[Api]
    public string $authorName;

    #[Api]
    public string $campaign;

    #[Api]
    public \DateTimeInterface $created;

    #[Api]
    public string $name;

    #[Api]
    public string $password;

    /** @var list<mixed> $publicAccessRules */
    #[Api(list: 'mixed')]
    public array $publicAccessRules;

    #[Api]
    public bool $publicAccessRulesEnabled;

    #[Api]
    public \DateTimeInterface $publishDate;

    #[Api]
    public string $slug;

    #[Api]
    public string $state;

    #[Api]
    public \DateTimeInterface $updated;

    /** @var list<int>|null $tagIDs */
    #[Api('tagIds', list: 'int', optional: true)]
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
     * @param list<int> $tagIDs
     */
    public static function with(
        int $id,
        bool $archivedInDashboard,
        string $authorName,
        string $campaign,
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
        $obj = new self;

        $obj->id = $id;
        $obj->archivedInDashboard = $archivedInDashboard;
        $obj->authorName = $authorName;
        $obj->campaign = $campaign;
        $obj->created = $created;
        $obj->name = $name;
        $obj->password = $password;
        $obj->publicAccessRules = $publicAccessRules;
        $obj->publicAccessRulesEnabled = $publicAccessRulesEnabled;
        $obj->publishDate = $publishDate;
        $obj->slug = $slug;
        $obj->state = $state;
        $obj->updated = $updated;

        null !== $tagIDs && $obj->tagIDs = $tagIDs;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withArchivedInDashboard(bool $archivedInDashboard): self
    {
        $obj = clone $this;
        $obj->archivedInDashboard = $archivedInDashboard;

        return $obj;
    }

    public function withAuthorName(string $authorName): self
    {
        $obj = clone $this;
        $obj->authorName = $authorName;

        return $obj;
    }

    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    /**
     * @param list<mixed> $publicAccessRules
     */
    public function withPublicAccessRules(array $publicAccessRules): self
    {
        $obj = clone $this;
        $obj->publicAccessRules = $publicAccessRules;

        return $obj;
    }

    public function withPublicAccessRulesEnabled(
        bool $publicAccessRulesEnabled
    ): self {
        $obj = clone $this;
        $obj->publicAccessRulesEnabled = $publicAccessRulesEnabled;

        return $obj;
    }

    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }

    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $obj = clone $this;
        $obj->updated = $updated;

        return $obj;
    }

    /**
     * @param list<int> $tagIDs
     */
    public function withTagIDs(array $tagIDs): self
    {
        $obj = clone $this;
        $obj->tagIDs = $tagIDs;

        return $obj;
    }
}
