<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Callbacks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Complete a specific blocked action execution by ID.
 *
 * @see HubspotSDK\Services\Automation\Actions\CallbacksService::complete()
 *
 * @phpstan-type CallbackCompleteParamsShape = array{
 *   outputFields: array<string,string>
 * }
 */
final class CallbackCompleteParams implements BaseModel
{
    /** @use SdkModel<CallbackCompleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,string> $outputFields */
    #[Required(map: 'string')]
    public array $outputFields;

    /**
     * `new CallbackCompleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallbackCompleteParams::with(outputFields: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallbackCompleteParams)->withOutputFields(...)
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
     * @param array<string,string> $outputFields
     */
    public static function with(array $outputFields): self
    {
        $self = new self;

        $self['outputFields'] = $outputFields;

        return $self;
    }

    /**
     * @param array<string,string> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $self = clone $this;
        $self['outputFields'] = $outputFields;

        return $self;
    }
}
