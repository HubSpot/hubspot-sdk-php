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
 * $params = (new EmailListFullParams); // set properties as needed
 * $client->marketing.emails->listFull(...$params->toArray());
 * ```
 * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.emails->listFull(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Emails->listFull
 *
 * @phpstan-type email_list_full_params = array{
 *   emailIDs?: list<int>,
 *   endTimestamp?: string,
 *   property?: string,
 *   startTimestamp?: string,
 * }
 */
final class EmailListFullParams implements BaseModel
{
    /** @use SdkModel<email_list_full_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by email IDs. Only include statistics of emails with these IDs.
     *
     * @var list<int>|null $emailIDs
     */
    #[Api(list: 'int', optional: true)]
    public ?array $emailIDs;

    /**
     * The end timestamp of the time span, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?string $endTimestamp;

    /**
     * Specifies which email properties should be returned. All properties will be returned by default.
     */
    #[Api(optional: true)]
    public ?string $property;

    /**
     * The start timestamp of the time span, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?string $startTimestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int> $emailIDs
     */
    public static function with(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        ?string $property = null,
        ?string $startTimestamp = null,
    ): self {
        $obj = new self;

        null !== $emailIDs && $obj->emailIDs = $emailIDs;
        null !== $endTimestamp && $obj->endTimestamp = $endTimestamp;
        null !== $property && $obj->property = $property;
        null !== $startTimestamp && $obj->startTimestamp = $startTimestamp;

        return $obj;
    }

    /**
     * Filter by email IDs. Only include statistics of emails with these IDs.
     *
     * @param list<int> $emailIDs
     */
    public function withEmailIDs(array $emailIDs): self
    {
        $obj = clone $this;
        $obj->emailIDs = $emailIDs;

        return $obj;
    }

    /**
     * The end timestamp of the time span, in ISO8601 representation.
     */
    public function withEndTimestamp(string $endTimestamp): self
    {
        $obj = clone $this;
        $obj->endTimestamp = $endTimestamp;

        return $obj;
    }

    /**
     * Specifies which email properties should be returned. All properties will be returned by default.
     */
    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }

    /**
     * The start timestamp of the time span, in ISO8601 representation.
     */
    public function withStartTimestamp(string $startTimestamp): self
    {
        $obj = clone $this;
        $obj->startTimestamp = $startTimestamp;

        return $obj;
    }
}
