<?php

declare(strict_types=1);

namespace HubspotSDK\Meta\Origins\IPRange;

/**
 * The direction of the IP traffic, which can be INGRESS or EGRESS.
 */
enum Direction: string
{
    case EGRESS = 'EGRESS';

    case INGRESS = 'INGRESS';
}
