<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Owners;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of owners available in the account.
 *
 * @see HubspotSDK\Services\Crm\OwnersService::list()
 *
 * @phpstan-type OwnerListParamsShape = array{
 *   after?: string, archived?: bool, email?: string, limit?: int
 * }
 */
final class OwnerListParams implements BaseModel
{
    /** @use SdkModel<OwnerListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?string $email;

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
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?string $email = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $archived && $obj['archived'] = $archived;
        null !== $email && $obj['email'] = $email;
        null !== $limit && $obj['limit'] = $limit;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }
}
