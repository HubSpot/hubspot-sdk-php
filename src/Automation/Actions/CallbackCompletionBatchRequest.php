<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallbackCompletionBatchRequestShape = array{
 *   callbackId: string, outputFields: array<string,string>
 * }
 */
final class CallbackCompletionBatchRequest implements BaseModel
{
    /** @use SdkModel<CallbackCompletionBatchRequestShape> */
    use SdkModel;

    #[Required]
    public string $callbackId;

    /** @var array<string,string> $outputFields */
    #[Required(map: 'string')]
    public array $outputFields;

    /**
     * `new CallbackCompletionBatchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallbackCompletionBatchRequest::with(callbackId: ..., outputFields: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallbackCompletionBatchRequest)->withCallbackID(...)->withOutputFields(...)
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
    public static function with(string $callbackId, array $outputFields): self
    {
        $obj = new self;

        $obj['callbackId'] = $callbackId;
        $obj['outputFields'] = $outputFields;

        return $obj;
    }

    public function withCallbackID(string $callbackID): self
    {
        $obj = clone $this;
        $obj['callbackId'] = $callbackID;

        return $obj;
    }

    /**
     * @param array<string,string> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $obj = clone $this;
        $obj['outputFields'] = $outputFields;

        return $obj;
    }
}
