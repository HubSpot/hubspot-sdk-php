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
 *   secondaryUserIDs: list<string>,
 *   userIDs: list<string>,
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
     * @var list<string> $secondaryUserIDs
     */
    #[Required('secondaryUserIds', list: 'string')]
    public array $secondaryUserIDs;

    /**
     * Primary members of this team.
     *
     * @var list<string> $userIDs
     */
    #[Required('userIds', list: 'string')]
    public array $userIDs;

    /**
     * `new PublicTeam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicTeam::with(id: ..., name: ..., secondaryUserIDs: ..., userIDs: ...)
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
     * @param list<string> $secondaryUserIDs
     * @param list<string> $userIDs
     */
    public static function with(
        string $id,
        string $name,
        array $secondaryUserIDs,
        array $userIDs
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['secondaryUserIDs'] = $secondaryUserIDs;
        $self['userIDs'] = $userIDs;

        return $self;
    }

    /**
     * The team's unique ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The team's name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Secondary or additional members of this team.
     *
     * @param list<string> $secondaryUserIDs
     */
    public function withSecondaryUserIDs(array $secondaryUserIDs): self
    {
        $self = clone $this;
        $self['secondaryUserIDs'] = $secondaryUserIDs;

        return $self;
    }

    /**
     * Primary members of this team.
     *
     * @param list<string> $userIDs
     */
    public function withUserIDs(array $userIDs): self
    {
        $self = clone $this;
        $self['userIDs'] = $userIDs;

        return $self;
    }
}
