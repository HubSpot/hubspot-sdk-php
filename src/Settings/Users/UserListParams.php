<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieves a list of users from an account.
 *
 * @see HubspotSDK\Services\Settings\UsersService::list()
 *
 * @phpstan-type UserListParamsShape = array{after?: string|null, limit?: int|null}
 */
final class UserListParams implements BaseModel
{
    /** @use SdkModel<UserListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Results will display maximum 100 users per page. Additional results will be on the next page.
     */
    #[Optional]
    public ?string $after;

    /**
     * The number of users to retrieve.
     */
    #[Optional]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $after = null, ?int $limit = null): self
    {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * Results will display maximum 100 users per page. Additional results will be on the next page.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * The number of users to retrieve.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
