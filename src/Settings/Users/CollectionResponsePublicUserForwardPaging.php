<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponsePublicUserForwardPagingShape = array{
 *   results: list<PublicUser>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponsePublicUserForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicUserForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicUser> $results */
    #[Required(list: PublicUser::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicUserForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicUserForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicUserForwardPaging)->withResults(...)
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
     * @param list<PublicUser|array{
     *   id: string,
     *   email: string,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   primaryTeamID?: string|null,
     *   roleID?: string|null,
     *   roleIDs?: list<string>|null,
     *   secondaryTeamIDs?: list<string>|null,
     *   sendWelcomeEmail?: bool|null,
     *   superAdmin?: bool|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<PublicUser|array{
     *   id: string,
     *   email: string,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   primaryTeamID?: string|null,
     *   roleID?: string|null,
     *   roleIDs?: list<string>|null,
     *   secondaryTeamIDs?: list<string>|null,
     *   sendWelcomeEmail?: bool|null,
     *   superAdmin?: bool|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
