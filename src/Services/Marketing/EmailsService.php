<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;
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
use HubspotSDK\Services\Marketing\Emails\StatisticsService;

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
     * @api
     */
    public StatisticsService $statistics;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailsRawService($client);
        $this->statistics = new StatisticsService($client);
    }

    /**
     * @api
     *
     * Use this endpoint to create a new marketing email.
     *
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent|PublicEmailContentShape $content data structure representing the content of the email
     * @param string $feedbackSurveyID the ID of the feedback survey linked to the email
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from data structure representing the from fields on the email
     * @param Language|value-of<Language> $language
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param State|value-of<State> $state the email state
     * @param Subcategory|value-of<Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails data structure representing the subscription fields of the email
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing AB testing related data. This property is only returned for AB type emails.
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to data structure representing the to fields of the email
     * @param PublicWebversionDetails|PublicWebversionDetailsShape $webversion
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
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
     * @param string $emailID Path param: The ID of the marketing email that should get updated
     * @param bool $archived body param: Determines if the email is archived or not
     * @param string $activeDomain body param: The active domain of the email
     * @param int $businessUnitID Body param
     * @param string $campaign body param: The ID of the campaign this email is associated to
     * @param PublicEmailContent|PublicEmailContentShape $content body param: Data structure representing the content of the email
     * @param int $folderIDV2 Body param
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from body param: Data structure representing the from fields on the email
     * @param bool $jitterSendTime Body param
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\Language|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\Language> $language Body param
     * @param string $name body param: The name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate Body param: The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData body param: RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish body param: Determines whether the email will be sent immediately on publish
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\State|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\State> $state body param: The email state
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateParams\Subcategory> $subcategory body param: The email subcategory
     * @param string $subject body param: The subject of the email
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails body param: Data structure representing the subscription fields of the email
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing Body param: AB testing related data. This property is only returned for AB type emails.
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to body param: Data structure representing the to fields of the email
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
     * @param string $emailID the ID of the marketing email to delete
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
     * @param string $id the unique identifier of the email to be cloned
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
     * Get the details for a marketing email.
     *
     * @param string $emailID the marketing email ID
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $includedProperties limit the response to only include the specified properties
     * @param bool $includeStats include statistics with email
     * @param bool $marketingCampaignNames if set to true, loads `campaignName` and `campaignUtm`
     * @param bool $workflowNames if set to true, loads workflows in which the email is used within a "send email" action
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $emailID,
        ?bool $archived = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $marketingCampaignNames = null,
        ?bool $workflowNames = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'includedProperties' => $includedProperties,
                'includeStats' => $includeStats,
                'marketingCampaignNames' => $marketingCampaignNames,
                'workflowNames' => $workflowNames,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint lets you obtain the variation of an A/B marketing email. If the email is variation A (master) it will return variation B (variant) and vice versa.
     *
     * @param string $emailID the ID of an A/B marketing email
     * @param bool $archived Boolean variable to request archived email
     * @param list<string> $includedProperties List of properties to be returned in the API response
     * @param bool $includeStats Boolean variable to request stats to be returned in response
     * @param bool $marketingCampaignNames Boolean variable to request name of the campaign in response
     * @param bool $workflowNames Boolean variable to request name of the associated workflows in response
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
        ?bool $workflowNames = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicEmail {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'includedProperties' => $includedProperties,
                'includeStats' => $includeStats,
                'marketingCampaignNames' => $marketingCampaignNames,
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
     * @param string $emailID the marketing email ID
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
     * Get a specific revision of a marketing email.
     *
     * @param string $revisionID the ID of a revision
     * @param string $emailID the marketing email ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        string $emailID,
        RequestOptions|array|null $requestOptions = null,
    ): VersionPublicEmail {
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
     * @param string $emailID the marketing email ID
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before The cursor token value to get the previous set of results. You can get this from the `paging.prev.before` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to return. Default is 10.
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
     * @param string $emailID the marketing email ID
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
     * @param string $emailID the marketing email ID
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
     * @param string $revisionID the ID of a revision
     * @param string $emailID the marketing email ID
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
     * @param int $revisionID the ID of a revision
     * @param string $emailID the marketing email ID
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
     * @param string $emailID the ID of the email to unpublish
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
     * @param string $emailID the marketing email ID
     * @param string $activeDomain the active domain of the email
     * @param bool $archived determines if the email is archived or not
     * @param string $campaign the ID of the campaign this email is associated to
     * @param PublicEmailContent|PublicEmailContentShape $content data structure representing the content of the email
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from data structure representing the from fields on the email
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Language|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Language> $language
     * @param string $name the name of the email, as displayed on the email dashboard
     * @param \DateTimeInterface $publishDate The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData RSS related data if it is a blog or rss email
     * @param bool $sendOnPublish determines whether the email will be sent immediately on publish
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\State|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\State> $state the email state
     * @param \HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory|value-of<\HubspotSDK\Marketing\Emails\EmailUpdateDraftParams\Subcategory> $subcategory the email subcategory
     * @param string $subject the subject of the email
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails data structure representing the subscription fields of the email
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing AB testing related data. This property is only returned for AB type emails.
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to data structure representing the to fields of the email
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
