<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * Retrieve the details of multiple exchange rates in a single request, specified by their IDs.
 *
 * @see HubspotSDK\Settings\Currencies->batchGet
 *
 * @phpstan-type currency_batch_get_params = array{inputs: list<PublicObjectID>}
 */
final class CurrencyBatchGetParams implements BaseModel
{
    /** @use SdkModel<currency_batch_get_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicObjectID> $inputs */
    #[Api(list: PublicObjectID::class)]
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
     * @param list<PublicObjectID> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
