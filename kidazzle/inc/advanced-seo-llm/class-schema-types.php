<?php
/**
 * Schema Types Definition Library
 * Defines supported Schema.org types and their fields for the Modular Schema Builder.
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class kidazzle_Schema_Types
{
    /**
     * Get all supported schema definitions
     * 
     * @return array
     */
    public static function get_definitions()
    {
        return [
            'Article' => self::get_article_schema(),
            'BlogPosting' => self::get_article_schema(), // Inherits from Article
            'NewsArticle' => self::get_article_schema(), // Inherits from Article
            'LocalBusiness' => self::get_local_business_schema(),
            'Organization' => self::get_organization_schema(),
            'Person' => self::get_person_schema(),
            'Event' => self::get_event_schema(),
            'Service' => self::get_service_schema(),
            'Product' => self::get_product_schema(),
            'Review' => self::get_review_schema(),
            'FAQPage' => self::get_faq_page_schema(),
            'JobPosting' => self::get_job_posting_schema(),
            'HowTo' => self::get_howto_schema(),
            'VideoObject' => self::get_video_object_schema(),
            'ChildCare' => self::get_childcare_schema(),
        ];
    }

    /**
     * ChildCare (Inherits from LocalBusiness)
     */
    private static function get_childcare_schema()
    {
        $schema = self::get_local_business_schema();
        $schema['label'] = 'Child Care / Preschool';
        return $schema;
    }



    /**
     * Article / BlogPosting / NewsArticle
     */
    private static function get_article_schema()
    {
        return [
            'label' => 'Article / Blog Post',
            'fields' => [
                'headline' => [
                    'type' => 'text',
                    'label' => 'Headline',
                    'description' => 'The title of the article. Keep it concise (under 110 chars) and engaging.'
                ],
                'description' => [
                    'type' => 'textarea',
                    'label' => 'Description',
                    'description' => 'A short summary of the article content. Often used as the meta description.'
                ],
                'image' => [
                    'type' => 'image',
                    'label' => 'Image URL',
                    'description' => 'URL of the primary image representing the article. Should be at least 1200px wide.'
                ],
                'author_name' => [
                    'type' => 'text',
                    'label' => 'Author Name',
                    'description' => 'The name of the person or organization who wrote the article.'
                ],
                'datePublished' => [
                    'type' => 'date',
                    'label' => 'Date Published',
                    'description' => 'The date and time the article was first published (ISO 8601 format).'
                ],
                'dateModified' => [
                    'type' => 'date',
                    'label' => 'Date Modified',
                    'description' => 'The date and time the article was last modified.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name (e.g. "award")'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * LocalBusiness
     */
    private static function get_local_business_schema()
    {
        return [
            'label' => 'Local Business',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Business Name',
                    'description' => 'The official name of the business.'
                ],
                'image' => [
                    'type' => 'image',
                    'label' => 'Image URL',
                    'description' => 'An image of the business (e.g., storefront, logo).'
                ],
                'telephone' => [
                    'type' => 'text',
                    'label' => 'Telephone',
                    'description' => 'The primary phone number for the business.'
                ],
                'email' => [
                    'type' => 'text',
                    'label' => 'Email',
                    'description' => 'The primary email address for the business.'
                ],
                'priceRange' => [
                    'type' => 'text',
                    'label' => 'Price Range',
                    'description' => 'The price range of the business, e.g., "$$" or "$$$".'
                ],
                'streetAddress' => [
                    'type' => 'text',
                    'label' => 'Street Address',
                    'description' => 'The street address (e.g., 123 Main St).'
                ],
                'addressLocality' => [
                    'type' => 'text',
                    'label' => 'City',
                    'description' => 'The city or locality.'
                ],
                'addressRegion' => [
                    'type' => 'text',
                    'label' => 'State/Region',
                    'description' => 'The state or region code (e.g., GA).'
                ],
                'postalCode' => [
                    'type' => 'text',
                    'label' => 'Postal Code',
                    'description' => 'The postal or zip code.'
                ],
                'geo_lat' => [
                    'type' => 'text',
                    'label' => 'Latitude',
                    'description' => 'The latitude of the business location.'
                ],
                'geo_lng' => [
                    'type' => 'text',
                    'label' => 'Longitude',
                    'description' => 'The longitude of the business location.'
                ],
                'url' => [
                    'type' => 'text',
                    'label' => 'Website URL',
                    'description' => 'The URL of the business website.'
                ],
                'openingHours' => [
                    'type' => 'repeater',
                    'label' => 'Opening Hours',
                    'description' => 'Add opening hours (e.g., "Mo-Fr 09:00-17:00").',
                    'subfields' => [
                        'dayOfWeek' => ['type' => 'text', 'label' => 'Days (e.g., Mo-Fr)'],
                        'opens' => ['type' => 'text', 'label' => 'Opens (e.g., 09:00)'],
                        'closes' => ['type' => 'text', 'label' => 'Closes (e.g., 17:00)']
                    ]
                ],
                'sameAs' => [
                    'type' => 'textarea',
                    'label' => 'Social Profiles (SameAs)',
                    'description' => 'Comma-separated list of social media profile URLs.'
                ],
                'areaServed' => [
                    'type' => 'text',
                    'label' => 'Area Served',
                    'description' => 'The geographic area where the service is provided.'
                ],
                'paymentAccepted' => [
                    'type' => 'text',
                    'label' => 'Payment Accepted',
                    'description' => 'Cash, Credit Card, etc.'
                ],
                'currenciesAccepted' => [
                    'type' => 'text',
                    'label' => 'Currencies Accepted',
                    'description' => 'e.g. USD'
                ],
                'logo' => [
                    'type' => 'image',
                    'label' => 'Logo URL',
                    'description' => 'URL of the business logo.'
                ],
                'hasMap' => [
                    'type' => 'text',
                    'label' => 'Map URL',
                    'description' => 'URL to a map of the location.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]

            ]
        ];
    }

    /**
     * Organization
     */
    private static function get_organization_schema()
    {
        return [
            'label' => 'Organization',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Organization Name',
                    'description' => 'The name of the organization.'
                ],
                'url' => [
                    'type' => 'text',
                    'label' => 'URL',
                    'description' => 'The URL of the organization\'s website.'
                ],
                'logo' => [
                    'type' => 'image',
                    'label' => 'Logo URL',
                    'description' => 'URL of the organization\'s logo.'
                ],
                'sameAs' => [
                    'type' => 'textarea',
                    'label' => 'Social Profiles (SameAs)',
                    'description' => 'Comma-separated list of social media profile URLs.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * Person
     */
    private static function get_person_schema()
    {
        return [
            'label' => 'Person',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Name',
                    'description' => 'The full name of the person.'
                ],
                'jobTitle' => [
                    'type' => 'text',
                    'label' => 'Job Title',
                    'description' => 'The job title of the person.'
                ],
                'image' => [
                    'type' => 'image',
                    'label' => 'Image URL',
                    'description' => 'URL of a photo of the person.'
                ],
                'url' => [
                    'type' => 'text',
                    'label' => 'URL',
                    'description' => 'URL to the person\'s website or profile page.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * Event
     */
    private static function get_event_schema()
    {
        return [
            'label' => 'Event',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Event Name',
                    'description' => 'The name of the event.'
                ],
                'startDate' => [
                    'type' => 'date',
                    'label' => 'Start Date',
                    'description' => 'The start date and time of the event (ISO 8601).'
                ],
                'endDate' => [
                    'type' => 'date',
                    'label' => 'End Date',
                    'description' => 'The end date and time of the event (ISO 8601).'
                ],
                'description' => [
                    'type' => 'textarea',
                    'label' => 'Description',
                    'description' => 'A description of the event.'
                ],
                'location_name' => [
                    'type' => 'text',
                    'label' => 'Location Name',
                    'description' => 'The name of the venue or location.'
                ],
                'location_address' => [
                    'type' => 'text',
                    'label' => 'Location Address',
                    'description' => 'The address of the venue.'
                ],
                'image' => [
                    'type' => 'image',
                    'label' => 'Image URL',
                    'description' => 'URL of an image representing the event.'
                ],
                'offers' => [
                    'type' => 'repeater',
                    'label' => 'Offers (Tickets)',
                    'description' => 'Ticket information.',
                    'subfields' => [
                        'name' => ['type' => 'text', 'label' => 'Ticket Name'],
                        'price' => ['type' => 'text', 'label' => 'Price'],
                        'priceCurrency' => ['type' => 'text', 'label' => 'Currency (USD)'],
                        'url' => ['type' => 'text', 'label' => 'Ticket URL']
                    ]
                ],
                'organizer' => [
                    'type' => 'text',
                    'label' => 'Organizer Name',
                    'description' => 'The name of the organizer.'
                ],
                'eventStatus' => [
                    'type' => 'text',
                    'label' => 'Event Status',
                    'description' => 'e.g. https://schema.org/EventScheduled'
                ],
                'eventAttendanceMode' => [
                    'type' => 'text',
                    'label' => 'Attendance Mode',
                    'description' => 'e.g. https://schema.org/OfflineEventAttendanceMode'
                ],
                'performer' => [
                    'type' => 'text',
                    'label' => 'Performer',
                    'description' => 'Name of the performer.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * Service
     */
    private static function get_service_schema()
    {
        return [
            'label' => 'Service',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Service Name',
                    'description' => 'The name of the service provided.'
                ],
                'serviceType' => [
                    'type' => 'text',
                    'label' => 'Service Type',
                    'description' => 'The type of service (e.g., "Childcare", "Plumbing").'
                ],
                'provider_name' => [
                    'type' => 'text',
                    'label' => 'Provider Name',
                    'description' => 'The name of the organization providing the service.'
                ],
                'areaServed' => [
                    'type' => 'text',
                    'label' => 'Area Served',
                    'description' => 'The geographic area where the service is provided.'
                ],
                'description' => [
                    'type' => 'textarea',
                    'label' => 'Description',
                    'description' => 'A description of the service.'
                ],
                'offers' => [
                    'type' => 'repeater',
                    'label' => 'Offers',
                    'description' => 'Service pricing.',
                    'subfields' => [
                        'price' => ['type' => 'text', 'label' => 'Price'],
                        'priceCurrency' => ['type' => 'text', 'label' => 'Currency']
                    ]
                ],
                'termsOfService' => [
                    'type' => 'text',
                    'label' => 'Terms of Service URL',
                    'description' => 'URL to terms of service.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * Product
     */
    private static function get_product_schema()
    {
        return [
            'label' => 'Product',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Product Name',
                    'description' => 'The name of the product.'
                ],
                'image' => [
                    'type' => 'image',
                    'label' => 'Image URL',
                    'description' => 'URL of an image of the product.'
                ],
                'description' => [
                    'type' => 'textarea',
                    'label' => 'Description',
                    'description' => 'A description of the product.'
                ],
                'brand' => [
                    'type' => 'text',
                    'label' => 'Brand',
                    'description' => 'The brand of the product.'
                ],
                'sku' => [
                    'type' => 'text',
                    'label' => 'SKU',
                    'description' => 'Stock Keeping Unit identifier.'
                ],
                'price' => [
                    'type' => 'text',
                    'label' => 'Price',
                    'description' => 'The price of the product.'
                ],
                'priceCurrency' => [
                    'type' => 'text',
                    'label' => 'Currency',
                    'description' => 'The currency code (e.g., USD).'
                ],
                'offers' => [
                    'type' => 'repeater',
                    'label' => 'Offers',
                    'description' => 'Product offers.',
                    'subfields' => [
                        'price' => ['type' => 'text', 'label' => 'Price'],
                        'priceCurrency' => ['type' => 'text', 'label' => 'Currency'],
                        'availability' => ['type' => 'text', 'label' => 'Availability (e.g. InStock)']
                    ]
                ],
                'aggregateRating' => [
                    'type' => 'text',
                    'label' => 'Aggregate Rating',
                    'description' => 'Overall rating value.'
                ],
                'review' => [
                    'type' => 'repeater',
                    'label' => 'Reviews',
                    'description' => 'Product reviews.',
                    'subfields' => [
                        'author' => ['type' => 'text', 'label' => 'Author'],
                        'reviewRating' => ['type' => 'text', 'label' => 'Rating'],
                        'reviewBody' => ['type' => 'textarea', 'label' => 'Review Body']
                    ]
                ],
                'mpn' => [
                    'type' => 'text',
                    'label' => 'MPN',
                    'description' => 'Manufacturer Part Number.'
                ],
                'gtin' => [
                    'type' => 'text',
                    'label' => 'GTIN',
                    'description' => 'Global Trade Item Number.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * Review
     */
    private static function get_review_schema()
    {
        return [
            'label' => 'Review',
            'fields' => [
                'itemReviewed_name' => [
                    'type' => 'text',
                    'label' => 'Item Reviewed',
                    'description' => 'The name of the item being reviewed.'
                ],
                'author_name' => [
                    'type' => 'text',
                    'label' => 'Author Name',
                    'description' => 'The name of the reviewer.'
                ],
                'reviewRating' => [
                    'type' => 'text',
                    'label' => 'Rating Value',
                    'description' => 'The numeric rating given (e.g., 5).'
                ],
                'bestRating' => [
                    'type' => 'text',
                    'label' => 'Best Rating',
                    'description' => 'The highest possible rating (usually 5).'
                ],
                'reviewBody' => [
                    'type' => 'textarea',
                    'label' => 'Review Body',
                    'description' => 'The actual text of the review.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * FAQPage
     */
    private static function get_faq_page_schema()
    {
        return [
            'label' => 'FAQ Page',
            'fields' => [
                'questions' => [
                    'type' => 'repeater',
                    'label' => 'Questions & Answers',
                    'description' => 'Add question and answer pairs.',
                    'subfields' => [
                        'question' => ['type' => 'text', 'label' => 'Question'],
                        'answer' => ['type' => 'textarea', 'label' => 'Answer']
                    ]
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * JobPosting
     */
    private static function get_job_posting_schema()
    {
        return [
            'label' => 'Job Posting',
            'fields' => [
                'title' => [
                    'type' => 'text',
                    'label' => 'Job Title',
                    'description' => 'The title of the job.'
                ],
                'description' => [
                    'type' => 'textarea',
                    'label' => 'Description',
                    'description' => 'The full description of the job.'
                ],
                'datePosted' => [
                    'type' => 'date',
                    'label' => 'Date Posted',
                    'description' => 'The date the job was posted.'
                ],
                'validThrough' => [
                    'type' => 'date',
                    'label' => 'Valid Through',
                    'description' => 'The date after which the job posting is no longer valid.'
                ],
                'employmentType' => [
                    'type' => 'text',
                    'label' => 'Employment Type',
                    'description' => 'Type of employment (e.g., FULL_TIME, PART_TIME).'
                ],
                'hiringOrganization_name' => [
                    'type' => 'text',
                    'label' => 'Hiring Organization',
                    'description' => 'The name of the organization hiring.'
                ],
                'baseSalary' => [
                    'type' => 'text',
                    'label' => 'Base Salary',
                    'description' => 'Salary information.'
                ],
                'jobLocation' => [
                    'type' => 'text',
                    'label' => 'Job Location',
                    'description' => 'Location of the job.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * HowTo
     */
    private static function get_howto_schema()
    {
        return [
            'label' => 'How-To',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Name',
                    'description' => 'The name of the How-To guide.'
                ],
                'description' => [
                    'type' => 'textarea',
                    'label' => 'Description',
                    'description' => 'A description of what this How-To teaches.'
                ],
                'steps' => [
                    'type' => 'repeater',
                    'label' => 'Steps',
                    'description' => 'The steps to complete the task.',
                    'subfields' => [
                        'name' => ['type' => 'text', 'label' => 'Step Name'],
                        'text' => ['type' => 'textarea', 'label' => 'Step Instructions'],
                        'image' => ['type' => 'image', 'label' => 'Step Image URL']
                    ]
                ],
                'totalTime' => [
                    'type' => 'text',
                    'label' => 'Total Time',
                    'description' => 'ISO 8601 duration (e.g. PT1H).'
                ],
                'supply' => [
                    'type' => 'text',
                    'label' => 'Supply',
                    'description' => 'Supplies needed.'
                ],
                'tool' => [
                    'type' => 'text',
                    'label' => 'Tool',
                    'description' => 'Tools needed.'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }

    /**
     * VideoObject
     */
    private static function get_video_object_schema()
    {
        return [
            'label' => 'Video Object',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Video Name',
                    'description' => 'The title of the video.'
                ],
                'description' => [
                    'type' => 'textarea',
                    'label' => 'Description',
                    'description' => 'A description of the video content.'
                ],
                'thumbnailUrl' => [
                    'type' => 'image',
                    'label' => 'Thumbnail URL',
                    'description' => 'URL of the video thumbnail image.'
                ],
                'uploadDate' => [
                    'type' => 'date',
                    'label' => 'Upload Date',
                    'description' => 'The date the video was uploaded.'
                ],
                'contentUrl' => [
                    'type' => 'text',
                    'label' => 'Content URL',
                    'description' => 'URL to the actual video file.'
                ],
                'embedUrl' => [
                    'type' => 'text',
                    'label' => 'Embed URL',
                    'description' => 'URL to embed the video (e.g., YouTube embed link).'
                ],
                'duration' => [
                    'type' => 'text',
                    'label' => 'Duration',
                    'description' => 'ISO 8601 duration (e.g. PT2M30S).'
                ],
                'custom_fields' => [
                    'type' => 'repeater',
                    'label' => 'Custom Fields',
                    'description' => 'Add any other Schema.org property.',
                    'subfields' => [
                        'key' => ['type' => 'text', 'label' => 'Property Name'],
                        'value' => ['type' => 'textarea', 'label' => 'Value']
                    ]
                ]
            ]
        ];
    }
}
