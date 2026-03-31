<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticInterval;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubspotSDK\Marketing\Emails\EmailGetHistogramParams\Interval;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;
use HubspotSDK\Marketing\Emails\PublicEmail;
use HubspotSDK\Marketing\Emails\PublicEmailContent;
use HubspotSDK\Marketing\Emails\PublicEmailFromDetails;
use HubspotSDK\Marketing\Emails\PublicEmailSubscriptionDetails;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails;
use HubspotSDK\Marketing\Emails\PublicEmailToDetails;
use HubspotSDK\Marketing\Emails\PublicEmailVersion;
use HubspotSDK\Marketing\Emails\PublicRssEmailDetails;
use HubspotSDK\Marketing\Emails\PublicWebversionDetails;
use HubspotSDK\Marketing\Emails\VersionPublicEmail;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\EmailsContract;

/**
 * @phpstan-import-type PublicEmailContentShape from \HubspotSDK\Marketing\Emails\PublicEmailContent
 * @phpstan-import-type PublicEmailFromDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailFromDetails
 * @phpstan-import-type PublicRssEmailDetailsShape from \HubspotSDK\Marketing\Emails\PublicRssEmailDetails
 * @phpstan-import-type PublicEmailSubscriptionDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailSubscriptionDetails
 * @phpstan-import-type PublicEmailTestingDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailTestingDetails
 * @phpstan-import-type PublicEmailToDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailToDetails
 * @phpstan-import-type PublicWebversionDetailsShape from \HubspotSDK\Marketing\Emails\PublicWebversionDetails
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class EmailsService implements EmailsContract
{
    /**
     * @api
     */
    public EmailsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailsRawService($client);
    }

    /**
     * @api
     *
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param int $businessUnitID the ID of the business unit associated with the email
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent|PublicEmailContentShape $content
     * @param string $feedbackSurveyID the ID of the feedback survey linked to the email
     * @param int $folderIDV2 the ID of the folder where the email will be stored
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from
     * @param bool $jitterSendTime determines whether the email send time should be randomized to avoid sending all emails at the exact same time
     * @param Language|value-of<Language> $language the language code for the email, such as 'en' for English
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param State|value-of<State> $state the email state
     * @param Subcategory|value-of<Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to
     * @param PublicWebversionDetails|PublicWebversionDetailsShape $webversion
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        PublicEmailContent|array|null $content = null,
        ?string $feedbackSurveyID = null,
        ?int $folderIDV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?string $name = null,
        ?\DateTimeInterface $publishDate = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        PublicWebversionDetails|array|null $webversion = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Change properties of a marketing email.
     *
     * @param string $emailID Path param
     * @param bool $archived body param: Determines if the email is archived or not
     * @param string $activeDomain body param: The active domain of the email
     * @param int $businessUnitID body param: The ID of the business unit associated with the email
     * @param string $campaign body param: The ID of the campaign this email is associated to
     * @param PublicEmailContent|PublicEmailContentShape $content Body param
     * @param int $folderIDV2 body param: The ID of the folder where the email will be stored
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from Body param
     * @param bool $jitterSendTime body param: Determines whether the email send time should be randomized to avoid sending all emails at the exact same time
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\Language|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\Language> $language body param: The language code for the email, such as 'en' for English
     * @param string $name body param: The name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate Body param: The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData Body param
     * @param bool $sendOnPublish body param: Determines whether the email will be sent immediately on publish
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\State|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\State> $state body param: The email state
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory> $subcategory body param: The email subcategory
     * @param string $subject body param: The subject of the email
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails Body param
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing Body param
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to Body param
     * @param PublicWebversionDetails|PublicWebversionDetailsShape $webversion Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        ?bool $archived = null,
        ?string $activeDomain = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        PublicEmailContent|array|null $content = null,
        ?int $folderIDV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $jitterSendTime = null,
        \HubspotSDK\Marketing\Emails\EmailUpdateParams\Language|string|null $language = null,
        ?string $name = null,
        ?\DateTimeInterface $publishDate = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        \HubspotSDK\Marketing\Emails\EmailUpdateParams\State|string|null $state = null,
        \HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        PublicWebversionDetails|array|null $webversion = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $includedProperties
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param Type|value-of<Type> $type
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicEmail>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?string $campaign = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $isPublished = null,
        ?int $limit = null,
        ?bool $marketingCampaignNames = null,
        ?\DateTimeInterface $publishedAfter = null,
        ?\DateTimeInterface $publishedAt = null,
        ?\DateTimeInterface $publishedBefore = null,
        ?array $sort = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        ?bool $variantStats = null,
        ?bool $workflowNames = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
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
                'publishedAfter' => $publishedAfter,
                'publishedAt' => $publishedAt,
                'publishedBefore' => $publishedBefore,
                'sort' => $sort,
                'type' => $type,
                'updatedAfter' => $updatedAfter,
                'updatedAt' => $updatedAt,
                'updatedBefore' => $updatedBefore,
                'variantStats' => $variantStats,
                'workflowNames' => $workflowNames,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a marketing email by its ID
     *
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This will create a duplicate email with the same properties as the original, with the exception of a unique ID.
     *
     * @param string $id the email ID
     * @param string $cloneName the name to assign to the cloned email
     * @param string $language the language code for the cloned email, such as 'en' for English
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function clone(
        string $id,
        ?string $cloneName = null,
        ?string $language = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            ['id' => $id, 'cloneName' => $cloneName, 'language' => $language]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clone(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a variation of a marketing email for an A/B test. The new variation will be created as a draft. If an active variation already exists, a new one won't be created.
     *
     * @param string $contentID ID of the object to test
     * @param string $variationName name of A/B test variation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        string $contentID,
        string $variationName,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            ['contentID' => $contentID, 'variationName' => $variationName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAbTestVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
     *
     * @param list<int> $emailIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        ?string $property = null,
        ?string $startTimestamp = null,
        RequestOptions|array|null $requestOptions = null,
    ): AggregateEmailStatistics {
        $params = Util::removeNulls(
            [
                'emailIDs' => $emailIDs,
                'endTimestamp' => $endTimestamp,
                'property' => $property,
                'startTimestamp' => $startTimestamp,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint lets you obtain the variation of an A/B marketing email. If the email is variation A (master) it will return variation B (variant) and vice versa.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $includedProperties
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        ?bool $archived = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $marketingCampaignNames = null,
        ?bool $variantStats = null,
        ?bool $workflowNames = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'includedProperties' => $includedProperties,
                'includeStats' => $includeStats,
                'marketingCampaignNames' => $marketingCampaignNames,
                'variantStats' => $variantStats,
                'workflowNames' => $workflowNames,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAbTestVariation($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the draft version of an email (if it exists). If no draft version exists, the published email is returned.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): PublicEmail {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraft($emailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get aggregated statistics in intervals for a specified time span. Each interval contains aggregated statistics of the emails that were sent in that time.
     *
     * @param list<int> $emailIDs
     * @param Interval|value-of<Interval> $interval
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getHistogram(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        Interval|string|null $interval = null,
        ?string $startTimestamp = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseWithTotalEmailStatisticInterval {
        $params = Util::removeNulls(
            [
                'emailIDs' => $emailIDs,
                'endTimestamp' => $endTimestamp,
                'interval' => $interval,
                'startTimestamp' => $startTimestamp,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getHistogram(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific revision of a marketing email.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        string $emailID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmailVersion {
        $params = Util::removeNulls(['emailID' => $emailID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of all versions of a marketing email, with each entry including the full state of that particular version. To view the most recent version, sort by the updatedAt parameter.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<VersionPublicEmail>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $emailID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRevisions($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to publish an automated email or send/schedule a regular email.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function publish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->publish($emailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resets the draft back to a copy of the live object.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resetDraft($emailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email. The current revision becomes old, and the restored revision is given a new version number.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        string $emailID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['emailID' => $emailID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email to DRAFT state. If there is currently something in the draft for that object, it is overwritten.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        string $emailID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(['emailID' => $emailID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreRevisionToDraft($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to unpublish an automated email or cancel a regular email. If the email is already in the process of being sent, canceling might not be possible.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unpublish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unpublish($emailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create or update the draft version of a marketing email. If no draft exists, the system creates a draft from the current “live” email then applies the request body to that draft. The draft version only lives on the buffer—the email is not cloned.
     *
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param int $businessUnitID the ID of the business unit associated with the email
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent|PublicEmailContentShape $content
     * @param int $folderIDV2 the ID of the folder where the email will be stored
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from
     * @param bool $jitterSendTime determines whether the email send time should be randomized to avoid sending all emails at the exact same time
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Language|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Language> $language the language code for the email, such as 'en' for English
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\State|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\State> $state the email state
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to
     * @param PublicWebversionDetails|PublicWebversionDetailsShape $webversion
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateDraft(
        string $emailID,
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        PublicEmailContent|array|null $content = null,
        ?int $folderIDV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $jitterSendTime = null,
        \HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Language|string|null $language = null,
        ?string $name = null,
        ?\DateTimeInterface $publishDate = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        \HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\State|string|null $state = null,
        \HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        PublicWebversionDetails|array|null $webversion = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateDraft($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
