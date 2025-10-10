<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type settings_users_public_team = array{
 *   id: string,
 *   name: string,
 *   secondaryUserIDs: list<string>,
 *   userIDs: list<string>,
 * }
 */
final class SettingsUsersPublicTeam implements BaseModel
{
    /** @use SdkModel<settings_users_public_team> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $name;

    /** @var list<string> $secondaryUserIDs */
    #[Api('secondaryUserIds', list: 'string')]
    public array $secondaryUserIDs;

    /** @var list<string> $userIDs */
    #[Api('userIds', list: 'string')]
    public array $userIDs;

    /**
     * `new SettingsUsersPublicTeam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingsUsersPublicTeam::with(
     *   id: ..., name: ..., secondaryUserIDs: ..., userIDs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingsUsersPublicTeam)
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
        $obj = new self;

        $obj->id = $id;
        $obj->name = $name;
        $obj->secondaryUserIDs = $secondaryUserIDs;
        $obj->userIDs = $userIDs;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<string> $secondaryUserIDs
     */
    public function withSecondaryUserIDs(array $secondaryUserIDs): self
    {
        $obj = clone $this;
        $obj->secondaryUserIDs = $secondaryUserIDs;

        return $obj;
    }

    /**
     * @param list<string> $userIDs
     */
    public function withUserIDs(array $userIDs): self
    {
        $obj = clone $this;
        $obj->userIDs = $userIDs;

        return $obj;
    }
}
