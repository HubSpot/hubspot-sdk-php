<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A team that can be assigned to a user.
 *
 * @phpstan-type PublicTeamShape = array{
 *   id: string,
 *   name: string,
 *   secondaryUserIds: list<string>,
 *   userIds: list<string>,
 * }
 */
final class PublicTeam implements BaseModel
{
    /** @use SdkModel<PublicTeamShape> */
    use SdkModel;

    /**
     * The team's unique ID.
     */
    #[Required]
    public string $id;

    /**
     * The team's name.
     */
    #[Required]
    public string $name;

    /**
     * Secondary or additional members of this team.
     *
     * @var list<string> $secondaryUserIds
     */
    #[Required(list: 'string')]
    public array $secondaryUserIds;

    /**
     * Primary members of this team.
     *
     * @var list<string> $userIds
     */
    #[Required(list: 'string')]
    public array $userIds;

    /**
     * `new PublicTeam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicTeam::with(id: ..., name: ..., secondaryUserIds: ..., userIds: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicTeam)
     *   ->withID(...)
     *   ->withName(...)
     *   ->withSecondaryUserIDs(...)
     *   ->withUserIDs(...)
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
     * @param list<string> $secondaryUserIds
     * @param list<string> $userIds
     */
    public static function with(
        string $id,
        string $name,
        array $secondaryUserIds,
        array $userIds
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['name'] = $name;
        $obj['secondaryUserIds'] = $secondaryUserIds;
        $obj['userIds'] = $userIds;

        return $obj;
    }

    /**
     * The team's unique ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The team's name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Secondary or additional members of this team.
     *
     * @param list<string> $secondaryUserIDs
     */
    public function withSecondaryUserIDs(array $secondaryUserIDs): self
    {
        $obj = clone $this;
        $obj['secondaryUserIds'] = $secondaryUserIDs;

        return $obj;
    }

    /**
     * Primary members of this team.
     *
     * @param list<string> $userIDs
     */
    public function withUserIDs(array $userIDs): self
    {
        $obj = clone $this;
        $obj['userIds'] = $userIDs;

        return $obj;
    }
}
