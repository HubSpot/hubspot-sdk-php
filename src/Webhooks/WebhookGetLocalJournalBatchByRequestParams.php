<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Perform a batch read operation on the webhooks journal. This endpoint allows you to read multiple entries from the journal in a single request. It requires a JSON request body specifying the inputs to be read. The response includes the results of the batch read operation, and may return multiple statuses if there are errors.
 *
 * @see HubSpotSDK\Services\WebhooksService::getLocalJournalBatchByRequest()
 *
 * @phpstan-type WebhookGetLocalJournalBatchByRequestParamsShape = array{
 *   inputs: list<string>, installPortalID?: int|null
 * }
 */
final class WebhookGetLocalJournalBatchByRequestParams implements BaseModel
{
    /** @use SdkModel<WebhookGetLocalJournalBatchByRequestParamsShape> */
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
     * The ID of the portal where the webhooks are installed. This parameter is optional and is used to specify the target portal.
     */
    #[Optional]
    public ?int $installPortalID;

    /**
     * `new WebhookGetLocalJournalBatchByRequestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookGetLocalJournalBatchByRequestParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookGetLocalJournalBatchByRequestParams)->withInputs(...)
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
     * The ID of the portal where the webhooks are installed. This parameter is optional and is used to specify the target portal.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
