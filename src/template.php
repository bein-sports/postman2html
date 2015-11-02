<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>beIN SPORTS REST API</title>

    <!-- Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css"/>

    <style>
        #affix-nav .nav li:not(.active) .nav {
            display: none;
        }
        .nav>li>a {
            padding: 2px 15px;
        }
        pre {
            border: inherit;
            border-radius: inherit;
            background-color: inherit;
            padding: inherit;
        }
        table{
            border: 1px solid #ddd;
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            background-color: transparent;
            border-spacing: 0;
            border-collapse: collapse;
        }
        table>thead>tr>th, table>tbody>tr>th, table>tfoot>tr>th, table>thead>tr>td, table>tbody>tr>td, table>tfoot>tr>td {
            border: 1px solid #ddd;
        }
        table>thead>tr>th, table>tbody>tr>th, table>tfoot>tr>th, table>thead>tr>td, table>tbody>tr>td, table>tfoot>tr>td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/monokai.min.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Prefetch DNS -->
    <link rel="dns-prefetch" href="cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="fonts.googleapis.com">
</head>
<body data-spy="scroll" data-target="#affix-nav">
{% verbatim %}
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <nav id="affix-nav" data-spy="affix" data-offset-top="10">
                <h4 class="text-info">General notes</h4>
                <ul class="nav">
                    <li>
                        <a href="#gn_voc">Vocabulary</a>
                    </li>
                    <li>
                        <a href="#gn_utf8">UTF-8 encoding</a>
                    </li>
                    <li>
                        <a href="#gn_htuf">How to use filters</a>
                    </li>
                    <li>
                        <a href="#gn_ar">Application Roles</a>
                    </li>
                    <li>
                        <a href="#gn_gs">Getting Started</a>
                    </li>
                    <li>
                        <a href="#gn_rwe">Real world example</a>
                    </li>
                    <li>
                        <a href="#gn_pa">Partners account</a>
                    </li>
                </ul>
                <h4 class="text-info">Endpoints</h4>
                <ul class="nav">
                    <?php foreach ($collection->folders() as $folder): ?>
                        <li>
                            <a href="#<?= $folder->name === 'Login' ? 'login' : $folder->id ?>"><?= $folder->name ?></a>
                            <ul class="nav">
                                <?php foreach ($folder->requests() as $request): ?>
                                    <li>
                                        <a href="#<?= $request->id ?>"><kbd><?= $request->method ?></kbd> <?= $request->name ?>
                                        </a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
        <div class="col-sm-9">
            <h1 >beIN SPORTS REST API Overview</h1>
            <h2 class="page-header">General notes</h2>
            <div>
                <p>The beIN SPORTS API is organized around <a href="https://fr.wikipedia.org/wiki/Representational_State_Transfer">REST</a>.
                Our API is designed to have predictable, resource-oriented URLs and to use <a href="https://en.wikipedia.org/wiki/List_of_HTTP_status_codes">HTTP response codes</a> to indicate API errors.
                We use built-in HTTP features, like <a href="http://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html">HTTP verbs</a>, which can be understood by off-the-shelf HTTP clients.
                For all responses, Api always return <a href="http://json-ld.org/">JSON-LD</a> content (application/ld+json).
                </p>
                <p>The beIN SPORTS REST API provides programmatic access to read and write beIN SPORTS Api data (read or write content, media and more) with <a href="http://www.hydra-cg.com/">Hydra Core Vocabulary web standards</a>.</p>
            </div>
            <div>
                <h3 id="gn_voc">Vocabulary</h3>
                <ul>
                    <li><p>{{host}} </p>
                        <p>This placeholder represent base url of api like:</p>
                        <ul>
                            <li>https://api.beinsports.com (production)</li>
                            <li>https://api-pp.beinsports.com (pre-production)</li>
                            <li>https://api-uat.beinsports.com (user acceptance testing)</li>
                            <li>https://api-int.beinsports.com (integration)</li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li><p>{{token}}</p>
                        <p>This placeholder represent user API auth Token, it's a long string like:</p>
                    </li>
                    <ul>
                        <li>eY4NzUsInVzZXJuYW1lIjoiYmVpbi1hcGlAc21pbGUuZnIiLCJ1c2VyX2lkIjo0MCwidXNlciI6RiM8HrkEuyjUPlbCyKyKV9H14uKh6WuMNYK3Jy4zr9hrcVRE-7i5G-yGLyx83MP7_55BJswMk2QCtBWHan-43M</li>
                    </ul>
                </ul>
                <ul>
                    <li><p>{{content_type}}</p>
                        <p>This placeholder represent content type header. This value must be fixed to
                            <strong>'application/json;charset=UTF-8'</strong></p>
                    </li>
                </ul>
                <ul>
                    <li><p>{{id}}</p>
                        <p>This placeholder represent numerical identifier of Entity. </p>
                    </li>
                </ul>

                <h3 id="gn_utf8">UTF-8 encoding</h3>
                <ul>
                    <li>
                        <p>Every string passed to and from the beIN SPORTS API needs to be UTF-8 encoded</p>
                    </li>
                </ul>

                <h3 id="gn_htuf">How to use filters</h3>
                    <p>Filters may be enabled on each exposed API endpoint. When available, they allow to apply a filter on a whitelisted property of the entity.
                        If the property is not whitelisted, the filter applied on this property has no effect.
                        If a filter is available on an API endpoint, the kind of filter is mentionned with the list of whitelisted attributes.
                    </p>
                <h4 id="">Filter results</h4>

                <ul>
                    <li><p>Syntax</p>
                        <p>
                            <code>{hostname}/endpoint?filterArg1=fileterArg1Value&amp;filterArg2=fileterArg2Value&amp;...&amp;filterArgN=fileterArgNValue</code>
                        </p>
                        <p>
                            Where <strong>filterArg1</strong>, <strong>filterArg2</strong>, <strong>filterArgN</strong> are filters argument and <strong>fileterArg1Value</strong>, <strong>fileterArg2Value</strong>, <strong>fileterArgNValue</strong> are filters value.
                            If you want use a null value for filter, use <code>null</code> as a value, <code>{hostname}/endpoint?filterArg1=null</code>.
                            Also, if you want use a boolean value true or false for filter, use <code>1 or 0</code>.
                        </p>
                    </li>
                    <li><p>Examples</p>
                        <ul>
                            <li>
                                <p>Get a content collection from a specific site.</p>
                                <p><code>{hostname}/contents?site=2</code></p>
                                <p>This api can accept <strong>id</strong> or <strong>uri</strong></p>
                                <p><code>{hostname}/contents?site=/sites/2</code> is equivalent to <code>{hostname}/contents?site=2</code></p>
                            </li>
                            <li>
                                <p>Get a content collection published *before* a specific *date*.</p>
                                <p><code>{hostname}/contents?publishedAt[before]=1980-11-09T04:15:30</code></p>
                                <p>To search before a date: <code>?publishedAt[before]=date-value</code></p>
                                <p>To search after a date: <code>?publishedAt[after]=date-value</code></p>
                                <p>You can also search between two dates : <code>?publishedAt[before]=date-value1&publishedAt[after]=date-value0</code></p>
                            </li>
                            <li>
                                <p>You can also combine filters.</p>
                                <p><code>{hostname}/contents?site=2&publishedAt[before]=1980-11-09T04:15:30</code></p>
                            </li>
                        </ul>
                    </li>
                </ul>

                <h4 id="">Sort results</h4>
                <ul>
                    <li><p>Syntax</p>
                        <p>
                            <code>{hostname}/endpoint?order[propertyName]=value</code>
                        </p>
                        <p>
                            where <code>propertyName</code> is a valid property<code>value</code> can be <code>asc</code> or <code>desc</code> (case insensitive).
                        </p>
                    </li>
                    <li><p>Examples</p>
                        <ul>
                            <li>
                                <p>Get a content collection from a specific site.</p>
                                <p><code>{hostname}/contents?site=2</code></p>
                                <p>or</p>
                                <p><code>{hostname}/contents?site=/site/2</code> We have replaced site identifier by site uri</p>
                            </li>
                        </ul>
                    </li>
                </ul>

                <h3  id="gn_ar"></h3>
                </p>
                {% endverbatim %}
                {{ include('AppBundle:Documentation:roles.html.twig') }}
                {% verbatim %}
                <h3  id="gn_gs">Getting Started</h3>

                <ul>
                    <li>
                        <p>Authenticate: Get a fresh api token</p>
                        <p>You can do this from <strong>Login</strong> endpoint with your login and password account.</p>
                    </li>
                    <li>
                        <p>Include your token in all other requests</p>
                        <p>For <strong>POST</strong> queries, keep in mind that <strong>you are not forced to provide all the fields</strong> that make up the object, but <strong>only</strong> those that are rated <strong>mandatory</strong>, for <strong>PUT</strong> you can just provide updated fields.</p>
                        <ul>
                            <li>
                                <p><strong>GET</strong> content collection example</p>
                                <pre><code class="language-bash">curl 'https://api-int.beinsports.com/contents'  -H 'Authorization: Bearer eY4NzUsInVzZXJuYW1lIjoiYmVpbi1hcGlAc21pbGUuZnIiLCJ1c2VyX2lkIjo0MCwidXNlciI6RiM8HrkEuyjUPlbCyKyKV9H14uKh6WuMNYK3Jy4zr9hrcVRE-7i5G-yGLyx83MP7_55BJswMk2QCtBWHan-43M'</code></pre>
                                <pre><code class="language-js">{
    @context: "/contexts/Content",
    @id: "/contents?category",
    @type: "hydra:PagedCollection",
    hydra:nextPage: "/contents?page=2",
    hydra:totalItems: 7803,
    hydra:itemsPerPage: 30,
    hydra:firstPage: "/contents",
    hydra:lastPage: "/contents?page=261",
    hydra:member: [
        {
        @id: "/contents/83743",
        @type: "Content",
        author: null,
        authorName: null,
        body: "string",
        channels: [],
        createdAt: "2015-08-27T00:14:40+00:00",
        deletedAt: null,
        expiredAt: "2015-10-03T14:07:00+00:00",
        externalId: "1ccgojyiw79vh1rnpw5nnoawnu",
        externalUrl: null,
        featured: false,
        featuredMedia: {
            @id: "/media/161569",
            @type: "Media",
            type: 1,
            provider: "omnisport",
            uri: "rogerschmidt-cropped_1p85anpusaluh1mhvzysr0xr9k.jpg",
            altText: "RogerSchmidt - Cropped",
            caption: "Bayer Leverkusen coach Roger Schmidt",
            credit: "AFP",
            source: "AFP",
            externalUrl: "http://images.performgroup.com/di/library/omnisk.jpg?t=1816315535",
            context: {
                thumbnail_resized_800: "http://images.beinsports.com/DQ5ls2C4L0l_zli3N0xr9k.jpg"
            },
            author: null,
            externalId: "enls943kyqx81e0exjirq8ngd",
            createdAt: "2015-08-27T00:55:02+00:00",
            updatedAt: "2015-08-27T00:55:02+00:00"
        },
        headline: "Leverkusen can challenge best - Schmidt",
        media: [],
        parent: "/contents/83742",
        provider: "omnisport",
        publishedAt: "2015-08-27T00:54:13+00:00",
        reason: null,
        shortHeadline: "Schmidt: Leverkusen can challenge",
        site: "/sites/4",
        slug: "leverkusen-can-challenge-best-schmidt-1",
        status: 5,
        subHead: "Leverkusen can challenge best - Schmidt",
        taxonomy: [],
        teaser: "A delighted Roger Schmidt is eyeing a run at play-off.",
        type: 1,
        updatedAt: "2015-10-14T10:10:54+00:00",
        defaultCategory: {
            @id: "/taxonomies/556",
            @type: "Taxonomy",
            context: {
            tag_header_id: 176111452,
            tag_header_div: 416422374220949200,
            tag_outpage_id: 872077766980069000,
            opta-competition: 8,
            opta-season: 2015
        },
        websiteUrl: "en/football/news/leverkusen-can-challenge-best-schmidt-1/83743",
        lockedBy: 40,
        lockedAt: "2015-10-14T10:11:44+00:00",
        lockedByUsername: ""
        },
        {},
        {},
        ...
        {}
    ]
}</code></pre>

                            </li>
                            <li>
                                <p><strong>GET</strong> a specific content example</p>
                                <pre><code class="language-bash">curl 'https://api-int.beinsports.com/contents/83743'  -H 'Authorization: Bearer eY4NzUsInVzZXJuYW1lIjoiYmVpbi1hcGlAc21pbGUuZnIiLCJ1c2VyX2lkIjo0MCwidXNlciI6RiM8HrkEuyjUPlbCyKyKV9H14uKh6WuMNYK3Jy4zr9hrcVRE-7i5G-yGLyx83MP7_55BJswMk2QCtBWHan-43M'</code></pre>
                                <pre><code class="language-js">{
    @context: "/contexts/Content",
    @id: "/contents/83743",
    @type: "Content",
    author: null,
    authorName: null,
    body: "string",
    channels: [
        {
            @id: "/channels/1",
            @type: "Channel",
            name: "website"@id: "/channels/1",
            @type: "Channel",
            name: "website"
        }
    ],
    createdAt: "2015-08-27T00:14:40+00:00",
    deletedAt: null,
    expiredAt: "2015-10-03T14:07:00+00:00",
    externalId: "1ccgojyiw79vh1rnpw5nnoawnu",
    externalUrl: null,
    featured: false,
    featuredMedia: {
        @id: "/media/161569",
        @type: "Media",
        type: 1,
        provider: "omnisport",
        uri: "rogerschmidt-cropped_1p85anpusaluh1mhvzysr0xr9k.jpg",
        altText: "RogerSchmidt - Cropped",
        caption: "Bayer Leverkusen coach Roger Schmidt",
        credit: "AFP",
        source: "AFP",
        externalUrl: "http://images.performgroup.com/di/library/omnisk.jpg?t=1816315535",
        context: {
            thumbnail_resized_800: "http://images.beinsports.com/DQ5ls2C4L0l_zli3N0xr9k.jpg"
        },
        author: null,
        externalId: "enls943kyqx81e0exjirq8ngd",
        createdAt: "2015-08-27T00:55:02+00:00",
        updatedAt: "2015-08-27T00:55:02+00:00"
    },
    headline: "Leverkusen can challenge best - Schmidt",
    media: [],
    parent: "/contents/83742",
    provider: "omnisport",
    publishedAt: "2015-08-27T00:54:13+00:00",
    reason: null,
    shortHeadline: "Schmidt: Leverkusen can challenge",
    site: "/sites/4",
    slug: "leverkusen-can-challenge-best-schmidt-1",
    status: 5,
    subHead: "Leverkusen can challenge best - Schmidt",
    taxonomy: [],
    teaser: "A delighted Roger Schmidt is eyeing a run at play-off.",
    type: 1,
    updatedAt: "2015-10-14T10:10:54+00:00",
    defaultCategory: {
        @id: "/taxonomies/556",
        @type: "Taxonomy",
        context: {
        tag_header_id: 176111452,
        tag_header_div: 416422374220949200,
        tag_outpage_id: 872077766980069000,
        opta-competition: 8,
        opta-season: 2015
    },
    websiteUrl: "en/football/news/leverkusen-can-challenge-best-schmidt-1/83743",
    lockedBy: 40,
    lockedAt: "2015-10-14T10:11:44+00:00",
    lockedByUsername: ""
    }
}</code></pre>

                            </li>
                            <li>
                                <p><strong>PUT</strong> content example</p>
                                <pre><code class="language-js">curl -X PUT -H "Authorization: Bearer eY4NzUsInVzZXJuYW1lIjoiYmVpbi1hcGlAc21pbGUuZnIiLCJ1c2VyX2lkIjo0MCwidXNlciI6RiM8HrkEuyjUPlbCyKyKV9H14uKh6WuMNYK3Jy4zr9hrcVRE" -H "Content-Type: application/json;charset=UTF-8" -d '{
    channels: [
    "/channels/2",
    ],
    headline: "New Headline",
    shortHeadline: "New short headline"
}' 'https://api-int.beinsports.com/contents/1'
</code></pre>
                                <pre><code class="language-js">{
    @context: "/contexts/Content",
    @id: "/contents/83743",
    @type: "Content",
    author: null,
    authorName: null,
    body: "string",
    channels: [
        {
        @id: "/channels/2",
        @type: "Channel",
        name: "mobile"
        }
    ],
    createdAt: "2015-08-27T00:14:40+00:00",
    deletedAt: null,
    expiredAt: "2015-10-03T14:07:00+00:00",
    externalId: "1ccgojyiw79vh1rnpw5nnoawnu",
    externalUrl: null,
    featured: false,
    featuredMedia: {
        @id: "/media/161569",
        @type: "Media",
        type: 1,
        provider: "omnisport",
        uri: "rogerschmidt-cropped_1p85anpusaluh1mhvzysr0xr9k.jpg",
        altText: "RogerSchmidt - Cropped",
        caption: "Bayer Leverkusen coach Roger Schmidt",
        credit: "AFP",
        source: "AFP",
        externalUrl: "http://images.performgroup.com/di/library/omnisk.jpg?t=1816315535",
        context: {
            thumbnail_resized_800: "http://images.beinsports.com/DQ5ls2C4L0l_zli3N0xr9k.jpg"
        },
        author: null,
        externalId: "enls943kyqx81e0exjirq8ngd",
        createdAt: "2015-08-27T00:55:02+00:00",
        updatedAt: "2015-08-27T11:22:52+00:00"
    },
    headline: "New Headline",
    media: [],
    parent: "/contents/83742",
    provider: "omnisport",
    publishedAt: "2015-08-27T00:54:13+00:00",
    reason: null,
    shortHeadline: "New short headline"
    site: "/sites/4",
    slug: "leverkusen-can-challenge-best-schmidt-1",
    status: 5,
    subHead: "Leverkusen can challenge best - Schmidt",
    taxonomy: [],
    teaser: "A delighted Roger Schmidt is eyeing a run at play-off.",
    type: 1,
    updatedAt: "2015-10-14T10:10:54+00:00",
    defaultCategory: {
        @id: "/taxonomies/556",
        @type: "Taxonomy",
        context: {
        tag_header_id: 176111452,
        tag_header_div: 416422374220949200,
        tag_outpage_id: 872077766980069000,
        opta-competition: 8,
        opta-season: 2015
    },
    websiteUrl: "en/football/news/leverkusen-can-challenge-best-schmidt-1/83743",
    lockedBy: 40,
    lockedAt: "2015-10-14T10:11:44+00:00",
    lockedByUsername: ""
    }
}</code></pre>

                            </li>
                            <li>
                                <p><strong>DELETE</strong> content example</p>
                                <pre><code class="language-bash">curl -X DELETE -H "Authorization: Bearer eY4NzUsInVzZXJuYW1lIjoiYmVpbi1hcGlAc21pbGUuZnIiLCJ1c2VyX2lkIjo0MCwidXNlciI6RiM8HrkEuyjUPlbCyKyKV9H14uKh6WuMNYK3Jy4zr9hrcVRE" 'https://api-int.beinsports.com/contents/83743'</code></pre>

                            </li>
                            <li>
                                <p><strong>POST</strong> content example</p>
                                <pre><code class="language-bash">curl -X POST -H "Authorization: Bearer eY4NzUsInVzZXJuYW1lIjoiYmVpbi1hcGlAc21pbGUuZnIiLCJ1c2VyX2lkIjo0MCwidXNlciI6RiM8HrkEuyjUPlbCyKyKV9H14uKh6WuMNYK3Jy4zr9hrcVRE" -H "Content-Type: application/json;charset=UTF-8" -d '{
