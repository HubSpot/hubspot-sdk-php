<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicListPermissionsShape = array{
 *   teamsWithEditAccess: list<int>, usersWithEditAccess: list<int>
 * }
 */
final class PublicListPermissions implements BaseModel
{
    /** @use SdkModel<PublicListPermissionsShape> */
    use SdkModel;

    /** @var list<int> $teamsWithEditAccess */
    #[Api(list: 'int')]
    public array $teamsWithEditAccess;

    /** @var list<int> $usersWithEditAccess */
    #[Api(list: 'int')]
    public array $usersWithEditAccess;

    /**
     * `new PublicListPermissions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicListPermissions::with(teamsWithEditAccess: ..., usersWithEditAccess: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicListPermissions)
     *   ->withTeamsWithEditAccess(...)
     *   ->withUsersWithEditAccess(...)
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
     * @param list<int> $teamsWithEditAccess
     * @param list<int> $usersWithEditAccess
     */
    public static function with(
        array $teamsWithEditAccess,
        array $usersWithEditAccess
    ): self {
        $obj = new self;

        $obj->teamsWithEditAccess = $teamsWithEditAccess;
        $obj->usersWithEditAccess = $usersWithEditAccess;

        return $obj;
    }

    /**
     * @param list<int> $teamsWithEditAccess
     */
    public function withTeamsWithEditAccess(array $teamsWithEditAccess): self
    {
        $obj = clone $this;
        $obj->teamsWithEditAccess = $teamsWithEditAccess;

        return $obj;
    }

    /**
     * @param list<int> $usersWithEditAccess
     */
    public function withUsersWithEditAccess(array $usersWithEditAccess): self
    {
        $obj = clone $this;
        $obj->usersWithEditAccess = $usersWithEditAccess;

        return $obj;
    }
}
