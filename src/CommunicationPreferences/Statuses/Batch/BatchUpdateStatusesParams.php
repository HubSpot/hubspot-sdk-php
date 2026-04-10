<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\Statuses\Batch;

use HubSpotSDK\CommunicationPreferences\PublicStatusRequest;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update the subscription status for a set of contacts.
 *
 * @see HubSpotSDK\Services\CommunicationPreferences\Statuses\BatchService::updateStatuses()
 *
 * @phpstan-import-type PublicStatusRequestShape from \HubSpotSDK\CommunicationPreferences\PublicStatusRequest
 *
 * @phpstan-type BatchUpdateStatusesParamsShape = array{
 *   inputs: list<PublicStatusRequest|PublicStatusRequestShape>
 * }
 */
final class BatchUpdateStatusesParams implements BaseModel
{
    /** @use SdkModel<BatchUpdateStatusesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of PublicStatusRequest objects, each representing a subscription status update request. This property is required.
     *
     * @var list<PublicStatusRequest> $inputs
     */
    #[Required(list: PublicStatusRequest::class)]
    public array $inputs;

    /**
     * `new BatchUpdateStatusesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpdateStatusesParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpdateStatusesParams)->withInputs(...)
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
     * @param list<PublicStatusRequest|PublicStatusRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * An array of PublicStatusRequest objects, each representing a subscription status update request. This property is required.
     *
     * @param list<PublicStatusRequest|PublicStatusRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
