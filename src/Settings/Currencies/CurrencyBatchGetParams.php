<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * Retrieve the details of multiple exchange rates in a single request, specified by their IDs.
 *
 * @see HubspotSDK\Services\Settings\CurrenciesService::batchGet()
 *
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 *
 * @phpstan-type CurrencyBatchGetParamsShape = array{
 *   inputs: list<PublicObjectID|PublicObjectIDShape>
 * }
 */
final class CurrencyBatchGetParams implements BaseModel
{
    /** @use SdkModel<CurrencyBatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicObjectID> $inputs */
    #[Required(list: PublicObjectID::class)]
    public array $inputs;

    /**
     * `new CurrencyBatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CurrencyBatchGetParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CurrencyBatchGetParams)->withInputs(...)
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
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
