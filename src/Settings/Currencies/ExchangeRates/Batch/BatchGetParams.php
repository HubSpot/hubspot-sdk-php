<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies\ExchangeRates\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\PublicObjectID;

/**
 * Retrieve the details of multiple exchange rates in a single request, specified by their IDs.
 *
 * @see HubSpotSDK\Services\Settings\Currencies\ExchangeRates\BatchService::get()
 *
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 *
 * @phpstan-type BatchGetParamsShape = array{
 *   inputs: list<PublicObjectID|PublicObjectIDShape>
 * }
 */
final class BatchGetParams implements BaseModel
{
    /** @use SdkModel<BatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of deal split inputs.
     *
     * @var list<PublicObjectID> $inputs
     */
    #[Required(list: PublicObjectID::class)]
    public array $inputs;

    /**
     * `new BatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetParams)->withInputs(...)
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
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * An array of deal split inputs.
     *
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
