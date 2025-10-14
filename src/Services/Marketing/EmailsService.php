<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalVersionPublicEmail;
use HubspotSDK\Marketing\Emails\EmailCloneParams;
use HubspotSDK\Marketing\Emails\EmailCreateAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubspotSDK\Marketing\Emails\EmailDeleteParams;
use HubspotSDK\Marketing\Emails\EmailGetEmailsListParams;
use HubspotSDK\Marketing\Emails\EmailGetHistogramParams;
use HubspotSDK\Marketing\Emails\EmailGetHistogramParams\Interval;
use HubspotSDK\Marketing\Emails\EmailGetRevisionByIDParams;
use HubspotSDK\Marketing\Emails\EmailGetRevisionsParams;
use HubspotSDK\Marketing\Emails\EmailListFullParams;
use HubspotSDK\Marketing\Emails\EmailListParams;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;
use HubspotSDK\Marketing\Emails\EmailReadParams;
use HubspotSDK\Marketing\Emails\EmailRestoreDraftRevisionParams;
use HubspotSDK\Marketing\Emails\EmailRestoreRevisionParams;
use HubspotSDK\Marketing\Emails\EmailUpdateParams;
use HubspotSDK\Marketing\Emails\EmailUpsertDraftParams;
use HubspotSDK\Marketing\Emails\PublicEmail;
use HubspotSDK\Marketing\Emails\PublicEmailContent;
use HubspotSDK\Marketing\Emails\PublicEmailFromDetails;
use HubspotSDK\Marketing\Emails\PublicEmailSubscriptionDetails;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails;
use HubspotSDK\Marketing\Emails\PublicEmailToDetails;
use HubspotSDK\Marketing\Emails\PublicRssEmailDetails;
use HubspotSDK\Marketing\Emails\PublicWebversionDetails;
use HubspotSDK\Marketing\Emails\VersionPublicEmail;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\EmailsContract;

use const HubspotSDK\Core\OMIT as omit;

