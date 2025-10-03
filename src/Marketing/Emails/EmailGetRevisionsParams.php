<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmailGetRevisionsParams); // set properties as needed
 * $client->marketing.emails->getRevisions(...$params->toArray());
 * ```
 * Get revisions of a marketing email.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.emails->getRevisions(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Emails->getRevisions
 *
 * @phpstan-type email_get_revisions_params = array{
 *   after?: string, before?: string, limit?: int
 * }
 */
final class EmailGetRevisionsParams implements BaseModel
{
    /** @use SdkModel<email_get_revisions_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?string $before;

    #[Api(optional: true)]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
