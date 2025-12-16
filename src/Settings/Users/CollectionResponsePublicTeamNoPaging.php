<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicTeamShape from \HubspotSDK\Settings\Users\PublicTeam
 *
 * @phpstan-type CollectionResponsePublicTeamNoPagingShape = array{
 *   results: list<PublicTeamShape>
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
     * @param list<PublicTeamShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PublicTeamShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