"priority": 1,
"regex": "/france/",
"html": null,
"schema": null,
"meta": "{\"title\": \"Accueil\"}",
"site": "/sites/2"
}' 'https://api-int.beinsports.com/seos'</code></pre>

                            </li>
                        </ul>
                    </li>
                </ul>

                <h3 id="gn_rwe">Real world example</h3>

                <p>Following example is based on true request triggered by front API</p>

                <ul>
                    <li>
                        <p>Retreive french news</p>

                        <div class="tabs">
                            <ul class="nav nav-tabs">
                                <li role="presentation" class = "active"><a href="#tabs-1">Api URI</a></li>
                                <li role="presentation" class = "active"><a href="#tabs-2">Api Response</a></li>
                                <li role="presentation" class = "active"><a href="#tabs-3">Front correspondence</a></li>
                            </ul>
                            <div id="tabs-1">
                                <p></p>
                                <pre><code class="language-bash">http://api.beinsports.com/contents?type=1&status=5&order[publishedAt]=desc&category[id][]=175&orphan.category=0&category[children]=1&page=2&itemsPerPage=10&site=2</code></pre>

                                <h4>Details</h4>
                                <ul>
                                    <li>type=1, retreive contents of type <strong>article</strong></li>
                                    <li>status=5, retreive <strong>published</strong> contents</li>
                                    <li>order[publishedAt]=desc, <strong>Order results by publication date</strong></li>
                                    <li>category[id][]=175, retrieve only contents belongs to <strong>category 175</strong> (root category for France)</li>
                                </ul>
                            </div>
                            <div id="tabs-2">
                                <p></p>
                                <pre><code class="language-javascript">{% endverbatim %}{{ include('AppBundle:Documentation:content_news.html.twig') }}{% verbatim %}</code></pre>
                            </div>
                            <div id="tabs-3">
                                <p></p>
                                    <img src="http://img15.hostingpics.net/pics/759895Capturedu20151030172344.png"/>
                            </div>
                        </div>
                    </li>
                </ul>
                <h3 id="gn_pa">Partners account</h3>

                <ul>
                    <li>
                        <div class="">
                            <p>Before creating a partner account from the CMS, it is essential to inform <strong>Smile</strong> about data size that will be exchanged so that adjustments are made if necessary.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <?php /*echo $collection->markdown('description');*/ ?>

            <h2>Endpoints</h2>

            <?php foreach ($collection->folders() as $folder): ?>
                <div>
                    <h3 class="page-header" id="<?= $folder->name === 'Login' ? 'login' : $folder->id ?>"><?= $folder->name ?></h3>
                    <?= $folder->markdown('description') ?>

                    <?php foreach ($folder->requests() as $request): ?>
                        <h4 id="<?= $request->id() ?>" class="page-header">
                            <kbd><?= $request->method() ?></kbd> <?= $request->name() ?>
                            <small><?= $request->url() ?></small>
                        </h4>
                        <?= $request->markdown('description') ?>
                        <pre><code class="http"><?= $request->rawRequest() ?></code></pre>
                    <?php endforeach; ?>
                </div>
            <?php endforeach ?>
        </div>
        <hr/>
    </div>
</div>

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/languages/http.min.js"></script>
<script>
    hljs.initHighlightingOnLoad();
    $(function() {
        $( ".tabs" ).tabs();
    });

</script>
{% endverbatim %}
</body>
</html>