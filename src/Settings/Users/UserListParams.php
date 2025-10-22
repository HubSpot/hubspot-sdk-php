<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieves a list of users from an account.
 *
 * @see HubspotSDK\Settings\Users->list
 *
 * @phpstan-type user_list_params = array{after?: string, limit?: int}
 */
final class UserListParams implements BaseModel
{
    /** @use SdkModel<user_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Results will display maximum 100 users per page. Additional results will be on the next page.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * The number of users to retrieve.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    /**
     * Results will display maximum 100 users per page. Additional results will be on the next page.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * The number of users to retrieve.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
