<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of sequences that belong to a specific user.
 *
 * @see HubspotSDK\Services\Automation\SequencesService::list()
 *
 * @phpstan-type SequenceListParamsShape = array{
 *   userId: string, after?: string, limit?: int, name?: string
 * }
 */
final class SequenceListParams implements BaseModel
{
    /** @use SdkModel<SequenceListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $userId;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?int $limit;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new SequenceListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SequenceListParams::with(userId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SequenceListParams)->withUserID(...)
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
     */
    public static function with(
        string $userId,
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null
    ): self {
        $obj = new self;

        $obj->userId = $userId;

        null !== $after && $obj->after = $after;
        null !== $limit && $obj->limit = $limit;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userId = $userID;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
