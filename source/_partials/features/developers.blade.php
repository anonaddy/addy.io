{{-- Creating an alias with the API (POST /api/v1/aliases, see /help/creating-new-email-aliases/) --}}
<div class="art-frame code-mock">
<pre><code><span class="c"># Create a random alias</span>
curl -X POST https://app.addy.io/api/v1/aliases \
  -H "Authorization: Bearer $ADDY_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{"domain": "anonaddy.me", "format": "random_characters"}'

<span class="c"># Response</span>
{ "data": { "email": "<span class="s">x481n904@anonaddy.me</span>", "active": true } }</code></pre>
</div>
