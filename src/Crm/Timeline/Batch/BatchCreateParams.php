<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Timeline\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Timeline\AppEventOccurrence;

/**
 * @see HubSpotSDK\Services\Crm\Timeline\BatchService::create()
 *
 * @phpstan-import-type AppEventOccurrenceShape from \HubSpotSDK\Crm\Timeline\AppEventOccurrence
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   inputs: list<AppEventOccurrence|AppEventOccurrenceShape>
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<AppEventOccurrence> $inputs */
    #[Required(list: AppEventOccurrence::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
     * @param list<AppEventOccurrence|AppEventOccurrenceShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<AppEventOccurrence|AppEventOccurrenceShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
