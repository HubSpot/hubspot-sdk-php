<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Read a batch of webhook journal entries for the specified portal. This endpoint allows you to retrieve detailed information about webhook events processed by your HubSpot account. It is useful for auditing and tracking webhook activity.
 *
 * @see HubSpotSDK\Services\WebhooksService::getJournalBatchByRequest()
 *
 * @phpstan-type WebhookGetJournalBatchByRequestParamsShape = array{
 *   inputs: list<string>, installPortalID?: int|null
 * }
 */
final class WebhookGetJournalBatchByRequestParams implements BaseModel
{
    /** @use SdkModel<WebhookGetJournalBatchByRequestParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Required(list: 'string')]
    public array $inputs;

    /**
     * The ID of the portal from which to retrieve webhook journal entries. This is an integer value.
     */
    #[Optional]
    public ?int $installPortalID;

    /**
     * `new WebhookGetJournalBatchByRequestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookGetJournalBatchByRequestParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookGetJournalBatchByRequestParams)->withInputs(...)
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
     * @param list<string> $inputs
     */
    public static function with(
        array $inputs,
        ?int $installPortalID = null
    ): self {
        $self = new self;

        $self['inputs'] = $inputs;

        null !== $installPortalID && $self['installPortalID'] = $installPortalID;

        return $self;
    }

    /**
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * The ID of the portal from which to retrieve webhook journal entries. This is an integer value.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
