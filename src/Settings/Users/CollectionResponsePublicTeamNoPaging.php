<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CollectionResponsePublicTeamNoPagingShape = array{
 *   results: list<PublicTeam>
 * }
 */
final class CollectionResponsePublicTeamNoPaging implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CollectionResponsePublicTeamNoPagingShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PublicTeam> $results */
    #[Api(list: PublicTeam::class)]
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
     * @param list<PublicTeam|array{
     *   id: string,
     *   name: string,
     *   secondaryUserIds: list<string>,
     *   userIds: list<string>,
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<PublicTeam|array{
     *   id: string,
     *   name: string,
     *   secondaryUserIds: list<string>,
     *   userIds: list<string>,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