final class EmailsService implements EmailsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Use this endpoint to create a new marketing email.
     *
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param int $businessUnitID
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent $content data structure representing the content of the email
     * @param string $feedbackSurveyID the ID of the feedback survey linked to the email
     * @param int $folderIDV2
     * @param PublicEmailFromDetails $from data structure representing the from fields on the email
     * @param bool $jitterSendTime
     * @param Language|value-of<Language> $language
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param State|value-of<State> $state the email state
     * @param Subcategory|value-of<Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails $subscriptionDetails data structure representing the subscription fields of the email
     * @param PublicEmailTestingDetails $testing AB testing related data. This property is only returned for AB type emails.
     * @param PublicEmailToDetails $to data structure representing the to fields of the email
     * @param PublicWebversionDetails $webversion
     *
     * @throws APIException
     */
    public function create(
        $name,
        $activeDomain = omit,
        $archived = omit,
        $businessUnitID = omit,
        $campaign = omit,
        $content = omit,
        $feedbackSurveyID = omit,
        $folderIDV2 = omit,
        $from = omit,
        $jitterSendTime = omit,
        $language = omit,
        $publishDate = omit,
        $rssData = omit,
        $sendOnPublish = omit,
        $state = omit,
        $subcategory = omit,
        $subject = omit,
        $subscriptionDetails = omit,
        $testing = omit,
        $to = omit,
        $webversion = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = [
            'name' => $name,
            'activeDomain' => $activeDomain,
            'archived' => $archived,
            'businessUnitID' => $businessUnitID,
            'campaign' => $campaign,
            'content' => $content,
            'feedbackSurveyID' => $feedbackSurveyID,
            'folderIDV2' => $folderIDV2,
            'from' => $from,
            'jitterSendTime' => $jitterSendTime,
            'language' => $language,
            'publishDate' => $publishDate,
            'rssData' => $rssData,
            'sendOnPublish' => $sendOnPublish,
            'state' => $state,
            'subcategory' => $subcategory,
            'subject' => $subject,
            'subscriptionDetails' => $subscriptionDetails,
            'testing' => $testing,
            'to' => $to,
            'webversion' => $webversion,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        [$parsed, $options] = EmailCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/emails/',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Change properties of a marketing email.
     *
     * @param bool $archived determines if the email is archived or not
     * @param string $activeDomain the active domain of the email
     * @param int $businessUnitID
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent $content data structure representing the content of the email
     * @param int $folderIDV2
     * @param PublicEmailFromDetails $from data structure representing the from fields on the email
     * @param bool $jitterSendTime
     * @param EmailUpdateParams\Language|value-of<EmailUpdateParams\Language> $language
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param EmailUpdateParams\State|value-of<EmailUpdateParams\State> $state the email state
     * @param EmailUpdateParams\Subcategory|value-of<EmailUpdateParams\Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails $subscriptionDetails data structure representing the subscription fields of the email
     * @param PublicEmailTestingDetails $testing AB testing related data. This property is only returned for AB type emails.
     * @param PublicEmailToDetails $to data structure representing the to fields of the email
     * @param PublicWebversionDetails $webversion
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        $archived = omit,
        $activeDomain = omit,
        $businessUnitID = omit,
        $campaign = omit,
        $content = omit,
        $folderIDV2 = omit,
        $from = omit,
        $jitterSendTime = omit,
        $language = omit,
        $name = omit,
        $publishDate = omit,
        $rssData = omit,
        $sendOnPublish = omit,
        $state = omit,
        $subcategory = omit,
        $subject = omit,
        $subscriptionDetails = omit,
        $testing = omit,
        $to = omit,
        $webversion = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = [
            'archived' => $archived,
            'activeDomain' => $activeDomain,
            'businessUnitID' => $businessUnitID,
            'campaign' => $campaign,
            'content' => $content,
            'folderIDV2' => $folderIDV2,
            'from' => $from,
            'jitterSendTime' => $jitterSendTime,
            'language' => $language,
            'name' => $name,
            'publishDate' => $publishDate,
            'rssData' => $rssData,
            'sendOnPublish' => $sendOnPublish,
            'state' => $state,
            'subcategory' => $subcategory,
            'subject' => $subject,
            'subscriptionDetails' => $subscriptionDetails,
            'testing' => $testing,
            'to' => $to,
            'webversion' => $webversion,
        ];

        return $this->updateRaw($emailID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        [$parsed, $options] = EmailUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['marketing/v3/emails/%1$s', $emailID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * The results can be filtered, allowing you to find a specific set of emails. See the table below for a full list of filtering options.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived emails. Defaults to `false`.
     * @param string $campaign Filter by campaign GUID. All emails will be returned if not present.
     * @param \DateTimeInterface $createdAfter only return emails created after the specified time
     * @param \DateTimeInterface $createdAt only return emails created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return emails created before the specified time
     * @param list<string> $includedProperties limit the response to only include this specified list of properties
     * @param bool $includeStats include statistics with emails
     * @param bool $isPublished Filter by published/draft emails. All emails will be returned if not present.
     * @param int $limit The maximum number of results to return. Default is 10.
     * @param bool $marketingCampaignNames include the names for any associated marketing campaigns
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param Type|value-of<Type> $type Email types to be filtered by. Multiple types can be included. All emails will be returned if not present.
     * @param \DateTimeInterface $updatedAfter only return emails last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return emails last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return emails last updated before the specified time
     * @param bool $workflowNames include the names of any workflows associated with the returned emails
     *
     * @return Page<PublicEmail>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $campaign = omit,
        $createdAfter = omit,
        $createdAt = omit,
        $createdBefore = omit,
        $includedProperties = omit,
        $includeStats = omit,
        $isPublished = omit,
        $limit = omit,
        $marketingCampaignNames = omit,
        $sort = omit,
        $type = omit,
        $updatedAfter = omit,
        $updatedAt = omit,
        $updatedBefore = omit,
        $workflowNames = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'campaign' => $campaign,
            'createdAfter' => $createdAfter,
            'createdAt' => $createdAt,
            'createdBefore' => $createdBefore,
            'includedProperties' => $includedProperties,
            'includeStats' => $includeStats,
            'isPublished' => $isPublished,
            'limit' => $limit,
            'marketingCampaignNames' => $marketingCampaignNames,
            'sort' => $sort,
            'type' => $type,
            'updatedAfter' => $updatedAfter,
            'updatedAt' => $updatedAt,
            'updatedBefore' => $updatedBefore,
            'workflowNames' => $workflowNames,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicEmail>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = EmailListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/emails/',
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a marketing email by its ID
     *
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['archived' => $archived];

        return $this->deleteRaw($emailID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = EmailDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['marketing/v3/emails/%1$s', $emailID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * This will create a duplicate email with the same properties as the original, with the exception of a unique ID.
     *
     * @param string $id the unique identifier of the email to be cloned
     * @param string $cloneName the name to assign to the cloned email
     * @param string $language the language code for the cloned email, such as 'en' for English
     *
     * @throws APIException
     */
    public function clone(
        $id,
        $cloneName = omit,
        $language = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = ['id' => $id, 'cloneName' => $cloneName, 'language' => $language];

        return $this->cloneRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        [$parsed, $options] = EmailCloneParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/emails/clone',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Create a variation of a marketing email for an A/B test. The new variation will be created as a draft. If an active variation already exists, a new one won't be created.
     *
     * @param string $contentID ID of the email to test
     * @param string $variationName name of the variation to be created
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        $contentID,
        $variationName,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        $params = ['contentID' => $contentID, 'variationName' => $variationName];

        return $this->createAbTestVariationRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createAbTestVariationRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        [$parsed, $options] = EmailCreateAbTestVariationParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/emails/ab-test/create-variation',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * This endpoint lets you obtain the variation of an A/B marketing email. If the email is variation A (master) it will return variation B (variant) and vice versa.
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s/ab-test/get-variation', $emailID],
            options: $requestOptions,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Get the draft version of an email (if it exists). If no draft version exists, the published email is returned.
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s/draft', $emailID],
            options: $requestOptions,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
     *
     * @param list<int> $emailIDs Filter by email IDs. Only include statistics of emails with these IDs.
     * @param string $endTimestamp the end timestamp of the time span, in ISO8601 representation
     * @param string $property Specifies which email properties should be returned. All properties will be returned by default.
     * @param string $startTimestamp the start timestamp of the time span, in ISO8601 representation
     *
     * @throws APIException
     */
    public function getEmailsList(
        $emailIDs = omit,
        $endTimestamp = omit,
        $property = omit,
        $startTimestamp = omit,
        ?RequestOptions $requestOptions = null,
    ): AggregateEmailStatistics {
        $params = [
            'emailIDs' => $emailIDs,
            'endTimestamp' => $endTimestamp,
            'property' => $property,
            'startTimestamp' => $startTimestamp,
        ];

        return $this->getEmailsListRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getEmailsListRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AggregateEmailStatistics {
        [$parsed, $options] = EmailGetEmailsListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/emails/statistics/list',
            query: $parsed,
            options: $options,
            convert: AggregateEmailStatistics::class,
        );
    }

    /**
     * @api
     *
     * Get aggregated statistics in intervals for a specified time span. Each interval contains aggregated statistics of the emails that were sent in that time.
     *
     * @param list<int> $emailIDs Filter by email IDs. Only include statistics of emails with these IDs.
     * @param string $endTimestamp the end timestamp of the time span, in ISO8601 representation
     * @param Interval|value-of<Interval> $interval the interval to aggregate statistics for
     * @param string $startTimestamp the start timestamp of the time span, in ISO8601 representation
     *
     * @throws APIException
     */
    public function getHistogram(
        $emailIDs = omit,
        $endTimestamp = omit,
        $interval = omit,
        $startTimestamp = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging {
        $params = [
            'emailIDs' => $emailIDs,
            'endTimestamp' => $endTimestamp,
            'interval' => $interval,
            'startTimestamp' => $startTimestamp,
        ];

        return $this->getHistogramRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getHistogramRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging {
        [$parsed, $options] = EmailGetHistogramParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/emails/statistics/histogram',
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalEmailStatisticIntervalNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Get a specific revision of a marketing email.
     *
     * @param string $emailID
     *
     * @throws APIException
     */
    public function getRevisionByID(
        string $revisionID,
        $emailID,
        ?RequestOptions $requestOptions = null
    ): VersionPublicEmail {
        $params = ['emailID' => $emailID];

        return $this->getRevisionByIDRaw($revisionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRevisionByIDRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VersionPublicEmail {
        [$parsed, $options] = EmailGetRevisionByIDParams::parseRequest(
            $params,
            $requestOptions
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s/revisions/%2$s', $emailID, $revisionID],
            options: $options,
            convert: VersionPublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Get a list of all versions of a marketing email, with each entry including the full state of that particular version. To view the most recent version, sort by the updatedAt parameter.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before The cursor token value to get the previous set of results. You can get this from the `paging.prev.before` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to return. Default is 10.
     *
     * @throws APIException
     */
    public function getRevisions(
        string $emailID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalVersionPublicEmail {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->getRevisionsRaw($emailID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRevisionsRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalVersionPublicEmail {
        [$parsed, $options] = EmailGetRevisionsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s/revisions', $emailID],
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalVersionPublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
     *
     * @param list<int> $emailIDs Filter by email IDs. Only include statistics of emails with these IDs.
     * @param string $endTimestamp the end timestamp of the time span, in ISO8601 representation
     * @param string $property Specifies which email properties should be returned. All properties will be returned by default.
     * @param string $startTimestamp the start timestamp of the time span, in ISO8601 representation
     *
     * @throws APIException
     */
    public function listFull(
        $emailIDs = omit,
        $endTimestamp = omit,
        $property = omit,
        $startTimestamp = omit,
        ?RequestOptions $requestOptions = null,
    ): AggregateEmailStatistics {
        $params = [
            'emailIDs' => $emailIDs,
            'endTimestamp' => $endTimestamp,
            'property' => $property,
            'startTimestamp' => $startTimestamp,
        ];

        return $this->listFullRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listFullRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AggregateEmailStatistics {
        [$parsed, $options] = EmailListFullParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/emails/statistics/list',
            query: $parsed,
            options: $options,
            convert: AggregateEmailStatistics::class,
        );
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to publish an automated email or send/schedule a regular email.
     *
     * @throws APIException
     */
    public function publishOrSend(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['marketing/v3/emails/%1$s/publish', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the details for a marketing email.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $includedProperties limit the response to only include the specified properties
     * @param bool $includeStats include statistics with email
     * @param bool $marketingCampaignNames if set to true, loads `campaignName` and `campaignUtm`
     * @param bool $workflowNames if set to true, loads workflows in which the email is used within a "send email" action
     *
     * @throws APIException
     */
    public function read(
        string $emailID,
        $archived = omit,
        $includedProperties = omit,
        $includeStats = omit,
        $marketingCampaignNames = omit,
        $workflowNames = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = [
            'archived' => $archived,
            'includedProperties' => $includedProperties,
            'includeStats' => $includeStats,
            'marketingCampaignNames' => $marketingCampaignNames,
            'workflowNames' => $workflowNames,
        ];

        return $this->readRaw($emailID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        [$parsed, $options] = EmailReadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/emails/%1$s', $emailID],
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Resets the draft back to a copy of the live object.
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['marketing/v3/emails/%1$s/draft/reset', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email to DRAFT state. If there is currently something in the draft for that object, it is overwritten.
     *
     * @param string $emailID
     *
     * @throws APIException
     */
    public function restoreDraftRevision(
        int $revisionID,
        $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        $params = ['emailID' => $emailID];

        return $this->restoreDraftRevisionRaw(
            $revisionID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restoreDraftRevisionRaw(
        int $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        [$parsed, $options] = EmailRestoreDraftRevisionParams::parseRequest(
            $params,
            $requestOptions
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/emails/%1$s/revisions/%2$s/restore-to-draft',
                $emailID,
                $revisionID,
            ],
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email. The current revision becomes old, and the restored revision is given a new version number.
     *
     * @param string $emailID
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['emailID' => $emailID];

        return $this->restoreRevisionRaw($revisionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restoreRevisionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = EmailRestoreRevisionParams::parseRequest(
            $params,
            $requestOptions
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/emails/%1$s/revisions/%2$s/restore', $emailID, $revisionID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to unpublish an automated email or cancel a regular email. If the email is already in the process of being sent, canceling might not be possible.
     *
     * @throws APIException
     */
    public function unpublishOrCancel(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['marketing/v3/emails/%1$s/unpublish', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create or update the draft version of a marketing email. If no draft exists, the system creates a draft from the current “live” email then applies the request body to that draft. The draft version only lives on the buffer—the email is not cloned.
     *
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param int $businessUnitID
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent $content data structure representing the content of the email
     * @param int $folderIDV2
     * @param PublicEmailFromDetails $from data structure representing the from fields on the email
     * @param bool $jitterSendTime
     * @param EmailUpsertDraftParams\Language|value-of<EmailUpsertDraftParams\Language> $language
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param EmailUpsertDraftParams\State|value-of<EmailUpsertDraftParams\State> $state the email state
     * @param EmailUpsertDraftParams\Subcategory|value-of<EmailUpsertDraftParams\Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails $subscriptionDetails data structure representing the subscription fields of the email
     * @param PublicEmailTestingDetails $testing AB testing related data. This property is only returned for AB type emails.
     * @param PublicEmailToDetails $to data structure representing the to fields of the email
     * @param PublicWebversionDetails $webversion
     *
     * @throws APIException
     */
    public function upsertDraft(
        string $emailID,
        $activeDomain = omit,
        $archived = omit,
        $businessUnitID = omit,
        $campaign = omit,
        $content = omit,
        $folderIDV2 = omit,
        $from = omit,
        $jitterSendTime = omit,
        $language = omit,
        $name = omit,
        $publishDate = omit,
        $rssData = omit,
        $sendOnPublish = omit,
        $state = omit,
        $subcategory = omit,
        $subject = omit,
        $subscriptionDetails = omit,
        $testing = omit,
        $to = omit,
        $webversion = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail {
        $params = [
            'activeDomain' => $activeDomain,
            'archived' => $archived,
            'businessUnitID' => $businessUnitID,
            'campaign' => $campaign,
            'content' => $content,
            'folderIDV2' => $folderIDV2,
            'from' => $from,
            'jitterSendTime' => $jitterSendTime,
            'language' => $language,
            'name' => $name,
            'publishDate' => $publishDate,
            'rssData' => $rssData,
            'sendOnPublish' => $sendOnPublish,
            'state' => $state,
            'subcategory' => $subcategory,
            'subject' => $subject,
            'subscriptionDetails' => $subscriptionDetails,
            'testing' => $testing,
            'to' => $to,
            'webversion' => $webversion,
        ];

        return $this->upsertDraftRaw($emailID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function upsertDraftRaw(
        string $emailID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail {
        [$parsed, $options] = EmailUpsertDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['marketing/v3/emails/%1$s/draft', $emailID],
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }
}
