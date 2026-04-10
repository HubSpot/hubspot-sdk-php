<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Users;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicTeamShape from \HubSpotSDK\Settings\Users\PublicTeam
 *
 * @phpstan-type CollectionResponsePublicTeamNoPagingShape = array{
 *   results: list<PublicTeam|PublicTeamShape>
 * }
 */
final class CollectionResponsePublicTeamNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicTeamNoPagingShape> */
    use SdkModel;

    /** @var list<PublicTeam> $results */
    #[Required(list: PublicTeam::class)]
    public array $results;

    /**
     * `new CollectionResponsePublicTeamNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicTeamNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicTeamNoPaging)->withResults(...)
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
     * @param list<PublicTeam|PublicTeamShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PublicTeam|PublicTeamShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
