<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve details of a specific sequence by its ID.
 *
 * @see HubspotSDK\Services\Automation\SequencesService::get()
 *
 * @phpstan-type SequenceGetParamsShape = array{userId: string}
 */
final class SequenceGetParams implements BaseModel
{
    /** @use SdkModel<SequenceGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $userId;

    /**
     * `new SequenceGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SequenceGetParams::with(userId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SequenceGetParams)->withUserID(...)
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
    public static function with(string $userId): self
    {
        $obj = new self;

        $obj['userId'] = $userId;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }
}
