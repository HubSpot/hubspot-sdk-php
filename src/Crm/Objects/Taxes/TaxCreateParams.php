<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Taxes;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate;

/**
 * Create multiple tax records in a single request, each with specified properties and optional associations, and receive a response with details of the created objects.
 *
 * @see HubspotSDK\Services\Crm\Objects\TaxesService::create()
 *
 * @phpstan-import-type SimplePublicObjectBatchInputForCreateShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate
 *
 * @phpstan-type TaxCreateParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape>,
 * }
 */
final class TaxCreateParams implements BaseModel
{
    /** @use SdkModel<TaxCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInputForCreate> $inputs */
    #[Required(list: SimplePublicObjectBatchInputForCreate::class)]
    public array $inputs;

    /**
     * `new TaxCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TaxCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TaxCreateParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
