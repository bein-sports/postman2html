<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>beIN Sports REST API</title>

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
                </ul>
                <h4 class="text-info">Endpoints</h4>
                <ul class="nav">
                    <?php foreach ($collection->folders() as $folder): ?>
                        <li>
                            <a href="#<?= $folder->id ?>"><?= $folder->name ?></a>
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
            <h1 >beIN Sports REST API Overview</h1>
            <h2 class="page-header">General notes</h2>
            <div>
                <p>The beIN Sports API is organized around <a href="https://fr.wikipedia.org/wiki/Representational_State_Transfer">REST</a>.
                Our API is designed to have predictable, resource-oriented URLs and to use <a href="https://en.wikipedia.org/wiki/List_of_HTTP_status_codes">HTTP response codes</a> to indicate API errors.
                We use built-in HTTP features, like <a href="http://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html">HTTP verbs</a>, which can be understood by off-the-shelf HTTP clients.
                For all responses, Api always return <a href="http://json-ld.org/">JSON-LD</a> content (application/ld+json).
                </p>
                <p>The beIN Sports REST API provides programmatic access to read and write beIN Sports Api data (read or write contents, medias and more) with <a href="http://www.hydra-cg.com/">Hydra Core Vocabulary web standards</a>.</p>
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
                        <li>yJhbGciOiJSUIkpXUyJ9.eyJlJuYW1lIjoiYmVpbi1hcGlAc21pbGUuZnIiLCJ1c2VyX2lkIjoxL
                        CJ1c2VyIjp7IkBjb250ZXh0IjoiXC9jb250ZXh0c1wvVXNlciIsIkBpZCI6IlwvdXNlcnNcLzEiLCJ
                        AdHlwZSI6IlVzZXIiLCJlbWFpbCI6ImJlaW4tYXBpQHwic3VwZXJhZG1pbiI6dHJ1ZSwidXNlcm5hb
                        WUiOiJiZWluLWFwaUBzbWlsZS5mciJ9LCJpYXQiOiIx</li>
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
                        <p>Every string passed to and from the beINSPORTS API needs to be UTF-8 encoded</p>
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
                        <p>You can do this from <a href="#20f9827d-48c8-19d6-b1fa-dc87dcf8ff3b">login_check</a> endpoint with your login and password account.</p>
                    </li>
                    <li>
                        <p>Include your token in all other requests</p>
                        <p>For <strong>POST</strong> queries, keep in mind that <strong>you are not forced to provide all the fields</strong> that make up the object, but <strong>only</strong> those that are rated <strong>mandatory</strong>, for <strong>PUT</strong> you can just provide updated fields.</p>
                    </li>
                </ul>
            </div>
            <?php /*echo $collection->markdown('description');*/ ?>

            <h2>Endpoints</h2>

            <?php foreach ($collection->folders() as $folder): ?>
                <div>
                    <h3 class="page-header" id="<?= $folder->id ?>"><?= $folder->name ?></h3>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/languages/http.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
{% endverbatim %}
</body>
</html>