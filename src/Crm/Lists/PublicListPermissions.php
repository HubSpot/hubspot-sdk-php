<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

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
    #[Required(list: 'int')]
    public array $teamsWithEditAccess;

    /** @var list<int> $usersWithEditAccess */
    #[Required(list: 'int')]
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
        $self = new self;

        $self['teamsWithEditAccess'] = $teamsWithEditAccess;
        $self['usersWithEditAccess'] = $usersWithEditAccess;

        return $self;
    }

    /**
     * @param list<int> $teamsWithEditAccess
     */
    public function withTeamsWithEditAccess(array $teamsWithEditAccess): self
    {
        $self = clone $this;
        $self['teamsWithEditAccess'] = $teamsWithEditAccess;

        return $self;
    }

    /**
     * @param list<int> $usersWithEditAccess
     */
    public function withUsersWithEditAccess(array $usersWithEditAccess): self
    {
        $self = clone $this;
        $self['usersWithEditAccess'] = $usersWithEditAccess;

        return $self;
    }
}
