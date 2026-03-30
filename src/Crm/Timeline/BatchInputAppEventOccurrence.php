<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AppEventOccurrenceShape from \HubspotSDK\Crm\Timeline\AppEventOccurrence
 *
 * @phpstan-type BatchInputAppEventOccurrenceShape = array{
 *   inputs: list<AppEventOccurrence|AppEventOccurrenceShape>
 * }
 */
final class BatchInputAppEventOccurrence implements BaseModel
{
    /** @use SdkModel<BatchInputAppEventOccurrenceShape> */
    use SdkModel;

    /** @var list<AppEventOccurrence> $inputs */
    #[Required(list: AppEventOccurrence::class)]
    public array $inputs;

    /**
     * `new BatchInputAppEventOccurrence()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputAppEventOccurrence::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputAppEventOccurrence)->withInputs(...)
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
