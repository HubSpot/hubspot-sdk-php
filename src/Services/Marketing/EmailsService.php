<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalPublicEmailForwardPaging;
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
     * Create a new marketing email.
     *
     * @param string $name
     * @param string $activeDomain
     * @param bool $archived
     * @param int $businessUnitID
     * @param string $campaign
     * @param PublicEmailContent $content
     * @param string $feedbackSurveyID
     * @param PublicEmailFromDetails $from
     * @param bool $jitterSendTime
     * @param Language|value-of<Language> $language
     * @param \DateTimeInterface $publishDate
     * @param PublicRssEmailDetails $rssData
     * @param bool $sendOnPublish
     * @param State|value-of<State> $state
     * @param Subcategory|value-of<Subcategory> $subcategory
     * @param string $subject
     * @param PublicEmailSubscriptionDetails $subscriptionDetails
     * @param PublicEmailTestingDetails $testing
     * @param PublicEmailToDetails $to
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
     * Update a marketing email.
     *
     * @param bool $archived
     * @param string $activeDomain
     * @param int $businessUnitID
     * @param string $campaign
     * @param PublicEmailContent $content
     * @param PublicEmailFromDetails $from
     * @param bool $jitterSendTime
     * @param EmailUpdateParams\Language|value-of<EmailUpdateParams\Language> $language
     * @param string $name
     * @param \DateTimeInterface $publishDate
     * @param PublicRssEmailDetails $rssData
     * @param bool $sendOnPublish
     * @param EmailUpdateParams\State|value-of<EmailUpdateParams\State> $state
     * @param EmailUpdateParams\Subcategory|value-of<EmailUpdateParams\Subcategory> $subcategory
     * @param string $subject
     * @param PublicEmailSubscriptionDetails $subscriptionDetails
     * @param PublicEmailTestingDetails $testing
     * @param PublicEmailToDetails $to
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
     * Get all marketing emails for a HubSpot account.
     *
     * @param string $after
     * @param bool $archived
     * @param string $campaign
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param list<string> $includedProperties
     * @param bool $includeStats
     * @param bool $isPublished
     * @param int $limit
     * @param bool $marketingCampaignNames
     * @param list<string> $sort
     * @param Type|value-of<Type> $type
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
     * @param bool $workflowNames
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
    ): CollectionResponseWithTotalPublicEmailForwardPaging {
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
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicEmailForwardPaging {
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
            convert: CollectionResponseWithTotalPublicEmailForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete a marketing email.
     *
     * @param bool $archived
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
     * Clone a marketing email.
     *
     * @param string $id
     * @param string $cloneName
     * @param string $language
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
     * Create an A/B test variation of a marketing email.
     *
     * @param string $contentID
     * @param string $variationName
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
     * Get the variation of a an A/B marketing email
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
     * Get draft version of a marketing email
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
     * Get aggregated statistics.
     *
     * @param list<int> $emailIDs
     * @param string $endTimestamp
     * @param string $property
     * @param string $startTimestamp
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
     * Get aggregated statistic intervals.
     *
     * @param list<int> $emailIDs
     * @param string $endTimestamp
     * @param Interval|value-of<Interval> $interval
     * @param string $startTimestamp
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
     * Get a revision of a marketing email.
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
     * Get revisions of a marketing email
     *
     * @param string $after
     * @param string $before
     * @param int $limit
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
     * Publish or send a marketing email.
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
     * Get the details of a specified marketing email.
     *
     * @param bool $archived
     * @param list<string> $includedProperties
     * @param bool $includeStats
     * @param bool $marketingCampaignNames
     * @param bool $workflowNames
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
     * Reset Draft
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
     * Restore a revision of a marketing email to DRAFT state
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
     * Restore a revision of a marketing email
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
     * Unpublish or cancel a marketing email.
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
     * Create or update draft version
     *
     * @param string $activeDomain
     * @param bool $archived
     * @param int $businessUnitID
     * @param string $campaign
     * @param PublicEmailContent $content
     * @param PublicEmailFromDetails $from
     * @param bool $jitterSendTime
     * @param EmailUpsertDraftParams\Language|value-of<EmailUpsertDraftParams\Language> $language
     * @param string $name
     * @param \DateTimeInterface $publishDate
     * @param PublicRssEmailDetails $rssData
     * @param bool $sendOnPublish
     * @param EmailUpsertDraftParams\State|value-of<EmailUpsertDraftParams\State> $state
     * @param EmailUpsertDraftParams\Subcategory|value-of<EmailUpsertDraftParams\Subcategory> $subcategory
     * @param string $subject
     * @param PublicEmailSubscriptionDetails $subscriptionDetails
     * @param PublicEmailTestingDetails $testing
     * @param PublicEmailToDetails $to
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
